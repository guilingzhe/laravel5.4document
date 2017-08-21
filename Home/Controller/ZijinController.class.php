<?php
namespace Home\Controller;
use Think\Controller;
class ZijinController extends Controller {
    public function index(){
        $this->display('user_admin/zijin/index');
    }
}