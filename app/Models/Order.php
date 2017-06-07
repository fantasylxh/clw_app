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
    protected $hidden = ['addressid','status'];
    const CREATED_AT = 'createtime';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(\App\Models\MemberAddress::class,'addressid')->select(['realname','mobile','province','city','area','address','zipcode']);
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product','eshop_order_goods', 'orderid','goodsid')->select(\DB::raw("goodsid,title,unit,marketprice,CONCAT('".env('ATTACHMENT_URL')."',thumb) as thumb "))->withPivot('total');
    }

}