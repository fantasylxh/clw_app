<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin \Eloquent
 */
class Order extends Model
{
    public $timestamps = false;
    protected $table = 'eshop_order';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(\App\Models\MemberAddress::class,'addressid')->select(['realname','mobile','province','city','area','address','zipcode']);
    }
    public function products()
    {
        //return $this->belongsToMany(\App\Models\Product::class,'eshop_order_goods', 'id','goodsid')->select(\DB::raw("goodsid,title,unit,marketprice,CONCAT('".env('ATTACHMENT_URL')."',thumb) as thumb "))->withPivot('total');
        return $this->belongsToMany(\App\Models\Product::class,'eshop_order_goods', 'id','goodsid')->select(['title','thumb','unit','marketprice'])->withPivot('total');
    }

}