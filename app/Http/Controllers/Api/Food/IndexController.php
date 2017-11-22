<?php

namespace App\Http\Controllers\Api\Food;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Product;
use App\Models\Activity;
use App\Models\ActivityRecord;
use App\Http\Requests\Interfaces\MemberCheck;
class IndexController extends Controller
{
    use MemberCheck;
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
                    ['id'=>1,'name'=>'香辣虾','desc'=>'香辣虾剪短秒速','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132],
                    ['id'=>2,'name'=>'香辣虾','desc'=>'香辣虾剪短秒速','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132],
                    ['id'=>3,'name'=>'香辣虾','desc'=>'香辣虾剪短秒速','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132],
                    ['id'=>4,'name'=>'香辣虾','desc'=>'香辣虾剪短秒速','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132],
                    ['id'=>5,'name'=>'香辣虾','desc'=>'香辣虾剪短秒速','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132],
                    ['id'=>6,'name'=>'香辣虾','desc'=>'香辣虾剪短秒速','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132],
                    ['id'=>7,'name'=>'香辣虾','desc'=>'香辣虾剪短秒速','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132],
                    ['id'=>8,'name'=>'香辣虾','desc'=>'香辣虾剪短秒速','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132],
                    ['id'=>9,'name'=>'香辣虾','desc'=>'香辣虾剪短秒速','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132],

                ]
            ],
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'美食列表','data'=>$list];
        return $result;
    }


    public function detail($id)
    {

        /* index */

        $result = [
            'imgurl'=>'https://users.chengliwang.com/images/1.jpg',
            'name'=>'招牌红烧羊肉',
            'price'=>238,
            'content'=>'富文本介绍'
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'美食介绍','data'=>$result];
        return $result;
    }

    public function join(Request $request)
    {

        if( !$this->checkMember(['openid'=>$request->openid]))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

        $result = ['code'=>200,'status'=>1,'message'=>'加入成功'];
        return $result;
    }

    public function myorder(Request $request)
    {

        if( !$this->checkMember(['openid'=>$request->openid]))
            return response()->json(['code'=>200,'status'=>0,'message'=>'该openid未注册']);

        $orderinfo=['orderprice'=>368];
        $list = [
            ['id'=>1,'name'=>'香辣虾','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132,'ordernum'=>1],
            ['id'=>2,'name'=>'香辣虾','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>32,'ordernum'=>2],
            ['id'=>3,'name'=>'香辣虾','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>32,'ordernum'=>4],
            ['id'=>4,'name'=>'香辣虾','imgurl'=>'https://users.chengliwang.com/images/1.jpg','price'=>132,'ordernum'=>1],
        ];
        $result=['orderinfo'=>$orderinfo,'list'=>$list];
        $result = ['code'=>200,'status'=>1,'message'=>'订单确认页面','data'=>$result];
        return $result;
    }


    public function order(Request $request)
    {

        if( !$this->checkMember(['openid'=>$request->openid]) || !$request->realname)
            return response()->json(['code'=>200,'status'=>0,'message'=>'realname 该openid未注册']);


        $result = ['code'=>200,'status'=>1,'message'=>'订单确认成功','data'=>['message'=>'恭喜您订单已生成，已为您发送预约短信，成园温泉山庄祝您生活愉快']];
        return $result;
    }
}
