<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin \Eloquent
 */
class ActivityRecord extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activityid',
        'uniacid',
        'openid',
        'nickname',
        'username',
        'mobile',
        'birthday',
        'headimgurl',
        'pic',
        'msg',
        'jointime',
        'status',
        'street',
        'region',
    ];
    /**
     * 获取报名对应的活动
     */
    public function activity()
    {
        return $this->belongsTo('App\Models\Activity','activityid');
    }
}