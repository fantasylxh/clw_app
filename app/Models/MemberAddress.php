<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MemberAddress
 * @package App\Models
 * @mixin \Eloquent
 */
class MemberAddress extends Model
{
    protected $table = 'eshop_member_address';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'openid',
        'uniacid',
        'realname',
        'mobile',
        'province',
        'city',
        'area',
        'address',
        'isdefault',
        'zipcode',
        'deleted',
    ];
//    public function getCreatedAtAttribute($date)
//    {
//        if (Carbon::now() < Carbon::parse($date)->addDays(10)) {
//            return Carbon::parse($date);
//        }
//        return Carbon::parse($date)->diffForHumans();
//    }
    /**
     * 获取报名对应的用户
     */
    public function member()
    {
        return $this->belongsToMany('App\Models\Member','member_id');
    }
    /**
     * 获取评论对应的文章
     */
    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }
}