<?php

namespace App\Http\Controllers\Api\Order;
use App\Models\Order;
use App\Models\OrderGoods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MemberAddress;
use App\Models\Product;
use App\Http\Requests;
use App\Http\Requests\Interfaces\MemberCheck;
use Carbon\Carbon;
class OrderController extends Controller
{
    use MemberCheck;
    public function __construct()
    {
        //微信支付参数配置(appid,商户号,支付秘钥)
        $config = array(
            'appid'		 => env('WECHAT_APPID'),
            'pay_mchid'	 => env('WECH_ID'),
			'pay_apikey' =>env('WECHAT_KEY'),
		);
		$this->config = $config;
    }

    /**
     * 生成订单号
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    private static function trade_no() {
        list($usec, $sec) = explode(" ", microtime());
        $usec = substr(str_replace('0.', '', $usec), 0 ,4);
        $str  = rand(10,99);
        return date("YmdHis").$usec.$str;
    }

    /**
     * order fee
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function freight(Request $request )
    {
        $result =json_decode($request->orderInfo,true);
        if( !$result)
            return response()->json(['code'=>200,'status'=>0,'message'=>'订单商品信息不能为空']);

        $list = ['name'=>'邮政小包裹','fee'=>0.0];
        $result = ['code'=>200,'status'=>1,'message'=>'订单运费','data'=>$list];
        return response()->json($result);
    }

    /**
     * 积分订单信息
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function credit(Request $request)
    {
        if( !$this->checkMember(['openid'=>$request->openid]))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

        $count = Order::where(['openid'=>$request->openid])->count();
        $credit3 = Member::where(['openid'=>$request->openid])->first();
        $credit3 = $credit3 ? $credit3->credit3 : 0;
        $list = [ 'credit3'=>$credit3, 'order_count'=> $count ];
        $result = ['code'=>200,'status'=>1,'message'=>'积分订单信息','data'=>$list];
        return response()->json($result);
    }

    /**
     * order
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function store(Request $request )
    {
        \DB::beginTransaction();
        try{
            if( !$this->checkMember(['openid'=>$request->openid]))
                return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

            $config = $this->config;
            \Log::info($request->all());
            $result =json_decode($request->apiParams,true);
            if( !$result['addressInfo'])
                return response()->json(['code'=>200,'status'=>0,'message'=>'收货地址不能为空']);
            if( !$result['orderInfo'])
                return response()->json(['code'=>200,'status'=>0,'message'=>'订单商品不能为空']);

            $address_data = [
                'openid'=>$request->openid,
                'realname'=>$result['addressInfo']['userName'],
                'mobile'=>$result['addressInfo']['telNumber'],
                'province'=>$result['addressInfo']['provinceName'],
                'city'=>$result['addressInfo']['cityName'],
                'area'=>$result['addressInfo']['countyName'],
                'address'=>$result['addressInfo']['detailInfo'],
                'zipcode'=>$result['addressInfo']['postalCode'],
            ];
            $model = MemberAddress::firstOrCreate($address_data);
            $productArray =$result['orderInfo'];
            $products = [];
            $orderProducts = [];
            $productsFee = 0.0; //支付商品总价
            $productsCredit = 0; //支付商品积分
            foreach ($productArray as $val) {
                $product = Product::find($val['goodsid']);
                $productsFee += $product->productprice * $val['total'];
                $productsCredit += $product->credit2 * $val['total']; //所需总积分
            }
            if($productsCredit)
            {
                if($this->checkMember(['openid'=>$request->openid])->credit1<$productsCredit);
                    return response()->json(['code'=>200,'status'=>0,'message'=>'您的积分不足哦!']);
            }
            // 计算价格
            $shippingFee = 0.0;
            $totalFee = $productsCredit> 0 ? $shippingFee : $productsFee + $shippingFee;
            // 创建订单
            $ordersn = self::trade_no();
            $order = new Order();
            $order->ordersn = $ordersn;
            $order->openid = $request->openid;
            $order->price = $totalFee;
            $order->goodsprice = $totalFee;
            $order->createtime =time();
            $order->addressid = $model->id;
            $order->storeid = $request->storeid;
            $order->save();
            $orderid = $order->id;

            $order_goods = new OrderGoods();
            foreach ($productArray as $val) {
                $product = Product::find($val['goodsid']);
                $product=['orderid'=>$orderid,'goodsid'=>$val['goodsid'],'price'=>$product->productprice,'total'=>$val['total'],'openid'=>$request->openid];
                array_push($products, $product);
            }
            /* 生产预订单参数 */
            $openid = $request->openid;
            $body = '城里网商城订单';
            $order_sn = $ordersn;
            $total_fee = $totalFee;

