<?php

namespace App\Http\Controllers\Api\Index;

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
    public function index(Request $request)
    {
        /* 轮播图 */
        $banner_articles = Article::limit(6)->orderBy('id','desc')->select(\DB::raw("id,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>3])->get()->toArray();

        /* 限时特卖 */
        $time_products= Product::limit(2)->orderBy('id','desc')->select(\DB::raw("id as product_id,title as product_name,CONCAT('".env('ATTACHMENT_URL')."',thumb) as product_img,marketprice as product_price"))->where(['istime'=>1])->get()->toArray();

        /* 城里新闻 */
        $news_articles = Article::limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img,article_category "))->where(['article_category'=>1])->get()->toArray();

        /* 活动报名 */
        $active_articles = Activity::limit(7)->orderBy('id','desc')->select(\DB::raw(\DB::raw("id,title as article_title,fee,starttime,atlas as img_url,is_online ")))->get()->toArray();
        if($active_articles)
        {
            foreach($active_articles as  &$val)
            {
                if($val['img_url'])
                {
                    $resp_img = current(unserialize($val['img_url']));
                    $val['resp_img'] =env('ATTACHMENT_URL').$resp_img ;
                }
            }
        }
        /* 社区生活 */
        $life_articles = Article::limit(4)->orderBy('id','desc')->select(\DB::raw("id,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img,article_category "))->where(['article_category'=>5])->get()->toArray();
        /* 城里推荐 */
        $recommend_products= Product::limit(4)->orderBy('id','desc')->select(\DB::raw("id as product_id,title as product_name,CONCAT('".env('ATTACHMENT_URL')."',thumb)  as product_img,productprice as product_price"))->where(['isindex'=>1,'isrecommand'=>1])->where('credit2', '<=', 0)->get()->toArray();
        /* 旅游专题 */
        //$tour_articles = Activity::limit(7)->orderBy('id','desc')->select(\DB::raw(\DB::raw("id,title as article_title,fee,starttime,atlas as img_url,is_online ")))->get()->toArray();

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
        $about = '<h2 class="tit-b" style="margin: 0px; padding: 0px; font-size: 26px; font-family: &quot;Open Sans&quot;, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);">
    关于我们
</h2>
<div class="block" style="padding: 20px 0px 10px; margin: 0px; font-family: &quot;Open Sans&quot;, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);">
    <h4 class="tit-m" style="margin: 20px 0px 0px; padding: 0px; font-size: 20px; color: rgb(255, 102, 0); font-weight: normal; line-height: 2;">
        关于城里网
    </h4>
    <p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 2; color: rgb(102, 102, 102);">
        城里网2012年正式上线，由省委宣传部批准建设的地方新闻门户网站。立足社区基层，覆盖大连区域，为百姓提供衣食住行吃喝玩乐等各方面的资讯和信息，定期组织活动，丰富社区文化生活。
    </p>
    <p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 2; color: rgb(102, 102, 102);">
        创业邦为创业者提供高价值的资讯与服务，推动中国创新创业。旗下拥有传媒互动、创业孵化、融资服务等业务
    </p>
</div>
<div class="block" style="padding: 20px 0px 10px; margin: 0px; font-family: &quot;Open Sans&quot;, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);">
    <p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 2; color: rgb(102, 102, 102);">
        网站设有《城里新闻》、《城里摄影》、《社区生活》、《专题活动》、《校园部落》《城里影视》等栏目，自上线以来，先后策划并执行了“东北三省百名记者大连行”、“最具中国范儿大连姑娘大赛”、“夏季达沃斯大连之夜”、“千人徒步大会”、“大连好人之最美环卫工人评选”等活动。。
    </p>
</div>
<div class="block" style="padding: 20px 0px 10px; margin: 0px; font-family: &quot;Open Sans&quot;, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, 微软雅黑, STHeiti, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);">
    <p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 2; color: rgb(102, 102, 102);">
        城里网还涉及影视领域，拍摄了《十年》、《滋味》、《爱本天成》 、《随时受不了》、《地产那些事儿》等微电影，并为金石滩管委会拍摄了《爱情之七种武器》、《也许》等微电影，曾独家承办和深度报道大连金石滩沙滩文化节的分项活动及闭幕式。
    </p>
    <p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 2; color: rgb(102, 102, 102);">
        除参与报道大型赛事活动外，城里网联合各街道政府深入拓展与百姓之间、基层之中的多角度互动，扎根社区，报道民生新闻，展示社区风采。广泛开展“社区欢乐运动节”、“百团大展演”、“社区文化节”、“社区大讲堂”、“爱心帮扶计划”、“社区邻里节”、“情景剧拍摄”、“夏凉晚会”等接地气的活动，深受百姓喜爱。城里网在每个社区建立了记者站，专注报道社区好人好事，传播社会正能量。<br/>城里网的办网宗旨是群策群力，共同打造美好生活！
    </p>
</div>
<p>
    <br/>
</p>';
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
        $about = '<div>
        <ul style="margin-left:20px;">
        <li style="font-size:12px;  line-height:20px;">1、本网特约记者发稿，均视为本网稿件，必须注明特约记者名字，版权视为本网和特约记者所有。

2、本网特约记者发稿要求必须遵守《网络安全法》，稿件为特约记者原创稿件，照片不得带有其他网址或标志。

3、发稿正文格式：

     城里网×月×日讯 （特约记者：×××）**********正文*****************************************************************************************。

4、作为城里网的特约记者，有权力向本网提出促进发展的建议和意见，有义务宣传、关注、支持本网的发展。 </li>
        </ul></div>';
        $result = ['code'=>200,'status'=>1,'message'=>'发稿申明','data'=>$about];
        return response()->json($result);
    }

}
