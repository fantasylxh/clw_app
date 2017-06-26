<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 * @mixin \Eloquent
 */
class Role extends Model
{
    /**
     * 角色用户
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

}