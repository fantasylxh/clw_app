<?php

namespace App\Http\Controllers\Api\Article;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\RegionCategory;
use App\Http\Requests\Interfaces\MemberCheck;
class ArticleController extends Controller
{
    use MemberCheck;
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
     * 社区名人列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index_4(Request $request)
    {
        $articles = Article::orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where([])->paginate(10)->toArray();
        unset($articles['from'],$articles['to']);

        $list = [
            'more_articles'=> $articles,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'社区名人列表','data'=>$list];
        return response()->json($result);

    }

    /**
     * 我的发稿列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index_5(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'openid' => 'required',
        ]);
        if ($validator->fails()) {
            $result = ['code'=>200,'status'=>0,'message'=> $validator->errors()->first()];
        }

        $user_id = $this->checkMember(['openid'=>$request->openid]);
        if(!$user_id)
        {
            $result = ['code'=>200,'status'=>0,'message'=>'该openid未注册'];
            return response()->json($result);
        }
        $articles = Article::orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where([])->paginate(10)->toArray();
        unset($articles['from'],$articles['to']);

        $list = [
            'more_articles'=> $articles,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'发稿列表','data'=>$list];
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
    /**
     * 详情页
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function commentList($id)
    {
        $model = Article::find($id);
        if(!$model)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'没有该帖子','data'=>null]);

        /* 留言列表 */
        $comments = Article::find($id)->comments()->paginate(10)->toArray();
        unset($comments['from'],$comments['to']);
        foreach($comments['data'] as &$val)
        {
            $member = Member::find($val['member_id']);
            $val['avatar'] = $member->avatar;
            $val['nickname'] = $member->nickname;
            $val['displayorder'] = $val['displayorder'].'楼';
            unset($val['member_id']);
        }
        $list = [
            'comments'=> $comments,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'留言列表','data'=>$list];
        return response()->json($result);
    }
    /**
     * 文章评论
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function comment(Request $request )
    {
        try {
            $validator = \Validator::make($request->all(), [
                'openid' => 'required',
                'content' => 'required|max:255',
            ]);
            if ($validator->fails()) {
                $result = ['code'=>200,'status'=>0,'message'=> $validator->errors()->first()];
            }
            $model = Article::find($request->id);
            if(!$model)
            {
                $result = ['code'=>200,'status'=>0,'message'=>'找不到该帖子'];
                return response()->json($result);
            }

            $user_id = $this->checkMember(['openid'=>$request->openid]);
            if(!$user_id)
            {
                $result = ['code'=>200,'status'=>0,'message'=>'该openid未注册'];
                return response()->json($result);
            }
            $displayorder = ArticleComment::where(['article_id'=>$request->id])->max('displayorder');
            ArticleComment::firstOrCreate(['openid' => $request->openid,'member_id' => $user_id,'content' => $request->content,'displayorder' => $displayorder+1,'article_id'=>$request->id]);
            $result = ['code'=>200,'status'=>1,'message'=>'留言成功'];
        }
        catch (\Exception $e) {
            $result = ['code'=>200,'status'=>0,'message'=>$e->getMessage()];
        }
        return response()->json($result);
    }

    /**
     * 特约记者详情
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function reporter($id)
    {
        $model = Article::select(['article_title','resp_desc','resp_img','article_content','article_author','article_date_v'])->find($id)->toArray();
        if(!$id)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'没有该帖子','data'=>null]);

        $reporter = Article::select(\DB::raw("id,article_author as realname,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img,article_content "))->find($id)->toArray();
        $reporter['resp_img'] = env('ATTACHMENT_URL').$model['resp_img'];
        $reporter['usercode'] = '2030040506';
        $reporter['job'] = '社区站长';
        /* 我的读者 */
        $vote_info= Article::orderBy('id','desc')->select(\DB::raw("id ,resp_desc,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>8])->first()->toArray();
        $vote_info['votes']=12;
        /* 社区生活/ */
        $articles = Article::limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>10])->get()->toArray();

        $list = [
            'reporter_info'=>$reporter,
            'vote_info'=>$vote_info ,
            'articles'=>$articles
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'记者详情','data'=>$list];
        return response()->json($result);
    }

    /**
     * 特约记者详情
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function personal($id)
    {
        $model = Article::select(['article_title','resp_desc','resp_img','article_content','article_author','article_date_v'])->find($id)->toArray();
        if(!$id)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'没有该帖子','data'=>null]);

        $reporter = Article::select(\DB::raw("id,article_author as realname,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img,article_content "))->find($id)->toArray();
        $reporter['resp_img'] = env('ATTACHMENT_URL').$model['resp_img'];
        $reporter['usercode'] = '2030040506';
        $reporter['job'] = '社区站长';
        /* 我的读者 */
        $vote_info= Article::orderBy('id','desc')->select(\DB::raw("id ,resp_desc,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>8])->first()->toArray();
        $vote_info['votes']=32;
        $list = [
            'reporter_info'=>$reporter,
            'vote_info'=>$vote_info ,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'社区名人详情','data'=>$list];
        return response()->json($result);
    }

    /**
     * 投票
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function vote(Request $request )
    {
        try {
            $validator = \Validator::make($request->all(), [
                'openid' => 'required',
                'id' => 'required',
            ]);
            if ($validator->fails()) {
                $result = ['code'=>200,'status'=>0,'message'=> $validator->errors()->first()];
            }
            $model = Article::find($request->id);
            if(!$model)
            {
                $result = ['code'=>200,'status'=>0,'message'=>'找不到该投票id'];
                return response()->json($result);
            }

            $user_id = $this->checkMember(['openid'=>$request->openid]);
            if(!$user_id)
            {
                $result = ['code'=>200,'status'=>0,'message'=>'该openid未注册'];
                return response()->json($result);
            }
/*            $displayorder = ArticleComment::where(['article_id'=>$request->id])->max('displayorder');
            ArticleComment::firstOrCreate(['openid' => $request->openid,'member_id' => $user_id,'content' => $request->content,'displayorder' => $displayorder+1,'article_id'=>$request->id]);*/
            $result = ['code'=>200,'status'=>1,'message'=>'投票成功'];
        }
        catch (\Exception $e) {
            $result = ['code'=>200,'status'=>0,'message'=>$e->getMessage()];
        }
        return response()->json($result);
    }


}
