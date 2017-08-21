<?php
namespace Home\Controller;
use Think\Controller;
class JiaxiController extends Controller {
    public function index(){
        $this->display('user_admin/jiaxi/index');
    }
}