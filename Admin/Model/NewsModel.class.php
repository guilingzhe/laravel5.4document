<?php
namespace Admin\Model;

use Think\Model;

class NewsModel extends Model{
  //自动填充
  protected $_auto = array(
  array('pubtime','time',1,'function'),

  );
  //自动验证
  protected $_validate = array(
array('title','3,30','标题过短',1,'length',3),
);
}

 ?>
