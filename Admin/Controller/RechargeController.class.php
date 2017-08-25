<?php 
namespace Admin\Controller;
use Think\Controller;

class RechargeController extends Controller
{
    public function recharge()
    {
        $recharge = D('recharge');
        $list = $recharge->select();
        $this->assign('list',$list);
        $this->display('Index/recharge');
    }
}