<?php
namespace Home\Controller;
use Think\Controller;
class TouxiangController extends Controller {
    public function index(){
        $this->display('user_admin/touxiang/index');
    }
}