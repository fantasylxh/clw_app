<?php

namespace App\Http\Controllers\Api\Activity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Activity;
class ActivityController extends Controller
{
    /**
     * 活动列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $requests)
    {
        /* 城会玩活动 */
        $activity = Activity::orderBy('id','desc')->select(\DB::raw("id,title,fee,starttime,atlas as img_url,is_online "))->paginate(10)->toArray();
        unset($activity['from'],$activity['to']);

        foreach($activity['data'] as &$val)
        {
            $pic =unserialize($val['img_url']);
            $val['img_url'] = env('ATTACHMENT_URL').$pic[0];
        }

        $list = [
            'activity'=> $activity,
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'城会玩','data'=>$list];
        return response()->json($result);

    }

}
