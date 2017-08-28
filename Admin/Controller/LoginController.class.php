<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller{
  //登录
  public function login(){
    if(!IS_POST){
      $this->display();
    }else{
      $name = I('post.name');
      $user = D('user')->where("name='$name'")->find();
      if(!$user){
        echo "用户名不存在";
      }else{
      if(I('post.password')===$user['password']){
        	cookie('name',$user['name']);
          cookie('coode',md5($user['name'].C('salt')));
        $this->redirect('Admin/IndexUser/index');
      }else{
        echo "密码错误";
      }
    }
}
  }
  //退出登录
  public function logout(){
    cookie('name',null);
    $this->redirect('/Admin/Login/login');
  }
  //页面展示
  public function zhanshi(){
    $user = D('user');
    $auth=M('auth');
    $auths=$auth->where('privilege='.$user['privilege'])->find();
    var_dump($auths);
  }
}

 ?>
