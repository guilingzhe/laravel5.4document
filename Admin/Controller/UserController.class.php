<?php
namespace Admin\Controller;
use Think\Controller;
use Home\Model\User;
class UserController extends Controller {

    //用户列表
    public function index(){
        $name=cookie('name');
        // var_dump($user);exit;
        $user=D('user')->where("name='$name'")->find();
        $auth=D('auth')->where('privilege='.$user['privilege'])->find();
        // var_dump($auth);
        $this->assign('auth',$auth);

    	$user = D('User');
    	$res = $user->select();

    	$this->assign('res',$res);
        $this->display('Index/user');
    }

    //用户详情
    public function user(){
        $name=cookie('name');
        // var_dump($user);exit;
        $user=D('user')->where("name='$name'")->find();
        $auth=D('auth')->where('privilege='.$user['privilege'])->find();
        // var_dump($auth);
        $this->assign('auth',$auth);


    	$id = I('get.id');
    	$user = D('User');
    	$res = $user->find($id);
    	$this->assign('res',$res);
        $this->display('Index/user_xiang');
    }




}