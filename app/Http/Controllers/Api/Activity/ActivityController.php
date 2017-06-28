<?php

namespace App\Http\Controllers\Api\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Activity;
use App\Models\ActivityRecord;
use App\Http\Requests\Interfaces\MemberCheck;
class ActivityController extends Controller
{
    use MemberCheck;
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

    /**
     * 活动详情
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function detail($id)
    {
        $model = Activity::find($id);
        if(!$model)
            return response()->json( ['code'=>200,'status'=>0,'message'=>'没有该活动','data'=>null]);

        $thumbnail = unserialize($model->atlas);
        for ($i=0;$i<count($thumbnail);$i++)
            $new_arr[$i]['img_url']= env('ATTACHMENT_URL').$thumbnail[$i];
        $thumbnail = $new_arr;

        $activity_info =  [
            'title'=>$model->title,
            'fee'=>$model->marketprice,
            'starttime'=>$model->unit,
            'is_online'=>$model->content,
            'address'=>$model->address,
            'detail'=>$model->detail,
            'thumbnail'=>$thumbnail,
            'is_online'=> $model->is_online
        ];
        $results = $model->records()->get(['nickname', 'headimgurl']);
        $count = $results->count();
        $records = ['count'=>$count,'users'=>$results->toArray()];
        $list = [
            'activity_info'=>$activity_info,
            'records'=>$records
        ];
        $result = ['code'=>200,'status'=>1,'message'=>'活动介绍','data'=>$list];
        return response()->json($result);
    }

    /**
     * 报名登记
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            if(!isset($data['activityid']) || !isset($data['openid']))
                return response()->json(['code' => 200, 'status' => 0, 'message' => '活动 activityid和openid 不能为空!']);
            $user_id = $this->checkMember(['openid'=>$request->openid]);
            if(!$user_id)
            {
                $result = ['code'=>200,'status'=>0,'message'=>'该openid未注册'];
                return response()->json($result);
            }

            if(!isset($data['username'] )|| !isset($data['mobile']))
                return response()->json(['code' => 200, 'status' => 0, 'message' => '姓名 username和手机号mobile 不能为空!']);

            $where = ['openid'=>$data['openid'],'activityid'=>$data['activityid']];
            try {
                $update_data = [
                    'username'=>$data['username'],
                    'nickname'=>\App\Models\Member::where(['openid'=>$data['openid']])->first()->nickname,
                    'mobile'=>$data['mobile'],
                    'street'=>isset($data['street']) ? $data['street'] : '',
                    'region'=>isset($data['region']) ? $data['region'] : '',
                    'headimgurl'=>'https://users.chengliwang.com/shop/attachment/jpg/1.jpg'

                ];
                ActivityRecord::updateOrCreate($where,$update_data);
                return response()->json(['code'=>200, 'status' => 1,'message' => '登记成功' ]);

            } catch (\Exception $e) {
                return response()->json(['code' => 200, 'status' => 0, 'message' => $e->getMessage()]);
            }
        }
        else
            return response()->json(['code' => 200, 'status' => 0, 'message' => '无效的请求方式!']);
    }

}
