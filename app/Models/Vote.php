<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin \Eloquent
 */
class Vote extends Model
{
    public $timestamps = false;
    /**
     * 获取文章的投票
     */
    public function votes()
    {
        return $this->hasMany('App\Models\VoteLog');
    }
}