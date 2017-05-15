<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @mixin \Eloquent
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'eshop_goods';

    public function banners()
    {
        return $this->hasMany(ProductBanner::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailImages()
    {
        return $this->hasMany('App\Models\ProductDetailImage', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bannerImages()
    {
        return $this->hasMany('App\Models\ProductBannerImage', 'product_id');
    }

}
