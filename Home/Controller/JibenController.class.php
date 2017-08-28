<?php
namespace Home\Controller;
use Think\Controller;
use Admin\Model\User;
class JibenController extends Controller {
    public function index(){
    	$user = D('User');
    	$res = $user->where("mobile='".session('mobile')."'")->find();
    	$this->assign('res',$res);
        $this->display('user_admin/jiben/index');
    }


    //基本资料补充逻辑
    public function wanshan(){
    	$user = D('User');
    	$user->name = I('post.name');
    	$user->age = I('post.age');
    	$user->gender = I('post.gender');
    	$user->income = I('post.income');
    	$user->address = I('post.address');
    	$user->where("mobile='".session('mobile')."'")->save();
    	return redirect('/Home/Jiben/index');
    }
}