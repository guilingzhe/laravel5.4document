#管理员表
CREATE TABLE if not exists admin_user (
  admin_user_id int UNSIGNED NOT NULL primary key AUTO_INCREMENT COMMENT '管理员id',
  name char(10) NOT NULL DEFAULT '' COMMENT '管理员姓名 ',
  password char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  salt char(10) NOT NULL DEFAULT '' COMMENT '密码加盐',
  privilege tinyint NOT NULL COMMENT '管理员权限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '管理员表';

#用户表
CREATE TABLE if not exists user (
  user_id int UNSIGNED NOT NULL primary key AUTO_INCREMENT COMMENT '用户id',
  name char(10) NOT NULL DEFAULT '' COMMENT '用户名 ',
  age tinyint NOT NULL COMMENT '年龄 ',
  gender enum("男","女","保密") not null default "保密" COMMENT '性别',
  income smallint UNSIGNED not null COMMENT '收入',
  mobile char(11) NOT NULL DEFAULT '' COMMENT '电话',
  email char(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  address char(50) NOT NULL DEFAULT '' COMMENT '地址',
  password char(32) NOT NULL DEFAULT '' COMMENT '用户密码',
  salt char(10) NOT NULL DEFAULT '' COMMENT '密码加盐'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '用户表';

#充值表
CREATE TABLE if not exists recharge (
  re_id int UNSIGNED NOT NULL primary key AUTO_INCREMENT COMMENT '充值id',
  user_id int UNSIGNED NOT NULL COMMENT '用户id',
  amount int UNSIGNED not null COMMENT '充值金额',
  re_time int(11) UNSIGNED not null COMMENT '充值时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '充值表';

#投标用户表
CREATE TABLE if not exists bid (
  user_id int UNSIGNED NOT NULL primary key AUTO_INCREMENT COMMENT '用户id',
  bid_id int UNSIGNED NOT NULL COMMENT '投标编号',
  bid_money int UNSIGNED not null COMMENT '投标金额',
  bid_time int(11) UNSIGNED not null COMMENT '投标时间',
  interest float(9,2) not null COMMENT '投标利息'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '投标用户表';


#借款记录表
CREATE TABLE if not exists loan (
  loan_id int UNSIGNED NOT NULL primary key AUTO_INCREMENT COMMENT '借款id',
  bid_id int UNSIGNED NOT NULL COMMENT '投标编号',
  user_id int UNSIGNED not null COMMENT '借款人id',
  amount int UNSIGNED not null COMMENT '借款金额',
  loan_time int(11) UNSIGNED not null COMMENT '借款时间',
  rate tinyint UNSIGNED not null COMMENT '利率',
  expire int(11) UNSIGNED not null COMMENT '到期时间',
  pay_money float(11,2) UNSIGNED not null COMMENT '还款金额',
  interest float(11,2) not null COMMENT '投标利息',
  reserved float(11,2) not null COMMENT '已招标金额',
  pub_time int(11) UNSIGNED not null COMMENT '发布时间',
  status tinyint UNSIGNED not null COMMENT '发布状态 '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '借款记录表';

#新闻表
CREATE TABLE if not exists news (
  news_id int(10) UNSIGNED NOT NULL COMMENT '新闻ID',
  title varchar(60) NOT NULL DEFAULT '' COMMENT '新闻标题',
  pic varchar(50) NOT NULL DEFAULT '' COMMENT '新闻插图路径',
  content text NOT NULL DEFAULT '' COMMENT '新闻内容',
  pubtime int(10) UNSIGNED NOT NULL COMMENT '新闻发布时间',
  lastup int(10) UNSIGNED NOT NULL COMMENT '新闻更新时间',
  comm_num smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT '新闻评论数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新闻表';


#评论表
CREATE TABLE if not exists comment (
  comment_id int(10) UNSIGNED NOT NULL COMMENT '评论ID',
  news_id int(10) UNSIGNED NOT NULL COMMENT '新闻ID',
  nick varchar(10) NOT NULL DEFAULT '' COMMENT '评论者昵称',
  content varchar(60) NOT NULL DEFAULT '' COMMENT '评论内容',
  ip int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '评论者ip',
  pubtime int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '评论发布时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论表';

