<?php
namespace Home\Controller;
use Think\Controller;
class ChongzhiController extends Controller {

    public $rules = array(
            // array('amount','require','充值金额不能为空!'),
            array('amount','number','必须是整数!'),
            array('amount','/^[0-9]*[1-9][0-9]*$/','金额不能为空!'),
        );

    public function charge()
    {
       /* $rules = array(
            // array('amount','require','充值金额不能为空!'),
            array('amount','number','必须是整数!'),
            array('amount','/^[0-9]*[1-9][0-9]*$/','金额不能为空!'),
        );*/

       if(!IS_POST) {
        $this->display('chongzhi/chongzhi');
       // }else {
       //      $char = D('recharge');
       //      $amount = I('post.amount');
       //      $user_id = I('cookie.user_id');
       //      $balance = I('post.amount');
       //      $time = time();
       //      $data = [
       //          "re_time" => "$time",
       //          "amount" =>  "$amount",
       //          "user_id" => "$user_id",
       //          "balance" => "$balance"
       //      ];
       //      // print_r($data);exit;
       //      if(!$char->validate($rules)->create()) {
       //          echo $char->getError(); exit;
       //      }else {
       //          $char->add($data);
       //          $this->redirect('/Home/chongzhi/chongzhi','充值成功');
       //      }
        }
    }

    public function chongzhi()
    {
        $charModel = D('recharge');
        $user_id = I('cookie.name');
        $charlist = $charModel->where('user_id')->find();
        // $charlist = $charModel->where("user_id=5")->select();
        $charlist = $charModel->select();
        // print_r($charlist);exit;
        // var_dump($charlist['0']['re_id']);exit;
        $this->assign('list', $charlist);
        $this->display('user_admin/Chongzhi/index');
    }


    public function index()
    {
        $this->display('user_admin/chongzhi/index');
    }


    //pay
    public function pay()
    {
        $amount = I('post.amount');
        $data = [];
        $data['v_amount'] = "$amount";
        $data['amount'] = $amount;
        $data['re_time'] = time();
        $data['user_id'] = I('cookie.user_id');
        $data['v_moneytype'] = 'CNY';
        $data['v_oid'] = date('Ymd').mt_rand(1,9);
        $data['v_mid'] = '1009002';
        $data['v_url'] = 'http://p2p.com/home/chongzhi/paysucc';
        $data['key'] = 'DJFKklslkdf%78ew9@@@@';
        $data['v_md5info'] =strtoupper(md5($data['v_amount'].$data['v_moneytype'].$data['v_oid'].$data['v_mid'].$data['v_url'].$data['key']));

        $reModel = D('recharge');
        $reModel->add($data);
        $this->assign('pay', $data);
        $this->display('pay');

        // print_r($data);
        // print_r($_POST);
        // exit;

    }

    //充值成功返回的地址
    public function paysucc()
    {
        $this->success('支付成功!','chongzhi');
        // echo '<pre>';
        // var_dump($_POST);
    }

}