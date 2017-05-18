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

    /**
     * 获取报名对应的活动
     */
    public function activity()
    {
        return $this->belongsTo('App\Models\Activity','activityid');
    }
}