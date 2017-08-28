<?php
namespace Home\Controller;
use Think\Controller;
class IndexUserController extends Controller {
    public function index(){
    	$name = $_COOKIE['name'];
    	$data = ['name'=>$name];
    	$user = D('user')->where($data)->find();
    	// var_dump($user);
    	// exit;
    	$this->assign('user',$user);

        $this->display('user_admin/index/index');
    }
    
}