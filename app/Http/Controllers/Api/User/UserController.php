<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Member;
use App\Models\ShopNotice;
use App\Models\MemberAddress;
use Iwanli\Wxxcx\Wxxcx;
use App\Models\Article;
use App\Http\Requests\Interfaces\MemberCheck;
class UserController extends Controller
{
    use MemberCheck;
    protected $wxxcx;

    function __construct(Wxxcx $wxxcx)
    {
        $this->wxxcx = $wxxcx;
    }

    /**
     * 小程序登录获取用户信息
     * @author lxhui
     * @date   2017-05-27T14:37:08+0800
     * @return [type]                   [description]
     */
    public function getWxUserInfo(Request $request)
    {
        //code 在小程序端使用 wx.login 获取
        $code = request('code', '');
        if(!$code)
            return response()->json(['code'=>200,'status'=>0,'message'=>'code不能为空']);

        //根据 code 获取用户 session_key 等信息, 返回用户openid 和 session_key
        $userInfo = $this->wxxcx->getLoginInfo($code);

        //获取解密后的用户信息
        return $userInfo;
    }
    /**
     *  小程序用户权限验证
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function checkAuth(Request $request)
    {
        $user_id = $this->checkMember($request->all());
        return $user_id ? true : false;
    }

    /**
     *  小程序注册同步用户信息
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $messages = array(
            'openid.required' => 'openid不能为空',
            'nickname.required' => 'nickname不能为空',
            'openid.unique' => 'openid已注册',
           // 'gender.required' => 'gender性别不能为空',
           // 'province.required' => 'province省不能为空',
           // 'city.required' => 'city市不能为空',
           // 'area.required' => 'area区域不能为空',
            'avatar.required' => 'avatar微信图像不能为空',
        );
        $validator = \Validator::make($request->all(), [
            'openid' => 'required',
            'nickname' => 'required',
            //'gender' => 'required',
           // 'province' => 'required',
           // 'city' => 'required',
           // 'area' => 'required',
            'avatar' => 'required'
        ], $messages);
        if ($validator->fails())
            return response()->json(['code'=>200,'status'=>0,'message'=>$validator->errors()->first()]);

        $data = $request->all();
        try {
            $model = Member::updateOrCreate( ['openid' => $data['openid']],$data);
            if($model)
                return response()->json(['code'=>200,'status'=>1,'message'=>'同步成功']);
            else
                return response()->json(['code'=>200,'status'=>0,'message'=>$validator->errors()->first()]);
        }
        catch (\Exception $e) {
            return response()->json(['code'=>200,'status'=>0,'message'=>$e->getMessage()]);
        }

    }

    /**
     *  积分查询
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function credit(Request $request)
    {
        if(!$this->checkAuth($request))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

        $model =Member::where(['openid'=>$request->openid])->first();
        $info =\DB::table('config')->where('name', 'consumedesc')->first()->value;
        $model->level = $model->level>2 ? '采编会员' : ($model->level<=1 ? '普通游客' : '普通会员');
        $list = [
            'userInfo'=>['credit1'=>$model->credit1,'level'=>$model->level,'nickname'=>$model->nickname,'avatar'=>$model->avatar,'info'=>$info]
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'个人中心','data'=>$list];
        return response()->json($result);
    }
    /**
     *  用户信息
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info(Request $request)
    {
        if(!$this->checkAuth($request))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

        $model =Member::select(['avatar','nickname','gender','province','city','area','street','createtime','createtime as usercode'])->where(['openid'=>$request->openid])->first();
        //$model->createtime = date('Y-m-d H:i:s',$model->createtime);

        $result = ['code'=>200,'status'=>1,'message'=>'个人中心','data'=>$model];
        return response()->json($result);
    }

    /**
     *  修改用户信息
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editInfo(Request $request)
    {
        $messages = array(
            'area.required' => 'area区域不能为空',
            'street.required' => 'street街道不能为空',
        );
        $validator = \Validator::make($request->all(), [
            'area' => 'required',
            'street' => 'required'
        ], $messages);

        if(!$this->checkAuth($request))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

        if ($validator->fails())
            return response()->json(['code'=>200,'status'=>0,'message'=>$validator->errors()->first()]);

        $data = $request->all();
        try {
            $model = Member::where(['openid' => $request->openid])->update(['area'=>$request->area,'street'=>$request->street]);
            if($model)
                return response()->json(['code'=>200,'status'=>1,'message'=>'修改成功']);
            else
                return response()->json(['code'=>200,'status'=>0,'message'=>'修改失败']);
        }
        catch (\Exception $e) {
            return response()->json(['code'=>200,'status'=>0,'message'=>$e->getMessage()]);
        }
    }
    /**
     * 我的消息
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function message(Request $request)
    {
        if(!$this->checkAuth($request))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

        /* 消息列表 */
        $model =Member::where(['openid'=>$request->openid])->first();
        $messages = ShopNotice::select(\DB::raw("title,CONCAT('".env('ATTACHMENT_URL')."',thumb) as thumb,createtime"))->where(['status'=>1])->orWhere(['member_id'=>0])->orWhere(['member_id'=>$model->id])->paginate(10)->toArray();
        unset($messages['from'],$messages['to']);
        foreach($messages['data'] as &$val)
            $val['createtime']= $this->formatTime($val['createtime']);

