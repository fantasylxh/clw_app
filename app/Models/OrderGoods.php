<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MemberAddress
 * @package App\Models
 * @mixin \Eloquent
 */
class OrderGoods extends Model
{
    protected $table = 'eshop_order_goods';
    public $timestamps = false;

}