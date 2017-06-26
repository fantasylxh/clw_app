<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
 * @mixin \Eloquent
 */
class User extends Model
{
    /**
     * 用户角色
     */
    public function roles()
    {
        //return $this->belongsToMany('App\Models\Role');
        //return $this->belongsToMany('App\Models\Role')->withPivot('username');
        //return $this->belongsToMany('App\Models\Role')->withPivot('username')->wherePivot('username', '马特2');
        return $this->belongsToMany('App\Models\Role')->wherePivotIn('role_id', [1, 2]);
    }
}