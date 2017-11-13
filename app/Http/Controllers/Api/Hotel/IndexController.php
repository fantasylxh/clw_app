<?php

namespace App\Http\Controllers\Api\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Interfaces\MemberCheck;
class IndexController extends Controller
{
    use MemberCheck;
    /**
     * app首页
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index($id)
    {
        if(!$id)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'id参数为空','data'=>null]);
        /* index */
        $result = [
            'roomtype'=>1,
            //'roomname'=>'豪华总统套房',
            'topimgurl'=>'https://users.chengliwang.com/images/1.jpg',
            'title'=>'豪华总统套房',
            'tiptext'=>'订单预定成功后，我们将在24小时内确认订单，所在非工作时间顺延至第二天，请耐心等待，客服电话：400-87656453',
            'intime'=>'11-15',
            'outtime'=>'11-16',
            'totalin'=>'共2晚',
            'content'=>'方形介绍介绍',
            'roomcontent'=>'客房方形介绍介绍',
            'price'=>2129,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'景客房介绍','data'=>$result];
        return $result;
    }

    /**
     * app首页
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function order(Request $request,$id=0)
    {
        if( !$request->id )
            return response()->json(['code'=>200,'status'=>0,'message'=>'id 不能空']);

        $method=$request->method();
        if($request->isMethod('post')){
            if( !$request->id || !$request->phone)
                return response()->json(['code'=>200,'status'=>0,'message'=>'id phone 不能空']);
            if( !$this->checkMember(['openid'=>$request->openid]))
                return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

            return response()->json(['code'=>200,'status'=>1,'message'=>'订单提交成功']);
        }
        else{
            $result = ['title'=>'豪华套房','price'=>2310,
                'roomtype'=>'嘻哈双人房',
                'intime'=>'11-15',
                'outtime'=>'11-16',
                'totalin'=>'共2晚',];

        }

        $result = ['code'=>200,'status'=>1,'message'=>'订单确认','data'=>$result];
        return $result;
    }

}
