<?php
namespace Home\Controller;
use Think\Controller;
class ToubiaoController extends Controller {
    public function index(){
        $this->display('user_admin/toubiao/index');
    }
}