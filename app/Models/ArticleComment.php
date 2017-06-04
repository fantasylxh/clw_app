<?php

namespace App\Models;
use Carbon\Carbon;
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
        'article_id',
        'content',
        'uniacid',
        'displayorder'
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