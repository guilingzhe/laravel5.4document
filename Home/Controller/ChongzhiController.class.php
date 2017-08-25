<?php
namespace Home\Controller;
use Think\Controller;
class ChongzhiController extends Controller {
    public function charge()
    {
        $rules = array(
            // array('amount','require','充值金额不能为空!'),
            array('amount','number','必须是整数!'),
            array('amount','/^[0-9]*[1-9][0-9]*$/','金额不能为空!'),
        );
       if(!IS_POST) {
        $this->display('chongzhi/chongzhi');
       }else {
            $char = D('recharge');
            $amount = I('post.amount');
            $user_id = I('cookie.user_id');
            $balance = I('post.amount');
            $time = time();
            $data = [
                "re_time" => "$time",
                "amount" =>  "$amount",
                "user_id" => "$user_id",
                "balance" => "$balance"
            ];
            // print_r($data);exit; 
            if(!$char->validate($rules)->create()) {
                echo $char->getError(); exit;
            }else {
                $char->add($data);
                $this->redirect('/Home/chongzhi/chongzhi','充值成功');
            }
        }
    }

    public function chongzhi()
    {
        $charModel = D('recharge');
        // $charlist = $charModel->where("user_id=5")->select();
        $charlist = $charModel->select();
        // print_r($charlist);exit;
        // var_dump($charlist['0']['re_id']);exit;
        $this->assign('list', $charlist);
        $this->display('user_admin/Chongzhi/index');
    }

    public function test()
    {
        echo I('get.user_id');
    }
}