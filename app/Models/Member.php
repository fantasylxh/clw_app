<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'eshop_member';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uniacid',
        'groupid',
        'level',
        'agentid',
        'openid',
        'realname',
        'mobile',
        'weixin',
        'content',
        'createtime',
        'agenttime',
        'status',
        'isagent',
        'clickcount',
        'agentlevel',
        'nickname',
        'credit1',
        'experience',
        'credit2',
        'birthyear',
        'birthmonth',
        'birthday',
        'gender',
        'avatar',
        'province',
        'city',
        'area',
        'childtime',
        'inviter',
        'agentnotupgrade',
        'agentselectgoods',
        'agentblack',
        'fixagentid',
        'commission',
        'commission_pay',
        'isblack',
    ];

}