            //统一下单参数构造
            $unifiedorder = array(
                'appid'			=> $config['appid'],
                'mch_id'		=> $config['pay_mchid'],
                'nonce_str'		=> self::getNonceStr(),
                'body'			=> $body,
                'out_trade_no'	=> $order_sn,
                'total_fee'		=> $total_fee * 100,
                'spbill_create_ip'	=> $request->getClientIp(),
                'notify_url'	=> 'https://'.$_SERVER['HTTP_HOST'].'/Api/Wxpay/notify',
                'trade_type'	=> 'JSAPI',
                'openid'		=> $request->openid,//'oIXoL0ZpfG3NdSE8Qa-S1GcEHJGY'//测试openid
            );
            $unifiedorder['sign'] = self::makeSign($unifiedorder);
            //请求数据
            $xmldata = self::array2xml($unifiedorder);
            $url = 'https://api.mch.weixin.qq.com/pay/unifiedorder';
            $res = self::curl_post_ssl($url, $xmldata);
            if(!$res){
                return response()->json(['code'=>200,'status'=>0,'message'=>'无法连接服务器']);
                //self::return_err("Can't connect the server");
            }
             //file_put_contents是用来查看服务器返回的结果 测试完可以删除了
             //file_put_contents('/Statics/log1.txt',$res,FILE_APPEND);

