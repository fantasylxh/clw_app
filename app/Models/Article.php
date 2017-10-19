<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin \Eloquent
 */
class Article extends Model
{
    /**
     * @var string
     */
    protected $table = 'eshop_article';
    public $timestamps = false;

    /**
     * 只包含激活文章的查询作用域
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('article_state', 1);
    }

    /**
     * 获取文章的评论
     */
    public function comments()
    {
        return $this->hasMany('App\Models\ArticleComment','article_id')->select('created_at','member_id','displayorder','content');
    }
}