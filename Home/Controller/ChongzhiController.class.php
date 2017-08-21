<?php
namespace Home\Controller;
use Think\Controller;
class ChongzhiController extends Controller {
    public function index(){
    	
        $this->display('user_admin/chongzhi/index');
    }

}