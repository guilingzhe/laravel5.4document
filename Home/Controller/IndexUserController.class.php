<?php
namespace Home\Controller;
use Think\Controller;
class IndexUserController extends Controller {
    public function index(){
        $this->display('user_admin/index/index');
    }
    public function layout(){
    	$this->display('user_admin/index/layout');
    }
}