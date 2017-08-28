<?php

namespace App\Http\Requests\Interfaces;

use App\Http\Requests\Request;
use App\Models\Member;

/**
 * Class DoctorRank
 * @package App\Http\Requests\Interfaces
 * @mixin Request
 */
trait MemberCheck
{

    /**
     * @description 验证用户是否合法
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function checkMember(array $params)
    {
        $map = ['realname'=>$params['realname'],'usercode'=>$params['usercode']];
        if(Member::where($map)->first())
            Member::where($map)->update(['openid'=>$params['openid']]);
        
        $model = Member::where(['openid'=>$params['openid']])->first();
        return $model ? $model : false;
    }

}