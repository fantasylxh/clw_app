<?php

namespace App\Http\Controllers\Api\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
//use App\Models\Product;

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

        $recommend =  [
            'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/801/727/3243727108_1756970588.220x220.jpg',
            'product_name'=>'数码相机',
            'product_id'=>1,
        ];
        $bool = [ [
            'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/452/371/2968173254_571424700.220x220.jpg',
            'product_name'=>'数码戒指',
            'product_price'=>'156.9',
            'product_id'=>1,
        ],
            [
                'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/452/371/2968173254_571424700.220x220.jpg',
                'product_name'=>'数码戒指',
                'product_price'=>'100g/斤',
                'product_id'=>2,
            ]];
        $theme =   [
            'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/982/866/2966668289_571424700.220x220.jpg',
            'product_name'=>'主题旅游',
            'product_id'=>3,
        ];
        $sale = [ [
            'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/712/872/3598278217_29062745.220x220.jpg_.webp',
            'product_name'=>'数码戒指2',
            'product_price'=>'200g/斤',
            'product_id'=>1,
        ],
            [
                'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/552/465/3709564255_88036974.220x220.jpg',
                'product_name'=>'数码戒指3',
                'product_price'=>'345',
                'product_id'=>2,
            ]];
        $products = [ [
            'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/712/872/3598278217_29062745.220x220.jpg_.webp',
            'product_name'=>'数码戒指4',
            'product_price'=>'145',
            'product_id'=>1,
        ],
            [
                'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/552/465/3709564255_88036974.220x220.jpg',
                'product_name'=>'数码戒指5',
                'product_price'=>'245',
                'product_id'=>2,
            ]];
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
     * 产品宣传
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function detail($id)
    {
        $thumbnail  =  [ [
            'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/712/872/3598278217_29062745.220x220.jpg_.webp',
            'product_name'=>'数码戒指4',
            'product_id'=>1,
        ],
            [
                'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/552/465/3709564255_88036974.220x220.jpg',
                'product_name'=>'数码戒指5',
                'product_id'=>2,
            ]];
        $product_info =  [
            'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/801/727/3243727108_1756970588.220x220.jpg',
            'product_name'=>'数码相机',
            'product_price'=>'645',
            'desc'=>'<div class="widget-custom-container">


<div id="mod-detail-description" class="mod-detail-description mod-info mod" data-mod-config="{&quot;showOn&quot;:[&quot;mod-detail-description&quot;],&quot;title&quot;:&quot;详细信息&quot;,&quot;tabConfig&quot;:{&quot;trace&quot;:&quot;tabdetail&quot;,&quot;showKey&quot;:&quot;mod-detail-description&quot;} ,&quot;catalog&quot;:[{&quot;contentUrl&quot;:&quot;https://img.alicdn.com/tfscom/TB1sNgwQXXXXXafapXXXXXXXXXX&quot;,&quot;id&quot;:&quot;0&quot;,&quot;title&quot;:&quot;图文详情&quot;}] }" ready-to-show="true">
	
	    <div class="de-description-detail fd-editor  nocatalog" id="de-description-detail">
	    	    	    								<div id="desc-lazyload-container" class="desc-lazyload-container" data-url="https://laputa.1688.com/offer/ajax/OfferDesc.do" data-tfs-url="https://img.alicdn.com/tfscom/TB104c1QXXXXXXxXFXXXXXXXXXX" data-enable="true"><div id="offer-template-0"></div><p>&nbsp;</p><p><img border="0" height="781" src="https://cbu01.alicdn.com/img/ibank/2014/226/665/1691566622_818649656.jpg" usemap="#Map" width="750" style="visibility: visible; zoom: 1;"><map name="Map"><area coords="8,202,248,480" href="https://detail.1688.com/offer/1280497401.html" shape="rect"><area coords="255,202,495,477" href="https://detail.1688.com/offer/37289046608.html" shape="rect"><area coords="502,202,742,479" href="https://detail.1688.com/offer/39515791683.html" shape="rect"><area coords="8,490,248,765" href="https://detail.1688.com/offer/1282429936.html" shape="rect"><area coords="255,489,496,764" href="https://detail.1688.com/offer/39362274767.html" shape="rect"><area coords="502,489,743,765" href="https://detail.1688.com/offer/40528662430.html"></map><img src="https://cbu01.alicdn.com/img/ibank/2015/380/453/2503354083_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br><strong><span style="font-size: 16.0pt;">本店阿里巴巴网站上的图片，均为近期实物拍摄，因为是手工打磨，又都是天然材料，所以，产品不会千篇一律，图片与所购实物，虽形状一样，在纹理细节上会有差异，就象天下没有两片一样的树叶，但同一种木艺，同一种材质，同一个档次，不会相差很大，请心中有数。&nbsp;</span></strong></p><p><span><span style="font-size: 18.0pt;"><img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2013/815/818/933818518_818649656.jpg" style="visibility: visible; zoom: 1;"><br><span style="background-color: #ff0000;color: #ffffff;font-size: 24.0pt;"><strong>聚缘轩金牌供应商郑重承诺：所售佛珠均为真材实料，假一罚十，并承担来回运费！诚邀批发鉴赏！&nbsp;</strong></span><br></span></span></p><p>&nbsp;</p><p><span style="color: #000000;font-size: 16.0pt;">&nbsp;<span style="color: #ff0000;">这款珠子取自陈年老料 色泽比较深沉 油性密度一流 带有金星 原创首发 一共4串 售完即下架！</span></span></p><p><span>&nbsp;<img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2015/225/134/2352431522_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br><img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2015/372/044/2352440273_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br><img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2015/348/185/2353581843_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br><img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2015/926/824/2352428629_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br><img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2015/809/087/2350780908_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br><img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2015/264/395/2353593462_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br><img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2015/862/734/2352437268_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br><img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2015/540/995/2353599045_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br><img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2015/973/695/2353596379_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br><img alt="undefined" src="https://cbu01.alicdn.com/img/ibank/2015/507/485/2353584705_818649656.jpg" style="visibility: visible; zoom: 1;"><br><br></span></p><p><span style="font-family: 微软雅黑;font-size: 14.0pt;">我们所有的宝贝均为实拍图，保证产品材质与店铺描述的一致（真伪）、保证产品质量的优质性。坚持不补料、不参坏、不上色（注明的产品除外）！&nbsp;&nbsp;</span></p><p><span style="font-family: 微软雅黑;font-size: 14.0pt;">我们保证及时发货，每日17:00之前的订单，当天出货，默认走圆通快递，个别大件走物流。买家自收到货起48小时内如有质量问题，可调可换！及时联系客服！</span></p><p><span style="font-family: 微软雅黑;font-size: 14.0pt;">&nbsp;</span></p><p><span style="font-family: 微软雅黑;font-size: 14.0pt;">本店所有商品均是厂家直销，价格非常的便宜。欢迎全国各地的广大进货商前来订货。</span></p><p><span style="font-family: 微软雅黑;font-size: 14.0pt;">&nbsp;</span></p><p><span style="font-family: 微软雅黑;font-size: 14.0pt;">所有产品均可混批。混批最少5条起批发，不限制规格与种类。量大者可以享受钻石级会员优惠政策！</span></p><p><span style="font-family: 微软雅黑;font-size: 14.0pt;">&nbsp;</span></p><p><span style="font-family: 微软雅黑;color: #ff0000;font-size: 14.0pt;">联系人：叶晨</span></p><p><span style="font-family: 微软雅黑;color: #ff0000;font-size: 14.0pt;">电话：15759924098</span></p><p><span style="font-family: 微软雅黑;color: #ff0000;font-size: 14.0pt;">QQ： 913508018</span></p><p><span style="font-family: 微软雅黑;color: #ff0000;font-size: 14.0pt;">E-mail：<a href="http://detail.china.alibaba.com/buyer/offerdetail/1036252567.html"><span style="color: #ff0000;">913508018@qq.com</span></a></span></p></div>
								<div class="de-desc-catalog">
		            <ul>
		            </ul>
		            <div class="placeholder"></div>
		        </div>
		        					
	</div>
	
	
</div>



</div>',
            'thumbnail'=>$thumbnail
        ];

        $products = [ [
            'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/712/872/3598278217_29062745.220x220.jpg_.webp',
            'product_name'=>'数码戒指4',
            'product_price'=>'145',
            'product_id'=>1,
        ],
            [
                'product_img'=>'https://cbu01.alicdn.com/img/ibank/2016/552/465/3709564255_88036974.220x220.jpg',
                'product_name'=>'数码戒指5',
                'product_price'=>'245',
                'product_id'=>2,
            ]];
        $list = [
            'product_info'=>$product_info, //推荐
            'products'=>$products //实惠商品
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'最实惠列表','data'=>$list];
        return response()->json($result);

    }

}
