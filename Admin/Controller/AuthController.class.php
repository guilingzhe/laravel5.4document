<?php
namespace Admin\Controller;
use Think\Controller;

class AuthController extends Controller{
  //权限分配
  public function auth(){
    if(!IS_POST){
      //左侧栏目展示
        $name=cookie('name');
        // var_dump($user);exit;
        $user=D('user')->where("name='$name'")->find();
        $auth=D('auth')->where('privilege='.$user['privilege'])->find();
        // var_dump($auth);
        $this->assign('auth',$auth);

        $this->display('index/auth');
    }else{
      //  var_dump($_POST);exit;
      $auth=D('auth');
      $auth->root=I('post.root');
      $auth->rootAddress=I('post.rootAddress');
      $auth->user=I('post.user');
        $auth->userAddress=I('post.userAddress');
      $auth->auth=I('post.auth');
        $auth->authAddress=I('post.authAddress');
      $auth->money=I('post.money');
        $auth->moneyAddress=I('post.moneyAddress');
      $auth->toubiao=I('post.toubiao');
        $auth->toubiaoAddress=I('post.toubiaoAddress');
      $auth->jiekuan=I('post.jiekuan');
        $auth->jiekuanAddress=I('post.jiekuanAddress');
      $auth->news=I('post.news');
        $auth->newsAddress=I('post.newsAddress');
      $auth->newsfabu=I('post.newsfabu');
        $auth->newsfabuAddress=I('post.newsfabuAddress');
      $auth->pinglun=I('post.pinglun');
          $auth->pinglunAddress=I('post.pinglunAddress');
      if($auth->add()){
        $this->success('添加成功','',3);
      }else{
        $this->redirect();
      }

    }

  }

}

 ?>
