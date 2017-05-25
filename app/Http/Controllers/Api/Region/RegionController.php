<?php

namespace App\Http\Controllers\Api\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\RegionCategory;
class RegionController extends Controller
{
    /**
     * 获取子区域分类
     * @author      lxhui<772932587@qq.com>
     * @since 1.0
     * @return array
     */
    public function index(Request $request )
    {
        try {
            $list = RegionCategory::select(['id','name'])->where(['parentid'=>0,'enabled'=>1])->get()->toArray();
            $result= $this->getMenuTree($list);
            $result = ['code'=>200,'status'=>1,'message'=>'社区街道分类','data'=>$result];
        }
        catch (\Exception $e) {
            $result = ['code'=>200,'status'=>0,'message'=>'找不到该分类','data'=>null];
        }
        return response()->json($result);
    }

    /**
     * 递归无限级分类【先序遍历算】，获取任意节点下所有子孩子
     * @param array $arrCate 待排序的数组
     * @param int $parent_id 父级节点
     * @param int $level 层级数
     * @return array $arrTree 排序后的数组
     */
    function getMenuTree($arrCat, $parent_id = 0, $level = 0)
    {
        if( empty($arrCat)) return FALSE;
        $level++;
        foreach($arrCat as  &$value)
        {
            //$value[ 'level'] = $level;
            $result = RegionCategory::select(['id','name'])->where(['parentid'=>$value['id'],'enabled'=>1])->get()->toArray();
            $tag = $level==1 ? 'street' : 'community';
            if($result)
                $value[$tag] = $this->getMenuTree($result,$value['id'],$level);
        }
        return $arrCat;
    }

}
