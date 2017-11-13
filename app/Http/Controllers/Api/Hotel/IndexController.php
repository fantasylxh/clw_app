<?php

namespace App\Http\Controllers\Api\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Product;
use App\Models\Activity;
use App\Models\ActivityRecord;
class IndexController extends Controller
{
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
            'topimgurl'=>'https://users.chengliwang.com/images/1.jpg',
            'title'=>'成园三期戏水乐园',
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

}
