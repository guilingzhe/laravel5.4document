<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{

	
	public function login(){
		if(empty($_POST)){
			$this->display();
			exit;
		}
		$name = I('post.username');
		$pwd = md5($_POST['password'].C('SALT'));
		$data['name'] = $name;
		$realpwd = D('user')->where($data)->getField('password');
		if($pwd === $realpwd){
			$res=setcookie('name',$name,time()+3600*24);
			var_dump($res);
			$this->success('登录成功','/Home/Index/index');
			setcookie('pwd',md5($name.C('SALT')),time()+3600*24);
		}else{		
			$this->error('用户名或密码错误');
		}
	}
	public function register(){
		$data['name'] = $_POST['usernamesignup'];
		$res = D('user')->where($data)->select();	
		if($res){
			$this->error('用户名已存在');
		}	
		$email = $_POST['emailsignup'];
		$yzm = $_POST['yzm'];
		if($yzm == $_SESSION[$email]){
			$data = D('user');
			$data->name = $_POST['usernamesignup'];
			$data->email = $_POST['emailsignup'];
			print_r($_POST['passwordsignup']);
			$data->password = md5($_POST['passwordsignup'].C('SALT'));
			$data->add();
			// $data->save();
			$this->success('注册成功','/Home/Login/login',5);
		}else{
			$this->error('验证码错误');
		}
	}
	public function email(){
		
		$API_USER = 'w2541262_test_Nbm9cK';
		$API_KEY = 'SURJxz6inwPbCeNd';
		$email = $_GET['email'];
		$yzs = mt_rand(100000,999999);
		session_start();
		$_SESSION[$email] = $yzs;
		$post = array(
            'apiUser' => $API_USER, # 使用api_user和api_key进行验证
            'apiKey' => $API_KEY,
            'from' => '1229742581@qq.com', # 发信人，用正确邮件地址替代
            'fromName' => 'SendCloud',
            'to' => $email,# 收件人地址, 用正确邮件地址替代, 多个地址用';'分隔  
            'subject' => '手投网验证码',
            'html' =>"您的验证码是".$yzs
        );
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_URL, 'http://api.sendcloud.net/apiv2/mail/send');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($post));
		$res = curl_exec($ch);
		print_r($res);
	}
	public function checkname(){
		$name = I('get.name');
		$data['name'] = $name;
		$res = D('user')->where($data)->select();

		if($res){
			$this->ajaxReturn(false);
		}else{
			$this->ajaxReturn(true);
		}
	}

	public function checkemail(){
		$email = I('get.email');
		$data['email'] = $email;
		$res = D('user')->where($data)->select();
		if($res){
			$this->ajaxReturn(false);
		}else{
			$this->ajaxReturn(true);
		}
	}
	public function checkcookie(){
		var_dump($_COOKIE);
	}


}