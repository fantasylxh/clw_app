<?php

namespace App\Http\Controllers\Api\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
class ArticleController extends Controller
{
    /**
     * 城里新闻列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $requests)
    {
        /* 轮播图 */
        $banner_articles = Article::limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>3])->get()->toArray();

        $articles = Article::orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>1])->paginate(10)->toArray();
        unset($articles['from'],$articles['to']);

        $list = [
            'banner_articles'=>$banner_articles,
            'news_articles'=> $articles,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'app首页','data'=>$list];
        return response()->json($result);

    }

    /**
     * 访谈列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index_1(Request $requests)
    {
        /* 轮播图 */
        $banner_articles = Article::limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>3])->get()->toArray();

        $articles = Article::orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>7])->paginate(10)->toArray();
        unset($articles['from'],$articles['to']);

        $list = [
            'banner_articles'=>$banner_articles,
            'news_articles'=> $articles,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'访谈列表','data'=>$list];
        return response()->json($result);

    }

    /**
     * 摄影列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index_2(Request $requests)
    {
        /* 轮播图 */
        $banner_articles = Article::limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>8])->get()->toArray();

        $articles = Article::orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>8])->paginate(10)->toArray();
        unset($articles['from'],$articles['to']);

        $list = [
            'banner_articles'=>$banner_articles,
            'news_articles'=> $articles,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'摄影列表','data'=>$list];
        return response()->json($result);

    }

}
