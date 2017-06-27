<?php

namespace App\Http\Controllers\Api\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Product;
class IndexController extends Controller
{
    /**
     * app首页
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $request)
    {
        /* 轮播图 */
        $banner_articles = Article::limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>3])->get()->toArray();

        /* 限时特卖 */
        $time_products= Product::limit(2)->orderBy('id','desc')->select(\DB::raw("id as product_id,title as product_name,CONCAT('".env('ATTACHMENT_URL')."',thumb) as product_img,marketprice as product_price"))->where(['istime'=>1])->get()->toArray();

        /* 城里新闻 */
        $news_articles = Article::limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img,article_category "))->where(['article_category'=>1])->get()->toArray();

        /* 活动报名 */
        $active_articles = Article::limit(7)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>4])->get()->toArray();

        /* 社区生活 */
        $life_articles = Article::limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img,article_category "))->where(['article_category'=>5])->get()->toArray();

        /* 城里推荐 */
        $recommend_products= Product::limit(4)->orderBy('id','desc')->select(\DB::raw("id as product_id,title as product_name,CONCAT('".env('ATTACHMENT_URL')."',thumb)  as product_img,marketprice as product_price"))->where(['isindex'=>1,'isrecommand'=>1])->get()->toArray();

        /* 旅游专题 */
        $tour_articles = Article::limit(2)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>6])->get()->toArray();

        $list = [
            'banner_articles'=>$banner_articles, //轮播图
            'time_products'=>    $time_products, //限时特卖
            'news_articles'=>  $news_articles,// 城里新闻
            'active_articles'=>  $active_articles,//活动报名
            'life_articles'=>$life_articles, //社区生活
            'recommend_products'=>$recommend_products, //城里推荐
            'tour_articles'=>$tour_articles, //旅游专题
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'app首页','data'=>$list];
        return response()->json($result);
    }

    /**
     * 关于我们
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function about(Request $request)
    {
        $about = '<div style="width:100%; margin:0 auto; background:#fff; margin-top:20px; height:600px;">
        <ul style="margin-left:50px;">
        <li style="height:10px;"></li>
        <li style="font-size:22px; margin-top:20px;"><b>联系方式</b></li>
        
        <li style="font-size:16px; line-height:40px;margin-top:20px;">联系电话：0411-88134439</li>
        <li style="font-size:16px;  line-height:40px;">邮箱：chengliwang123@163.com</li>
        <li style="font-size:16px;  line-height:40px;">微信号：chengliwangnews</li>
        <li style="font-size:16px;  line-height:40px;">微博：城里网微博 </li>
        <li style="font-size:16px;  line-height:40px;">城里网官方活动QQ群:276544516 </li>
        </ul></div>';
        $result = ['code'=>200,'status'=>1,'message'=>'关于我们','data'=>$about];
        return response()->json($result);
    }

    /**
     * 发稿申明
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function alert(Request $request)
    {
        $about = '<div style="width:100%; margin:0 auto; background:#fff; margin-top:20px; height:600px;">
        <ul style="margin-left:50px;">
        <li style="height:10px;"></li>
        <li style="font-size:22px; margin-top:20px;"><b>发稿申明</b></li>

        <li style="font-size:16px;  line-height:40px;">城里网特约记者可以发稿城里生活 </li>
        </ul></div>';
        $result = ['code'=>200,'status'=>1,'message'=>'发稿申明','data'=>$about];
        return response()->json($result);
    }

}
