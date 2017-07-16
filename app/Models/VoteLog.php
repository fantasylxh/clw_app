<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin \Eloquent
 */
class VoteLog extends Model
{
    protected $fillable = [
        'openid',
        'vote_id',
    ];
    /**
     * 获取投票对应的文章
     */
    public function vote()
    {
        return $this->belongsTo('App\Models\Vote');
    }

}