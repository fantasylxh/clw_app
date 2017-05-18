<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin \Eloquent
 */
class Activity extends Model
{
    /**
     * @var string
     */
    protected $table = 'activity';

    /**
     * 获取活动的所有报名
     */
    public function records()
    {
        return $this->hasMany('App\Models\ActivityRecord','activityid');
    }
}