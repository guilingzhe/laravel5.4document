<?php
namespace Admin\Controller;
use Think\Controller;
class IndexUserController extends Controller {
    public function index(){
        $this->display('Index/index');
    }
    public function admin(){
        $this->display('Index/admin');
    }
    public function bid(){
        $this->display('Index/bid');
    }
    public function change(){
        $this->display('Index/change');
    }
    public function commlist(){
        $this->display('Index/commlist');
    }
    public function loan(){
        $this->display('Index/loan');
    }
    public function login(){
        $this->display('Index/login');
    }
    public function newsadd(){
        $this->display('Index/newsadd');
    }
    public function newslist(){
        $this->display('Index/newslist');
    }
    public function recharge(){
        $this->display('Index/recharge');
    }
    public function user(){
        $this->display('Index/user');
    }
}