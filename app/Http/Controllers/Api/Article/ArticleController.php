<?php

namespace App\Http\Controllers\Api\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\RegionCategory;
class ArticleController extends Controller
{
    /**
     * 城里新闻列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $request)
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
    public function index_1(Request $request)
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
    public function index_2(Request $request)
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

    /**
     * 社区生活
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index_3(Request $request )
    {
        $category_id = $request->id;
        $where = [];
        $postion = ["region_name","sub_name"];
        $region_name ='全部社区';
        if($category_id)
        {
            try {
                $m = RegionCategory::find($category_id);
                $sub_name = $m->name;
                $region_name = RegionCategory::find($m->parentid)->name;
                $where=['category_id'=>$category_id];
                $location = [$region_name,$sub_name];
                $current_position =array_combine($postion,$location);
            }
            catch (\Exception $e) {
                $location = [$sub_name,''];
                $current_position=array_combine($postion,$location);
            }
        }
        else
            $current_position=[];

        /* 一级区域分类 */
        $regions = RegionCategory::select(['id','name'])->where(['parentid'=>0,'enabled'=>1])->get()->toArray();

        /* 轮播图 */
        $banner_where = array_merge($where,['article_category'=>5]);
        $banner_articles = Article::limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($banner_where)->get()->toArray();//幻灯片

        /* 社区新闻/幻灯片下 */
        $articles = Article::limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($where)->whereIn('article_category',[1,5])->get()->toArray();

        /* 社区风云榜 */
        $cloud_where = array_merge($where,['article_category'=>9]);
        $cloud_articles = Article::limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_title,resp_desc, CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($cloud_where)->get()->toArray();
        /* 社区新闻/社区风云榜下 */
        $next_articles = Article::limit(3)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($where)->whereIn('article_category',[1,5])->get()->toArray();

        /* 优秀采编 */
        $collect_where = array_merge($where,['article_category'=>10]);
        $collect_articles = Article::limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_title,resp_desc, CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($collect_where)->get()->toArray();

        /* 社区新闻/优秀采编下 */
        $more_articles = Article::limit(2)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($where)->whereIn('article_category',[1,5])->get()->toArray();

        $list = [
            'regions'=>$regions,
            'banner_articles'=>$banner_articles,
            'news_articles'=> $articles,
            'cloud_articles'=> $cloud_articles,
            'next_articles'=> $next_articles,
            'collect_articles'=> $collect_articles,
            'more_articles'=> $more_articles,
            'current_position'=> $current_position,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'社区生活','data'=>$list];
        return response()->json($result);

    }
    /**
     * 获取子区域分类
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function categorys($id)
    {
        try {
            $model = RegionCategory::find($id);
            if(!$model)
                $result = ['code'=>200,'status'=>0,'message'=>'找不到该分类','data'=>null];

            $list = RegionCategory::select(['id','name'])->where(['parentid'=>$id,'enabled'=>1])->get();
            $result = ['code'=>200,'status'=>1,'message'=>'社区街道分类','data'=>$list];
        }
        catch (\Exception $e) {
            $result = ['code'=>200,'status'=>0,'message'=>'找不到该分类','data'=>null];
        }
        return response()->json($result);
    }
    /**
     * 详情页
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function detail($id)
    {
        $model = Article::select(['article_title','resp_desc','resp_img','article_content','article_author','article_date_v'])->find($id)->toArray();
        if(!$model)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'没有该帖子','data'=>null]);
        $model['resp_img'] = env('ATTACHMENT_URL').$model['resp_img'];

        /* 相关新闻 */
        $articles = Article::limit(3)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>8])->get()->toArray();
        $list = [
            'article_info'=>$model, //
            'articles'=>$articles //
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'帖子详情','data'=>$list];
        return response()->json($result);

    }

}
