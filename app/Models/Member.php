<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'eshop_member';
    const UPDATED_AT='updatetime';
    const CREATED_AT = 'createtime';
    //public $timestamps = false;
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
      //  'createtime',
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
        'street',
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
    public function fromDateTime($value){
        return strtotime(parent::fromDateTime($value));
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class)->where('payment_status', 1);
    }

    /**
     * @return mixed
     */
    public function ordersWithProducts()
    {
        return $this->orders()->with(['products' => function ($query) {
            $query->get();
        }]);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

}
