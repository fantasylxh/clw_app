<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin \Eloquent
 */
class ShopNotice extends Model
{
    protected $table = 'eshop_notice';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'openid',
        'member_id',
        'article_id',
        'content',
        'uniacid',
        'displayorder'
    ];

    /**
     * 获取报名对应的用户
     */
    public function member()
    {
        return $this->belongsToMany('App\Models\Member','member_id');
    }

}