<?php
namespace Home\Controller;
use Think\Controller;
class TouxiangController extends Controller {
    public function index(){
        $this->display('user_admin/touxiang/index');
    }

    public function upload(){
    	if(!$_FILES)
    	{
    	$this->display();
    	}else{
    		
    		$lujing = './Public/images/'.mt_rand(100000,999999).$_FILES['pic']['name'];
    		//当前文件名尚未上传到数据库,对应字段为img_url;
    		echo $lujing;
    		$res = move_uploaded_file($_FILES['pic']['tmp_name'],$lujing);
    		if($res){
    			echo 'success';
    		}else{
    			var_dump($res);
    			echo 'fail';
    		}
    	}
   }
   public function uploadd(){
   		print_r($_FILES);
   		$lujing = './Public/images/'.mt_rand(100000,999999).$_FILES['tupian']['name'];
   		$re = move_uploaded_file($_FILES['tupian']['tmp_name'],$lujing);
   		if($re){
   			$this->redirect('Home/IndexUser/index',2,'上传成功');
   		}
   		$re = json_encode($re);
   		return $re;
   }
}