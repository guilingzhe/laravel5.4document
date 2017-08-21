<?php
namespace Home\Controller;
use Think\Controller;
class JiangjinController extends Controller {
    public function index(){
        $this->display('user_admin/jiangjin/index');
    }
}