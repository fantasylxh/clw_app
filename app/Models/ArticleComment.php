<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin \Eloquent
 */
class ArticleComment extends Model
{
    protected $table = 'eshop_article_comments';
    //public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'openid',
        'member_id',
        'content',
        'uniacid',
    ];
    public function getCreatedAtAttribute($date)
    {
        if (\Carbon::now() < \Carbon::parse($date)->addDays(10)) {
            return \Carbon::parse($date);
        }
        return \Carbon::parse($date)->diffForHumans();
    }
    /**
     * 获取报名对应的用户
     */
    public function member()
    {
        return $this->belongsTo('App\Models\Member','member_id');
    }
}