            $content = self::xml2array($res);
            $result_code= isset($content['result_code']) ? $content['result_code'] : '';
            $return_code = isset($content['return_code']) ? $content['return_code'] : '';
            if(strval($result_code) == 'FAIL'){
                return self::return_err(strval($content['err_code_des']));
            }
            if(strval($return_code) == 'FAIL'){
                return self::return_err(strval($content['return_msg']));
            }
            $data = $this->pay($content['prepay_id']);
            $data['orderid']=$orderid;$data['openid']=$openid;$data['tocken']=csrf_token();
            \DB::table("eshop_order_goods")->insert($products);
            \DB::commit();
            return response()->json(['code'=>200,'status'=>1,'message'=>'提交成功','data'=>$data]);
        } catch (\Exception $e){
            \DB::rollback();//事务回滚
            return response()->json(['code'=>200,'status'=>0,'message'=>$e->getMessage()]);
        }
    }
    /**
     * 支付回调
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function payOk(Request $request )
    {
        if( !$this->checkMember(['openid'=>$request->openid]))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);
        if( !$request->orderid)
            return response()->json(['code'=>200,'status'=>0,'message'=>'orderid不能为空']);
        if( !$request->tocken)
            return response()->json(['code'=>200,'status'=>0,'message'=>'tocken不能为空']);
        $order = Order::where('id', $request->orderid)->first();
        if(!$order)
            return response()->json(['code'=>200,'status'=>0,'message'=>'orderid不存在!']);

        /* 更新订单状态 */
        \DB::beginTransaction(); //开启事务
        try{
            $res = Order::where('id', $request->orderid)->update(['status' => 1]);
            if($res){
                \DB::commit();  //提交
                $status =1;
            }
            else
                \DB::rollback();
                $status =0;
            } catch (\Exception $e){
                \DB::rollback();
                $status =0;
            }
        return response()->json(['code'=>200,'status'=>$status,'message'=>$status ? '支付成功' : '支付失败','data'=>['credit3'=>10]]);

    }
    /**
     * 提交订单
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function storebk(Request $request )
    {
        \DB::beginTransaction();
        try{
            if( !$this->checkMember(['openid'=>$request->openid]))
                return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);
            if( !$request->addressid)
                return response()->json(['code'=>200,'status'=>0,'message'=>'addressid地址id不能为空']);
            if(!MemberAddress::find($request->addressid))
                return response()->json(['code'=>200,'status'=>0,'message'=>'系统没有该地址']);

            $productArray =json_decode($request->apiParams,true);
            $products = [];
            $orderProducts = [];
            $productsFee = 0.0; //支付商品总价
            foreach ($productArray as $val) {
                $product = Product::find($val['goodsid']);
                $productsFee += $product->marketprice * $val['total'];
            }
            // 计算价格
            $shippingFee = 0.0;
            $totalFee = $productsFee + $shippingFee;
            // 创建订单
            $ordersn = self::trade_no();
            $order = new Order();
            $order->ordersn = $ordersn;
            $order->openid = $request->openid;
            $order->price = $totalFee;
            $order->goodsprice = $totalFee;
            $order->createtime =time();
            $order->addressid = $request->addressid;
            $order->save();
            $orderid = $order->id;

            $order_goods = new OrderGoods();
            foreach ($productArray as $val) {
                $product = Product::find($val['goodsid']);
                $product=['orderid'=>$orderid,'goodsid'=>$val['goodsid'],'price'=>$product->marketprice,'total'=>$val['total'],'openid'=>$request->openid];
                array_push($products, $product);
            }

            \DB::table("eshop_order_goods")->insert($products);
            \DB::commit();
            return response()->json(['code'=>200,'status'=>1,'message'=>'提交成功']);
        } catch (\Exception $e){
            \DB::rollback();//事务回滚
            return response()->json(['code'=>200,'status'=>0,'message'=>$e->getMessage()]);
        }
    }

    /**
     * 订单列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $request )
    {
        $status = $request->status ? $request->status : 0;
        $list = Order::select(['id','ordersn','price','addressid','status','createtime','paytime'])->where(['openid'=>$request->openid,'status'=>$status])->paginate(10);
        foreach($list as $val)
        {
            $val['createtime'] = date('Y-m-d H:i:s',$val['createtime']);
            $val['paytime'] = $val['paytime'] ? date('Y-m-d H:i:s',$val['paytime']) : 0;
            $val->address->toArray();
            $val->products->toArray();
        }
        $list = $list ? $list->toArray() : [];
        unset($list['from'],$list['to']);
        foreach($list['data'] as &$data)
        {
            foreach($data['products'] as &$v)
            {
                $v['total']=$v['pivot']['total'];
                unset($v['pivot']);
            }
        }
        return response()->json($list);
    }


    /**
     * 进行支付接口签名
     * @param string $prepay_id 预支付ID(调用prepay()方法之后的返回数据中获取)
     * @return  json的数据
     */
    public function pay($prepay_id){
        $config = $this->config;
        $data = array(
            'appId'		=> $config['appid'],
            'timeStamp'	=> time(),
            'nonceStr'	=> self::getNonceStr(),
            'package'	=> 'prepay_id='.$prepay_id,
            'signType'	=> 'MD5'
        );

        $data['paySign'] = self::makeSign($data);

        return $data;
    }

    //微信支付回调验证
    public function notify(){
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];

        // 这句file_put_contents是用来查看服务器返回的XML数据 测试完可以删除了
        //file_put_contents(APP_ROOT.'/Statics/log2.txt',$res,FILE_APPEND);

        //将服务器返回的XML数据转化为数组
        $data = self::xml2array($xml);
        // 保存微信服务器返回的签名sign
        $data_sign = $data['sign'];
        // sign不参与签名算法
        unset($data['sign']);
        $sign = self::makeSign($data);

        // 判断签名是否正确  判断支付状态
        if ( ($sign===$data_sign) && ($data['return_code']=='SUCCESS') && ($data['result_code']=='SUCCESS') ) {
            $result = $data;
            //获取服务器返回的数据
            $order_sn = $data['out_trade_no'];			//订单单号
            $openid = $data['openid'];					//付款人openID
            $total_fee = $data['total_fee'];			//付款金额
            $transaction_id = $data['transaction_id']; 	//微信支付流水号

            //更新数据库
            $this->updateDB($order_sn,$openid,$total_fee,$transaction_id);

        }else{
            $result = false;
        }
        // 返回状态给微信服务器
        if ($result) {
            $str='<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>';
        }else{
            $str='<xml><return_code><![CDATA[FAIL]]></return_code><return_msg><![CDATA[签名失败]]></return_msg></xml>';
        }
        echo $str;
        return $result;
    }

