<?php
namespace Home\Controller;
use Think\Controller;
class ToubiaoController extends Controller {
    // public function index()
    // {
    //     $this->display('toubiao/index');
    // }

    public function toubiao()
    {
        $rules = array(
            array('bid_money','require','投资金额不能为空!'),
            array('bid_money','number','必须是整数!'),
            array('bid_money','/^[0-9]*[1-9][0-9]*$/','金额不能为空!'),
        );

        if(!IS_POST) {
            $this->display('/toubiao/index');
        }else {
            $toubiao = D('bid');
            $user_id = I('cookie.user_id');
            $bid_money = I('post.bid_money');
            $bid_time = time();
            $data = [
                'user_id' => "$user_id",
                'bid_money' => "$bid_money",
                'bid_time' => "$bid_time"
            ];
            // print_r($data);exit;
            if(!$toubiao->validate($rules)->create()) {
                echo $toubiao->getError();exit;
            }else {
                $toubiao->add($data);
                $this->success('投标成功!');
            }
        }

    }
}