<?php
namespace app\supre\controller;
use think\Controller;

class Other extends Controller
{
// 引入入住流程视图文件
  public function proce(){
  return  $this->fetch('Proce');
  }
// 引入入驻协议视图文件
  public function agree(){
    return $this->fetch('Agree');
  }
// 引入入驻帮助视图文件
  public function rhelp(){
    return $this->fetch('Rhelp');
  }
// 引入了解更多视图文件
  public function undmore(){
    return $this->fetch('Undmore');
  }
}


 ?>
