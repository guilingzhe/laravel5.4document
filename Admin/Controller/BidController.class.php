<?php 
namespace Admin\Controller;
use Think\Controller;

class BidController extends Controller
{
    public function bid()
    {
        $bid = D('bid');
        $list = $bid->select();
        $this->assign('list',$list);
        $this->display('Index/bid');
    }
}