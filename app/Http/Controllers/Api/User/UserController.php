<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Member;
use Iwanli\Wxxcx\Wxxcx;
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
        $user_id = $this->checkMember(['openid'=>$request->openid]);
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
        $info ='积分是手机客户端进行签到、购物、晒单等操作时<br>获得的通用积分,拥有积分后不仅可以在商城购物<br>我们的产品价格分为两种:采编和普通会员都可以享受会员价';
        $model->level = $model->level>2 ? '采编会员' : ($model->level<=1 ? '普通游客' : '普通会员');
        $list = [
            'userInfo'=>['credit1'=>$model->credit1,'level'=>$model->level,'nickname'=>$model->nickname,'avatar'=>$model->avatar,'info'=>$info]
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'个人中心','data'=>$list];
        return response()->json($result);
    }



}
