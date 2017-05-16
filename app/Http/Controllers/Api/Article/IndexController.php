<?php

namespace App\Http\Controllers\Api\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Product;
class ArticleController extends Controller
{
    /**
     * 新闻列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        dd($id);
        /* 轮播图 */
        $banner_articles = Article::limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_linkurl,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>3])->paginate(2);

        $list = [
            'banner_articles'=>$banner_articles, //轮播图

        ];
        $result = ['code'=>200,'status'=>1,'message'=>'app首页','data'=>$list];
        return response()->json($result);

    }

}