//---------------------------------------------------------------用到的函数------------------------------------------------------------
    /**
     * 错误返回提示
     * @param string $errMsg 错误信息
     * @param string $status 错误码
     * @return  json的数据
     */
    protected function return_err($errMsg='error',$status=0){
        return response()->json(['code'=>200,'result'=>'fail','status'=>$status,'errmsg'=>$errMsg]);
    }


    /**
     * 正确返回
     * @param 	array $data 要返回的数组
     * @return  json的数据
     */
    protected function return_data($data=array()){
        return response()->json(['code'=>200,'result'=>'success','status'=>1,'data'=>$data]);
    }

    /**
     * 将一个数组转换为 XML 结构的字符串
     * @param array $arr 要转换的数组
     * @param int $level 节点层级, 1 为 Root.
     * @return string XML 结构的字符串
     */
    protected function array2xml($arr, $level = 1) {
        $s = $level == 1 ? "<xml>" : '';
        foreach($arr as $tagname => $value) {
            if (is_numeric($tagname)) {
                $tagname = $value['TagName'];
                unset($value['TagName']);
            }
            if(!is_array($value)) {
                $s .= "<{$tagname}>".(!is_numeric($value) ? '<![CDATA[' : '').$value.(!is_numeric($value) ? ']]>' : '')."</{$tagname}>";
            } else {
                $s .= "<{$tagname}>" . $this->array2xml($value, $level + 1)."</{$tagname}>";
            }
        }
        $s = preg_replace("/([\x01-\x08\x0b-\x0c\x0e-\x1f])+/", ' ', $s);
        return $level == 1 ? $s."</xml>" : $s;
    }

    /**
     * 将xml转为array
     * @param  string 	$xml xml字符串
     * @return array    转换得到的数组
     */
    protected function xml2array($xml){
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $result= json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $result;
    }

    /**
     *
     * 产生随机字符串，不长于32位
     * @param int $length
     * @return 产生的随机字符串
     */
    protected function getNonceStr($length = 32) {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str ="";
        for ( $i = 0; $i < $length; $i++ )  {
            $str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;
    }

    /**
     * 生成签名
     * @return 签名
     */
    protected function makeSign($data){
        //获取微信支付秘钥
        $key = $this->config['pay_apikey'];
        // 去空
        $data=array_filter($data);
        //签名步骤一：按字典序排序参数
        ksort($data);
        $string_a=http_build_query($data);
        $string_a=urldecode($string_a);
        //签名步骤二：在string后加入KEY
        //$config=$this->config;
        $string_sign_temp=$string_a."&key=".$key;
        //签名步骤三：MD5加密
        $sign = md5($string_sign_temp);
        // 签名步骤四：所有字符转为大写
        $result=strtoupper($sign);
        return $result;
    }

    /**
     * 微信支付发起请求
     */
    protected function curl_post_ssl($url, $xmldata, $second=30,$aHeader=array()){
        $ch = curl_init();
        //超时时间
        curl_setopt($ch,CURLOPT_TIMEOUT,$second);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        //这里设置代理，如果有的话
        //curl_setopt($ch,CURLOPT_PROXY, '10.206.30.98');
        //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);


        if( count($aHeader) >= 1 ){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeader);
        }

        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$xmldata);
        $data = curl_exec($ch);
        if($data){
            curl_close($ch);
            return $data;
        }
        else {
            $error = curl_errno($ch);
            echo "call faild, errorCode:$error\n";
            curl_close($ch);
            return false;
        }
    }

}
