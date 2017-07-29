<?php
namespace app\admin\controller;
use think\Controller;
use think\DB;
use think\Request;
use think\Response;

class Exa extends Controller
{
    //显示审核信息
    public function index(){
    $results = DB::query('select * from table_sub_exa');
    //dump($result);
    foreach($results as $key => $value){
        //如果审核类型是供应商
    if($results[$key]['exa_type'] == 'sup'){
        $results[$key]['exa_type'] = '供应商信息';
        $result = DB::query('select * from table_sup_info where `sup_id`=:sup_id',['sup_id'=>$results[$key]['sub_id']]);
        //转为一维数组
        $results[$key] = array_merge($results[$key],$result[0]);
        //审核状态：0待审核，1审核中，2已审核，3审核未通过
        if($results[$key]['exa_state'] == 0){
            $results[$key]['exa_state'] = '待审核';
        }
        elseif($results[$key]['exa_state'] == 1){
            $results[$key]['exa_state'] = '审核中';
        }
        elseif($results[$key]['exa_state'] == 2){
            $results[$key]['exa_state'] = '已审核';
        }
        elseif($results[$key]['exa_state'] == 3){
            $results[$key]['exa_state'] = '审核未通过';
        }
    }
}
return json($results);
}

        //审核中
}

 ?>
