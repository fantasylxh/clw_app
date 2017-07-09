<?php

namespace App\Http\Controllers\Api\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * 最实惠首页
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $request)
    {
        /* 最实惠 */
        $recommend= Product::orderBy('id','desc')->select(\DB::raw("id as product_id,title as product_name,CONCAT('".env('ATTACHMENT_URL')."',thumb)  as product_img"))->where(['ishot'=>1,'isrecommand'=>1])->first()->toArray();
        /* 最实惠 */
        $bool= Product::limit(2)->orderBy('id','desc')->select(\DB::raw("id as product_id,title as product_name,CONCAT('".env('ATTACHMENT_URL')."',thumb) as product_img,productprice as product_price,unit,total,credit"))->where(['isdiscount'=>1])->get()->toArray();
        /* 主题旅游 */
        $theme = Article::orderBy('id','desc')->select(\DB::raw("id,article_linkurl,article_author,article_date_v,article_title,CONCAT('".env('ATTACHMENT_URL')."',resp_img) as resp_img "))->where(['article_category'=>6])->first()->toArray();
        /* 限时特卖 */
        $sale= Product::limit(2)->orderBy('id','desc')->select(\DB::raw("id as product_id,title as product_name,CONCAT('".env('ATTACHMENT_URL')."',thumb) as product_img,productprice as product_price,unit,total,credit"))->where(['istime'=>1])->get()->toArray();
        /* 实惠商品 */
        $products= Product::limit(2)->orderBy('id','desc')->select(\DB::raw("id as product_id,title as product_name,CONCAT('".env('ATTACHMENT_URL')."',thumb)  as product_img,productprice as product_price,unit,total,credit"))->where(['isnew'=>1])->get()->toArray();

        $list = [
            'recommend'=>$recommend, //推荐
            'boon'=>    $bool, //最实惠
            'theme'=>  $theme,// 主题旅游
            'sale'=>  $sale,//限时抢购
            'products'=>$products //实惠商品
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'最实惠列表','data'=>$list];
        return response()->json($result);
    }

    /**
     * 积分商品
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index1(Request $request)
    {
        $products= Product::orderBy('id','desc')->select(\DB::raw("id as product_id,title as product_name,CONCAT('".env('ATTACHMENT_URL')."',thumb)  as product_img,credit2"))->where('credit2', '>', 0)->paginate(10)->toArray();

        $list = [
            'products'=>$products //实惠商品
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'积分商品列表','data'=>$list];
        return response()->json($result);

    }

    /**
     * 产品宣传
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function detail($id)
    {
        $model = Product::find($id);
        if(!$model)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'没有该商品','data'=>null]);

        $thumbnail = unserialize($model->thumb_url);
        array_push($thumbnail,$model->thumb);
        for ($i=0;$i<count($thumbnail);$i++)
            $new_arr[$i]['product_img']= env('ATTACHMENT_URL').$thumbnail[$i];
        $thumbnail = $new_arr;

        $product_info =  [
            'product_img'=>env('ATTACHMENT_URL').$model->thumb,
            'product_name'=>$model->title,
            'taobao_price'=>$model->marketprice,//淘宝价
            'product_price'=>$model->productprice,
            'unit'=>$model->unit,
            'desc'=>$model->content,
            'stock'=>$model->total,
            'credit2'=>$model->credit2,
            'express_fee'=>$model->dispatchprice,
            'thumbnail'=>$thumbnail
        ];
        /* 城里推荐 */
        $products= Product::limit(4)->orderBy('id','desc')->select(\DB::raw("id as product_id,title as product_name,CONCAT('".env('ATTACHMENT_URL')."',thumb)  as product_img,productprice as product_price,marketprice as taobao_price,credit2,unit"))->where(['isrecommand'=>1])->get()->toArray();

        $list = [
            'product_info'=>$product_info, //推荐
            'products'=>$products //实惠商品
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'最实惠列表','data'=>$list];
        return response()->json($result);

    }

}
