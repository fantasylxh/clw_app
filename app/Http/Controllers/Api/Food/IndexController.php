<?php

namespace App\Http\Controllers\Api\Food;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Product;
use App\Models\Activity;
use App\Models\ActivityRecord;
class IndexController extends Controller
{

    public function index()
    {

        /* index */

        $topbanner = [
            ['id'=>1,'title'=>'宫保鸡丁','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            ['id'=>2,'title'=>'红烧牛肉','imgurl'=>'https://users.chengliwang.com/images/1.jpg']
        ];
        $categorybanner = [
            ['category_id'=>1,'name'=>'招牌','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            ['category_id'=>2,'name'=>'水果','imgurl'=>'https://users.chengliwang.com/images/1.jpg'],
            ['category_id'=>3,'name'=>'饮品','imgurl'=>'https://users.chengliwang.com/images/1.jpg']
        ];
        $list = [
            "topbanner"=>$topbanner,
            "categorybanner"=>$categorybanner,
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
        $result = ['code'=>200,'status'=>1,'message'=>'美食列表','data'=>$list];
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

}