        $list = [
            'messages'=> $messages,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'消息列表','data'=>$list];
        return response()->json($result);
    }
    /**
     * 我的私信
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function letter(Request $request)
    {
        if(!$this->checkAuth($request))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

        /* 私信列表 */
        $model =Member::where(['openid'=>$request->openid])->first();
        $messages = ShopNotice::select(\DB::raw("title,CONCAT('".env('ATTACHMENT_URL')."',thumb) as thumb,createtime"))->where(['status'=>1])->orWhere(['member_id'=>0])->orWhere(['member_id'=>$model->id])->paginate(10)->toArray();
        unset($messages['from'],$messages['to']);
        foreach($messages['data'] as &$val)
            $val['createtime']= $this->formatTime($val['createtime']);

        $list = [
            'messages'=> $messages,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'私信列表','data'=>$list];
        return response()->json($result);
    }

    /**
     * 地址列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function address(Request $request)
    {
        if(!$this->checkAuth($request))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);
        $list = [
            'address'=> MemberAddress::select(['id','realname','mobile','province','city','area','address','isdefault'])->orderBy('id','desc')->where(['openid'=>$request->openid])->get()
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'收货地址列表','data'=>$list];
        return response()->json($result);
    }

    /**
     * 我的分享队友
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function friend(Request $request)
    {
        if(!$this->checkAuth($request))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);
        /* 轮播图 */
        $banner_articles = Article::limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_title as nickname,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as avatar,article_date_v as create_at "))->where(['article_category'=>7])->paginate(10)->toArray();

        unset($banner_articles['from'],$banner_articles['to']);

        $list = [
            'friends'=>$banner_articles,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'分享队友列表','data'=>$list];
        return response()->json($result);

    }

    /**
     * 宣传奖励
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function reward(Request $request)
    {
        if(!$this->checkAuth($request))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);
        /* 轮播图 */
        $banner_articles = Article::limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_title as nickname,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as avatar,12 as credit"))->where(['article_category'=>7])->paginate(10)->toArray();

        unset($banner_articles['from'],$banner_articles['to']);

        $list = [
            'rewards'=>$banner_articles,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'宣传奖励列表','data'=>$list];
        return response()->json($result);

    }

    /**
     * 保存地址
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function storeAddress(Request $request)
    {
        if(!$this->checkAuth($request))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

        $messages = array(
            'openid.required' => 'openid不能为空',
            'realname.required' => 'realname姓名不能为空',
            'mobile.required' => 'mobile电话不能为空',
             'province.required' => 'province省不能为空',
             'city.required' => 'city市不能为空',
            // 'area.required' => 'area区域不能为空',
            'address.required' => 'address地址不能为空',
        );
        $validator = \Validator::make($request->all(), [
            'openid' => 'required',
            'realname' => 'required',
            'mobile' => 'required',
             'province' => 'required',
             'city' => 'required',
            // 'area' => 'required',
            'address' => 'required'
        ], $messages);
        if ($validator->fails())
            return response()->json(['code'=>200,'status'=>0,'message'=>$validator->errors()->first()]);

        $data = $request->all();
        try {
            $model = MemberAddress::firstOrCreate($data);
            if($model)
                return response()->json(['code'=>200,'status'=>1,'message'=>'保存成功']);
            else
                return response()->json(['code'=>200,'status'=>0,'message'=>$validator->errors()->first()]);
        }
        catch (\Exception $e) {
            return response()->json(['code'=>200,'status'=>0,'message'=>$e->getMessage()]);
        }
    }



    /**
     *  记者登录
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        $messages = array(
            'realname.required' => '姓名不能为空',
            'usercode.required' => '采编证号不能为空',
        );
        $validator = \Validator::make($request->all(), [
            'realname' => 'required',
            'usercode' => 'required'
        ], $messages);
		\Log::info(json_encode($request->all()));
        if(!$this->checkAuth($request))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

        if ($validator->fails())
            return response()->json(['code'=>200,'status'=>0,'message'=>$validator->errors()->first()]);

        $data = $request->all();
        try {
            $model = Member::where(['realname'=>$request->realname,'usercode'=>$request->usercode])->first();
            if($model)
            {
                $csrf_token = $model->openid.csrf_token();
                $model->csrf_token =$csrf_token;
                $model->openid =$request->openid;//采编人员后端注册系统生成的openid不实，需要更新
                $model->save();
                return response()->json(['code'=>200,'status'=>1,'message'=>'登录成功','data'=>['csrf_token'=>$csrf_token]]);
            }
            else
                return response()->json(['code'=>200,'status'=>0,'message'=>'账号不存在']);
        }
        catch (\Exception $e) {
            return response()->json(['code'=>200,'status'=>0,'message'=>$e->getMessage()]);
        }
    }

    private function formatTime($date) {
        $str = '';
       // $timer = strtotime($date);
        $timer = $date;
        $diff = $_SERVER['REQUEST_TIME'] - $timer;
        $day = floor($diff / 86400);
        $free = $diff % 86400;
        if($day > 0) {
            return $day."天前";
        }else{
            if($free>0){
                $hour = floor($free / 3600);
                $free = $free % 3600;
                if($hour>0){
                    return $hour."小时前";
                }else{
                    if($free>0){
                        $min = floor($free / 60);
                        $free = $free % 60;
                        if($min>0){
                            return $min."分钟前";
                        }else{
                            if($free>0){
                                return $free."秒前";
                            }else{
                                return '刚刚';
                            }
                        }
                    }else{
                        return '刚刚';
                    }
                }
            }else{
                return '刚刚';
            }
        }
    }

}
