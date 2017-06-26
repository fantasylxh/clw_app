<?php

namespace App\Http\Controllers\Api\Store;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
class StoreController extends Controller
{
    /**
     * 门店列表
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $request)
    {
        $list = Store::orderBy('id','desc')->select(\DB::raw("id,storename,address,tel"))->where(['status'=>1])->get()->toArray();
        $result = ['code'=>200,'status'=>1,'message'=>'门店列表','data'=>$list];
        return response()->json($result);

    }

}
