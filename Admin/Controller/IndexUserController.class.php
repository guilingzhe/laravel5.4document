<?php
namespace Admin\Controller;
use Think\Controller;
class IndexUserController extends Controller {
    public function index(){
      //左侧栏目展示
        $name=cookie('name');
        // var_dump($user);exit;
        $user=D('user');
        $user=$user->where("name='$name'")->find();
        $auth=D('auth')->where('privilege='.$user['privilege'])->find();
        // var_dump($auth);exit;
        $this->assign('auth',$auth);
        $this->display('Index/welcome');

    }
    //查询管理员表
    public function admin(){
      //左侧栏目展示
        $name=cookie('name');
        // var_dump($user);exit;
        $user=D('user')->where("name='$name'")->find();
        $auth=D('auth')->where('privilege='.$user['privilege'])->find();
        // var_dump($auth);
        $this->assign('auth',$auth);


        $user=D('user');
        $users=$user->select();
        // var_dump($users);exit;
        $this->assign('users',$users);
        $this->display('Index/admin');
    }
    //管理员添加
    public function adminAdd(){

      //左侧p
      $name=cookie('name');
      // var_dump($user);exit;
      $user=D('user')->where("name='$name'")->find();
      $auth=D('auth')->where('privilege='.$user['privilege'])->find();
      // var_dump($auth);
      $this->assign('auth',$auth);

      $user=M('user');
      if(!IS_POST){
        $auth1=D('auth');
        $auth1=$auth1->select();
        // var_dump($auth);exit;
        $this->assign('auth1',$auth1);
        $this->display('Index/adminAdd');
      }else{
        //动态验证
        $rules = array(
          array('name','3,10','账号必须是3-6位字符串',1,'length',3),
          array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
        );

        if (!$user->validate($rules)->create()){
      // 如果创建失败 表示验证没有通过 输出错误提示信息
        exit($user->getError());
        }else{
      // 验证通过 可以进行其他数据操作
      $user->name=I('post.name');
      $user->password=I('post.password');
      $user->privilege=I('post.privilege');
      $user->department=I('post.department');
      $user->add();
      $this->success('添加成功','/Admin/IndexUser/admin',3);
      }
      }
    }

    //管理员删除
    public function adminDelete(){
      $userId=I('id');
      // var_dump($userId);
        $user=D('user');
        $user->delete($userId);
        $this->success('删除管理员成功','',5);
    }
    //管理员修改
    public function adminUpdate(){
      //左侧栏目展示
        $name=cookie('name');
        // var_dump($user);exit;
        $user=D('user')->where("name='$name'")->find();
        $auth=D('auth')->where('privilege='.$user['privilege'])->find();
        // var_dump($auth);
        $this->assign('auth',$auth);


      $user=D('user');
      if(!IS_POST){
        $userId=I('id');
        $userInfo=$user->find($userId);
        //  var_dump($userInfo);exit;
        $userInfo1=$user->select();
        $this->assign('info1',$userInfo1);
        $this->assign('info',$userInfo);
        $this->display('Index/adminUpdate');
      }else{
      // var_dump(I($post));exit;
        $users=$user->where('admin_user_id='.$_POST['id'])->save(I($post));
        // if($users!==false){
          $this->success('修改管理员信息成功','/Admin/IndexUser/admin',3);
        // }
        // else{
        //
        // }
      }
    }
    public function bid(){
      $name=cookie('name');
      // var_dump($user);exit;
      $user=D('user')->where("name='$name'")->find();
      $auth=D('auth')->where('privilege='.$user['privilege'])->find();
      // var_dump($auth);
      $this->assign('auth',$auth);

        $this->display('Index/bid');
    }
    public function change(){
      $name=cookie('name');
      // var_dump($user);exit;
      $user=D('user')->where("name='$name'")->find();
      $auth=D('auth')->where('privilege='.$user['privilege'])->find();
      // var_dump($auth);
      $this->assign('auth',$auth);

        $this->display('Index/change');
    }
    public function commlist(){
      $name=cookie('name');
      // var_dump($user);exit;
      $user=D('user')->where("name='$name'")->find();
      $auth=D('auth')->where('privilege='.$user['privilege'])->find();
      // var_dump($auth);
      $this->assign('auth',$auth);

        $this->display('Index/commlist');
    }
    public function loan(){
      $name=cookie('name');
      // var_dump($user);exit;
      $user=D('user')->where("name='$name'")->find();
      $auth=D('auth')->where('privilege='.$user['privilege'])->find();
      // var_dump($auth);
      $this->assign('auth',$auth);

        $this->display('Index/loan');
    }
    public function newsadd(){
      $name=cookie('name');
      // var_dump($user);exit;
      $user=D('user')->where("name='$name'")->find();
      $auth=D('auth')->where('privilege='.$user['privilege'])->find();
      // var_dump($auth);
      $this->assign('auth',$auth);

      if(!IS_POST){
          $this->display('Index/newsadd');
      }else{
        $news=D('news');
        //图片上传
        $upload = new \Think\Upload();// 实例化上传类
        //$upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/up/'; // 设置附件上传根目录
        $info = $upload->upload();
        if (!$info) {
        var_dump($upload->getError());
        }else{
        $_POST['pic'] = '/Public/Up/'.$info['pic']['savepath'].$info['pic']['savename'];
        }
      if(!$news->create()){
        echo $news->getError();
      }else{
         if($news->add()){
           $this->success('添加成功','/Admin/IndexUser/newslist',3);
         }else{
           echo "添加失败";
         }

      }

      }

    }
    //新闻列表
    public function newslist(){
      $name=cookie('name');
      // var_dump($user);exit;
      $user=D('user')->where("name='$name'")->find();
      $auth=D('auth')->where('privilege='.$user['privilege'])->find();
      // var_dump($auth);
      $this->assign('auth',$auth);


        $newsModel=D('news');
        $count = $newsModel->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数(5)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
       //  var_dump($news);

        $news = $newsModel->order('news_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('news',$news);
        $this->assign('page',$show);
        $this->display('Index/newslist');
    }
    //新闻删除
    public function newsdelete(){
      $id=I(news_id);
      if(D('news')->where('news_id='.$id)->delete()){
        $this->success('删除成功','',3);
      }else{
        echo "删除失败";
      }
    }
    public function recharge(){
      $name=cookie('name');
      // var_dump($user);exit;
      $user=D('user')->where("name='$name'")->find();
      $auth=D('auth')->where('privilege='.$user['privilege'])->find();
      // var_dump($auth);
      $this->assign('auth',$auth);

        $this->display('Index/recharge');
    }
    public function user(){
      $name=cookie('name');
      // var_dump($user);exit;
      $user=D('user')->where("name='$name'")->find();
      $auth=D('auth')->where('privilege='.$user['privilege'])->find();
      // var_dump($auth);
      $this->assign('auth',$auth);

//用户列表
      $user = D('User');
      $res = $user->select();

      $this->assign('res',$res);
        $this->display('Index/user');
        
    }
}
