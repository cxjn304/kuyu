<?php
namespace app\admin\controller;
//namespace app\admin\model;

use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use app\admin\model\Admin;


class Index extends Controller
{
  protected $beforeActionList = [
          'adminvali' =>  ['only'=>'adminshow'],
          // 'second' =>  ['except'=>'hello'],
          // 'three'  =>  ['only'=>'hello,data'],
      ];

public function index(){
  return  $this->fetch();
}

public function adminvali(Request $request){
// 取得用户名，密码
$arr =  $request->param();
// 验证用户名密码是否正确
$result = DB::query('select * from table_admin_account where admin_user=:admin_user and admin_pass=:admin_pass',['admin_user'=>$arr['admin_user'],'admin_pass'=>$arr['admin_pass']]);
// 如果正确
if($result){
  // // 如果未登录
  // if($result[0]['admin_state']==0){
  // // 登录成功，更新登录状态
  // $row = DB::execute('UPDATE  `table_admin_account` SET  `admin_state` = 1 WHERE  `admin_id` =:admin_id',['admin_id'=>$result[0]['admin_id']]);
  // if($row){
    // 设置session
  Session::set('admin_id',$result[0]['admin_id']);
  if(Session::has('admin_id')){
  return $this->fetch('Adminshow',['login'=>'session以设置']);
}else{
  return $this->fetch('Adminshow',['login'=>'session已过期']);
}
}
// }else{
//   return '该账号已在别的地方登录';}
else{
  // 登录失败，请重试
  return '登录失败，账号名密码错误';
}
}

public function test(){
  if(Session::has('admin_id')){
    return 'session以设置';
  }else{
    return 'session已过期';
  }
}
// public function adminshow(){
//   // $this->adminvali(Request);
//   //$this->loginvali($request);
//   if(Session::has('admin_id')){
//     return $this->fetch('adminshow');
//   }else{
//     return '您还未登录';
//   }
// }
}

 ?>
