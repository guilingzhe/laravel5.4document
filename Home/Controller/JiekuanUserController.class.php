<?php
namespace Home\Controller;
use Think\Controller;
class JiekuanUserController extends Controller {
    public function index(){
        $this->display('user_admin/jiekuan/index');
    }
}