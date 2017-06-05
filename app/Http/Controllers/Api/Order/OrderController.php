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
class OrderController extends Controller
{
    use MemberCheck;
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
     * 提交订单
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
            if( !$request->addressid)
                return response()->json(['code'=>200,'status'=>0,'message'=>'addressid地址id不能为空']);
            if(!MemberAddress::find($request->addressid))
                return response()->json(['code'=>200,'status'=>0,'message'=>'系统没有该地址']);

            //$product = [['goodsid'=>1,'total'=>1],['goodsid'=>3,'total'=>4]];
            //return response()->json($product);
            $productArray =json_decode($request->apiParams,true);
            $products = [];
            $orderProducts = [];
            $productsFee = 0.0; //支付商品总价
            foreach ($productArray as $val) {
                $product = Product::find($val['goodsid']);
                $productsFee += $product->marketprice * $val['total'];
            }
            // 计算价格
            $shippingFee = 10.0;
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
     * 获取子区域分类
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $request )
    {
        try {
            $list = RegionCategory::select(['id','name'])->where(['parentid'=>0,'enabled'=>1])->get()->toArray();
            $result= $this->getMenuTree($list);
            $result = ['code'=>200,'status'=>1,'message'=>'社区街道分类','data'=>$result];
        }
        catch (\Exception $e) {
            $result = ['code'=>200,'status'=>0,'message'=>'找不到该分类','data'=>null];
        }
        return response()->json($result);
    }



}
