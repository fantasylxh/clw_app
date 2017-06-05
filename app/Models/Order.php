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
        return $this->belongsTo(\App\Models\MemberAddress::class,'addressid');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}