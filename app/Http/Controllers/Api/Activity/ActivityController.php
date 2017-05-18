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
        $records = ['count'=>$count,'records'=>$results->toArray()];
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
            $result =$this->checkAgent($data);
            if (\Auth::check())
            {
                if(\Auth::user()->is_agent)
                    return response()->json(['code' => 200, 'status' => 0, 'message' => '您已经登记过了!']);
            }
            $data['user_id'] = \Auth::id();
            try {
                if($result['status'] ==1)
                {
                    /* 登记科室 */
                    $depart_ids_arr = json_decode($request->depart_ids,true);
                    if(is_array($depart_ids_arr))
                    {
                        foreach($depart_ids_arr as $val)
                            OrderDepart::firstOrCreate(['depart_id' => $val['depart_id'],'user_id'=>\Auth::id()]);
                    }
                    /* 登记服务 */
                    $service_type_ids_arr = json_decode($request->service_type_ids,true);
                    if(is_array($service_type_ids_arr))
                    {
                        foreach($service_type_ids_arr as $val)
                            OrderService::firstOrCreate(['service_type_id' => $val['service_type_id'],'user_id'=>\Auth::id()]);
                    }
                    /* 登记医院 */
                    $hospitals_arr = json_decode($request->hospitals,true);
                    if(is_array($hospitals_arr))
                    {
                        foreach($hospitals_arr as $val)
                        {
                            $model = Hospital::firstOrCreate(['province'=>$val['province'],'city'=>$val['city'],'hospital'=>$val['hospital']]);
                            $hospital_id = $model->id;
                            OrderHospital::firstOrCreate(['hospital_id' => $hospital_id,'user_id'=>\Auth::id()]);
                        }
                    }
                    $updata = [
                        'is_agent' => 1,
                        'real_name'=>$request->real_name,
                        'sex'=>$request->sex,
                        'email'=>$request->email,
                        'province'=>$request->province,
                        'city'=>$request->city,
                        'area'=>$request->area,
                    ];
                    User::where('id', \Auth::id())->update($updata);
                    return response()->json(['code'=>200, 'status' => 1,'message' => '登记成功' ]);
                }
                else
                    return response()->json(['code'=>200, 'status' => 0,'message' => $result['message'] ]);

            } catch (\Exception $e) {
                return response()->json(['code' => 200, 'status' => 0, 'message' => '服务器异常!']);
            }
        }
//        $model = new ServiceType();
//        $s_data = $model->lists(); // 服务类型
//        $d_data = Department::all();

        return view('web.agent.agent-sign')->with([
            // 's_data' => $s_data,
            // 'd_data' => $d_data,
        ]);

    }

}
