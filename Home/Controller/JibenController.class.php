<?php
namespace Home\Controller;
use Think\Controller;
class JibenController extends Controller {
    public function index(){
        $this->display('user_admin/jiben/index');
    }
}