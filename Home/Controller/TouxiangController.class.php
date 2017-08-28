<?php
namespace Home\Controller;
use Think\Controller;
class TouxiangController extends Controller {

    public $name = null;
    public function __construct(){
      parent::__construct();
      $this->name = $_COOKIE['name']?$_COOKIE['name']:null;
    }
    public function index(){
        $this->display('user_admin/touxiang/index');
    }

    public function upload(){
    	if(!$_FILES)
    	{
    	$this->display();
    	}else{
    		
    		$lujing = mt_rand(100000,999999).$_FILES['pic']['name'];
    		$res = move_uploaded_file($_FILES['pic']['tmp_name'],'./Public/images/'.$lujing);
        $name = $this->name;
        if($res && $name){
          $data = array('name'=>$name);
          $pic = D('user');
          $pic->img_url = '/public/images/'.$lujing;
          $pic->where($data)->save();
    			$this->redirect('Home/IndexUser/index','',2,'上传成功');
    		}else{
    			$this->error('请先登录');
    		}
    	}
   }
   public function uploadd(){
   		// print_r($_FILES);
   		$lujing = mt_rand(100000,999999).$_FILES['pic']['name'];
   		$re = move_uploaded_file($_FILES['tupian']['tmp_name'],'./Public/images/'.$lujing);
      $name = $this->name;
   		if($re && $name){
          $data = array('name'=>$name);
          $pic = D('user');
          $pic->img_url = '/public/images/'.$lujing;
          $pic->where($data)->save();
   			$this->ajaxReturn(true);
   		}else{
        $this->ajaxReturn(false);
      }
   }
}