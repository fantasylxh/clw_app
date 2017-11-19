<?php

namespace App\Http\Controllers\Api\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Product;
use App\Models\Activity;
use App\Models\ActivityRecord;
class HomeController extends Controller
{
    /**
     * app首页
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $request)
    {
        $notice =['id'=>11,'title'=>'成园有约套房大酬宾活动开幕啦'];
        $hot = [
            ['id'=>1,'imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            ['id'=>2,'imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
        ];
        $face = [
            ['id'=>1,'title'=>'成园三期戏水乐园','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            ['id'=>2,'title'=>'成园三期温泉','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            ['id'=>3,'title'=>'成园三期温泉','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            ['id'=>4,'title'=>'成园熔岩','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            ['id'=>5,'title'=>'成园温泉','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
        ];

        $list = [
            'notice'=>$notice,
            'hot'=>$hot,
            'face'=>$face,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'成园首页','data'=>$list];
        return response()->json($result);
    }

    public function hotel()
    {

        /* index */

        $list = [
            'list'=> [
                "total"=>9,
                "per_page"=>12,
                "current_page"=>1,
                "last_page"=>2,
                "next_page_url"=>4,
                "prev_page_url"=>4,
                "data"=>[
                    ['id'=>1,'title'=>'豪华双人间','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
                    ['id'=>2,'title'=>'豪华双人间','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
                    ['id'=>3,'title'=>'豪华双人间','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
                    ['id'=>4,'title'=>'豪华双人间','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
                    ['id'=>5,'title'=>'豪华双人间','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
                    ['id'=>6,'title'=>'豪华12人间','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
                    ['id'=>7,'title'=>'豪华7人间','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
                    ['id'=>8,'title'=>'豪华7人间','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
                    ['id'=>9,'title'=>'豪华双人间','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],

                ]
            ],
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'酒店列表','data'=>$list];
        return $result;
    }


    public function showInfo($id)
    {

        /* index */
        $banner = [
        ['imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
        ['imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
        ['imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
    ];
        $result = [
            'topimgurl'=>'https://users.chengliwang.com/images/1.jpg',
            'title'=>'成园三期戏水乐园',
            'banner'=>$banner,
            'content'=>'富文本介绍'
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'景点介绍','data'=>$result];
        return $result;
    }

    //类型
    public function detail()
    {

        /* index */
        $topbanner = [
            [ 'id'=>11,'title'=>'嘻哈乐园一期','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>245],
            [ 'id'=>22,'title'=>'嘻哈乐园一期','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>278],
            [ 'id'=>13,'title'=>'嘻哈乐园一期','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>145],
        ];
        $more = [
            ['imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            [ 'imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            [ 'imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
        ];
        $weekdaya = [
            [ 'datetime'=>'2017-12-23','daytext'=>'周五','value'=>'今天'],
            [ 'datetime'=>'2017-12-24','daytext'=>'周六','value'=>'明天'],
            [ 'datetime'=>'2017-12-25','daytext'=>'周日','value'=>'12月24号'],
            [ 'datetime'=>'2017-12-26','daytext'=>'周一','value'=>'12月25号'],
        ];
        $dayticket = [
            [ 'id'=>111,'title'=>'成员会员全日票','price'=>245],
            [ 'id'=>222,'title'=>'成员会员全日票','price'=>278],
            [ 'id'=>123,'title'=>'成员会员全日票','price'=>145],
        ];
        $nightticket = [
            [ 'id'=>411,'title'=>'成员会员全晚票','price'=>245],
            [ 'id'=>422,'title'=>'成员会员全晚票','price'=>278],
            [ 'id'=>423,'title'=>'成员会员全晚票','price'=>145],
        ];
        $result = [
            'title'=>'大连成员温泉',
            'content'=>'详细介绍富文本',
            'topbanner'=>$topbanner,
            'more'=>$more,
            'dayticket'=>$dayticket,
            'nightticket'=>$nightticket,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'门票预订界面接口','data'=>$result];
        return $result;
    }


}
