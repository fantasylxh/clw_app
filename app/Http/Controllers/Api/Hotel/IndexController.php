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


    //类型
    public function type($id)
    {
        if(!$id)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'id参数为空','data'=>null]);
        /* index */
        $banner = [
            [ 'id'=>11,'title'=>'嘻哈乐园一期','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>245],
            [ 'id'=>22,'title'=>'嘻哈乐园一期','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>278],
            [ 'id'=>13,'title'=>'嘻哈乐园一期','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>145],
            ];
        $more = [
            ['imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            [ 'imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            [ 'imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            [ 'imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
        ];
        $recommend = [
            [ 'id'=>111,'imgurl'=>'https://users.chengliwang.com/images/1.jpg','comment'=>'房间剪短描述'],
            [ 'id'=>212,'imgurl'=>'https://users.chengliwang.com/images/1.jpg','comment'=>'房间剪短描述'],
            [ 'id'=>113,'imgurl'=>'https://users.chengliwang.com/images/1.jpg','comment'=>'房间剪短描述'],
        ];
        $result = [
            'roomtype'=>1,
            //'roomname'=>'豪华总统套房',
            'topimgurl'=>'https://users.chengliwang.com/images/1.jpg',
            'title'=>'豪华总统套房',
            'tiptext'=>'订单预定成功后，我们将在24小时内确认订单，所在非工作时间顺延至第二天，请耐心等待，客服电话：400-87656453',
            'intime'=>'11-15',
            'outtime'=>'11-16',
            'totalin'=>'共2晚',
            'banner'=>$banner,
            'more'=>$more,
            'recommend'=>$recommend,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'景客房类型介绍','data'=>$result];
        return $result;
    }


    /**
     * 预约提交
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function order(Request $request,$id=0)
    {
        if( !$request->id ||  !$request->phone  )
            return response()->json(['code'=>200,'status'=>0,'message'=>'id phone 不能空']);

        $method=$request->method();
        if($request->isMethod('post')){
            if( !$request->id || !$request->phone)
                return response()->json(['code'=>200,'status'=>0,'message'=>'id phone 不能空']);
            if( !$this->checkMember(['openid'=>$request->openid]))
                return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

            return response()->json(['code'=>200,'status'=>1,'message'=>'订单提交成功','data'=>['order_id'=>2,'order_no'=>2049540506]]);
        }
        else{
            $result = ['title'=>'豪华套房','price'=>2310,
                'roomtype'=>'嘻哈双人房',
                'id'=>$request->id,
            ];

        }

        $result = ['code'=>200,'status'=>1,'message'=>'订单确认','data'=>$result];
        return $result;
    }



}
