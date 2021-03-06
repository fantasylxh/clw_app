<?php

namespace App\Http\Controllers\Api\Article;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Vote;
use App\Models\VoteLog;
use App\Models\ArticleComment;
use App\Models\RegionCategory;
use App\Http\Requests\Interfaces\MemberCheck;
use Storage;
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
        $banner_articles = Article::active()->limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>1])->get()->toArray();
        $idArr = array_column($banner_articles, 'id');
        $articles = Article::active()->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>1])->whereNotIn('id',$idArr)->paginate(10)->toArray();
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
        $banner_articles = Article::active()->limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>7])->get()->toArray();

        $articles = Article::active()->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>7])->paginate(10)->toArray();
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
        $banner_articles = Article::active()->limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>8])->get()->toArray();

        $articles = Article::active()->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>8])->paginate(10)->toArray();
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
            $where['ccate']= $category_id;
            try {
                $m = RegionCategory::find($category_id);
                $sub_name = $m->name;
                $region_name = RegionCategory::find($m->parentid)->name;
                $where=['ccate'=>$category_id];
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

        $idArr = $idArr2 =[];
        /* 一级区域分类 */
        $regions = RegionCategory::select(['id','name'])->where(['parentid'=>0,'enabled'=>1])->get()->toArray();

        /* 轮播图 */
        $banner_where = array_merge($where,['article_category'=>5]);
        $banner_articles = Article::active()->limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($banner_where)->get()->toArray();//幻灯片
        $bannerArr = array_column($banner_articles, 'id');
        /* 社区新闻/幻灯片下 */
        $articles = Article::active()->limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($where)->whereIn('article_category',[10])->whereNotIn('id',$bannerArr)->get()->toArray();
        $idArr = array_column($articles, 'id');
        /* 社区优秀团队 */
        $cloud_where = array_merge($where,['article_category'=>4]);
        $cloud_articles = Article::active()->limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_title,resp_desc, CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($cloud_where)->get()->toArray();
        /* 社区新闻/社区风云榜下 */
        $next_articles = Article::active()->limit(3)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($where)->whereIn('article_category',[1,5])->whereNotIn('id',$idArr)->get()->toArray();
        $idArr2 = array_column($next_articles, 'id');
        /* 优秀特约记者*/
        $collect_where = array_merge($where,['article_category'=>10]);
        $collect_articles = Article::active()->limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_title,resp_desc, CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where($collect_where)->get()->toArray();

        /* 社区新闻/优秀采编下 */
        $more_articles = Article::active()->limit(2)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))
            ->where($where)
            ->whereIn('article_category',[1,5])
            ->whereNotIn('id',array_merge($idArr,$idArr2))
            ->get()
            ->toArray();

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
        $articles = Article::active()->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>9])->paginate(10)->toArray();
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
        $articles = Article::active()->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['openid'=>$request->openid])->paginate(10)->toArray();
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
        $model = Article::active()->select(['article_title','resp_desc','resp_img','article_content','article_author','article_date_v','article_readnum_v','openid'])->find($id)->toArray();
        if(!$model)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'没有该帖子','data'=>null]);

        $model['resp_img'] = env('ATTACHMENT_URL').$model['resp_img'];
        $brginHtml = "<p style='text-align: center;'><img src ='".$model['resp_img']."'></p>";
        $model['resp_desc'] = $brginHtml.$model['resp_desc'];
        /* 处理用户图像显示 */
        if($model['openid']){
            $umodel = Member::where(['openid'=>$model['openid']])->first();
            $model['avatar'] = $umodel['avatar'];
        }
        else
            $model['avatar'] = 'https://'.$_SERVER['HTTP_HOST'].'/images/avatar.gif';
        
        /* 相关新闻 */
        $articles = Article::active()->limit(3)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>8])->get()->toArray();
        $list = [
            'article_info'=>$model, //
            'articles'=>$articles //
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'帖子详情','data'=>$list];
        return response()->json($result);
    }

    /**
     * 发稿
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function upload(Request $request)
    {
        //if ($request->isMethod('post')) {
        $data = $request->all();
        \Log::info(json_encode($data));

        $messages = array(
            'openid.required' => 'openid不能为空',
            'article_title.required' => '标题不能为空',
            'article_content.required' => '内容不能为空',
            'csrf_token.required' => 'csrf_token不能为空',
            'resp_img.required' => '上传图片不能为空',
        );
        $validator = \Validator::make($data, [
            'openid' => 'required',
            'article_title' => 'required',
            'article_content' => 'required',
            'csrf_token' => 'required',
            'resp_img' => 'required',
        ], $messages);
        $validator->after(function($validator) use ($data) {
            $csrf_token= Member::where(['openid'=> $data['openid']])->first()->csrf_token;
//            if ($csrf_token!=$data['csrf_token'])
//                $validator->errors()->add('', 'csrf_token 无效');
        });

        if ($validator->fails())
            return response()->json(['code'=>200,'status'=>0,'message'=>$validator->errors()->first()]);

//        $file = $request->file('picture');
//        if($file)
//        {
//            // 文件是否上传成功
//            if ($file->isValid()) {
//                // 获取文件相关信息
//                $originalName = $file->getClientOriginalName(); // 文件原名
//                $ext = $file->getClientOriginalExtension();     // 扩展名
//                $realPath = $file->getRealPath();   //临时文件的绝对路径
//                $type = $file->getClientMimeType();     // image/jpeg
//                // 上传文件
//                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
//                // 使用我们新建的uploads本地存储空间（目录）
//                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
//                $resp_img = 'jpg/'.date('Y').'/'.date('m').'/'.$filename;
//            }
//        }
        try{
            /* 保存 */
            $model =  new Article();
            $model->article_title = $request->article_title;// 标题
            $model->article_content = $request->article_content;//内容
            $model->article_category = 5;//分类 5
            $model->resp_img = $request->resp_img; //图片
            $model->article_date_v = date('Y-m-d');
            $model->article_date = date('Y-m-d H:i:s');
            $model->article_author = Member::where(['openid'=> $data['openid']])->first()->nickname;
            $model->category_id = $request->category_id; //区域id
            $model->openid = $request->openid;
            $model->save();
            return response()->json(['code'=>200,'status'=>1,'message'=>'发帖成功','data'=>['id'=>$model->id]]);
        }
        catch (\Exception $e){
            return response()->json(['code'=>200,'status'=>0,'message'=>$e->getMessage()]);
        }

       // }
        return view('upload');
    }

    /**
     * 发稿
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function uploadImage(Request $request)
    {
        $data = $request->all();
        \Log::info(json_encode($data));
        $file = $request->file('picture');
        try{
            if($file)
            {
                // 文件是否上传成功
                if ($file->isValid()) {
                    // 获取文件相关信息
                    $originalName = $file->getClientOriginalName(); // 文件原名
                    $ext = $file->getClientOriginalExtension();     // 扩展名
                    $realPath = $file->getRealPath();   //临时文件的绝对路径
                    $type = $file->getClientMimeType();     // image/jpeg
                    // 上传文件
                    $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    // 使用我们新建的uploads本地存储空间（目录）
                    $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                    $resp_img = 'jpg/'.date('Y').'/'.date('m').'/'.$filename;
                    return response()->json(['code'=>200,'status'=>1,'message'=>'上传成功','data'=>['resp_img'=>$resp_img]]);
                }
                else
                    return response()->json(['code'=>200,'status'=>0,'message'=>'上传失败']);
            }
            else
                return response()->json(['code'=>200,'status'=>0,'message'=>'上传失败']);
        }
        catch (\Exception $e){
            return response()->json(['code'=>200,'status'=>0,'message'=>$e->getMessage()]);
        }
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
        $comments = Article::active()->find($id)->comments()->paginate(10)->toArray();
        unset($comments['from'],$comments['to']);
        foreach($comments['data'] as &$val)
        {
            $member = Member::find($val['member_id']);
            $val['avatar'] = isset($member->avatar) ? $member->avatar : '';
            $val['nickname'] = isset($member->nickname) ? $member->nickname : '';
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
            ArticleComment::firstOrCreate(['openid' => $request->openid,'member_id' => $user_id->id,'content' => $request->content,'displayorder' => $displayorder+1,'article_id'=>$request->id]);
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
        $model = Article::active()->select(['article_title','resp_desc','resp_img','article_content','article_author','article_date_v','usercode','openid'])->find($id)->toArray();
        if(!$id)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'没有该帖子','data'=>null]);
        if(!$model['openid']){
            $umodel = Member::where(['usercode'=>$model['usercode']])->first();
            Article::where('id', $id)->update(['openid' => $umodel['openid']]);
        }

        $reporter = Article::active()->select(\DB::raw("id,article_title as realname,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img,article_content,usercode,region_v as job,region "))->find($id)->toArray();
        $reporter['resp_img'] = env('ATTACHMENT_URL').$model['resp_img'];
        /* 我的读者 */
        $vote_info= Vote::orderBy('id','desc')->select(\DB::raw("id ,title as resp_desc,atlas as resp_img,personnum as votes "))->first()->toArray();
        if($vote_info['resp_img'])
            $vote_info['resp_img'] = env('ATTACHMENT_URL').current(unserialize($vote_info['resp_img']));
        /* 我的稿件/ */
        $articles = Article::active()->limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['openid'=>$umodel['openid']])->get()->toArray();

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
        $model = Article::active()->select(['article_title','resp_desc','resp_img','article_content','article_author','article_date_v','article_readnum_v'])->find($id)->toArray();
        if(!$id)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'没有该帖子','data'=>null]);

        $reporter = Article::active()->select(\DB::raw("id,article_title as realname,CONCAT('".env('ATTACHMENT_URL')."',resp_img,usercode,region) as resp_img,article_content,usercode,region_v as job,region,article_readnum_v"))->find($id)->toArray();
        $reporter['resp_img'] = env('ATTACHMENT_URL').$model['resp_img'];
        /* 我的读者 */
        $vote_info= Vote::orderBy('id','desc')->select(\DB::raw("id ,title as resp_desc,atlas as resp_img,personnum as votes "))->first()->toArray();
        if($vote_info['resp_img'])
            $vote_info['resp_img'] = env('ATTACHMENT_URL').current(unserialize($vote_info['resp_img']));

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
            $model = Vote::find($request->id);
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
            $model = VoteLog::where(['openid'=>$request->openid,'vote_id'=>$request->id])->first();
            if($model)
                $result = ['code'=>200,'status'=>0,'message'=>'您已经投过票了'];
            else
            {
                VoteLog::firstOrCreate(['openid' => $request->openid,'vote_id'=>$request->id]);
                $res = Vote::increment('personnum', 1);
                $result = ['code'=>200,'status'=>1,'message'=>'投票成功','data'=>['votes'=>Vote::find($request->id)->personnum]];
            }
        }
        catch (\Exception $e) {
            $result = ['code'=>200,'status'=>0,'message'=>$e->getMessage()];
        }
        return response()->json($result);
    }

    private function is_json($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
