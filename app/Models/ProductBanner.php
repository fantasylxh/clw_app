<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductBanner
 * @package App\Models
 * @mixin \Eloquent
 */
class ProductBanner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_url',
        'weight'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}