<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin \Eloquent
 */
class Store extends Model
{
    protected $table = 'eshop_store';
    public $timestamps = false;
}