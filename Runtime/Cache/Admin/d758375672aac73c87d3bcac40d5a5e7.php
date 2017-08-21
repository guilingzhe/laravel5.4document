<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理中心</title>
	<link rel="stylesheet" href="/Public/admins/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/admins/css/blog.css">
	<script src="/Public/admins/js/jquery.js"></script>
	<script src="/Public/admins/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-sm-4 text-left">
					<!-- <img src="" alt="" style="width:60px;height:60px;border-radius:30px;"> -->
					<h1><strong>后台管理中心</strong></h1>
				</div>
				<div id="you" class="col-sm-8 text-left">
					<a href="" class="btn btn-success"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> 前台首页</a>
					&nbsp;
					<a href="change.html" class="btn btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 密码修改</a>&nbsp;
					<a href="" class="btn btn-danger"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> 退出登录</a>
				</div>
			</div>
		</div>
	</header>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-primary">
    						<div class="panel-heading">模块管理</div>
					        <div class="list-group">
					            <a class="list-group-item" href="admin.html">管理员模块</a>
					            <a class="list-group-item" href="user.html">用户模块</a>
					        </div>
						</div>
							<div class="panel panel-primary">
    						<div class="panel-heading">账户管理</div>
					        <div class="list-group">
					            <a class="list-group-item" href="recharge.html">充值记录</a>
					            <a class="list-group-item" href="bid.html">投标记录</a>
					             <a class="list-group-item" href="loan.html">借款记录</a>
					             
					        </div>
						</div>
						
						<div class="panel panel-primary">
    						<div class="panel-heading">新闻管理</div>
					        <div class="list-group">
					            <a class="list-group-item" href="newslist.html">新闻列表</a>
					            <a class="list-group-item" href="newsadd.html">新闻发布</a>
					            <a class="list-group-item" href="commlist.html">评论列表</a>
					        </div>
						</div>
					</div>
					<div class="col-sm-0"></div>
				</div>
			</div>
			<div class="col-sm-10">
				<ol class="breadcrumb">
				  <li><a href="index.html">首页</a></li>
				  <li><a href="#">新闻管理</a></li>
				  <li class="active">新闻列表</li>
				</ol>
				<div id="web">
				<span><span class="glyphicon glyphicon-edit" aria-hidden="true"><strong> 新闻列表</strong></span>
				<hr>
				    <div class="row">
				    	<div class="col-sm-2"></div>
				    	<div class="col-sm-8">
							<table class="table table-hover table-responsive table-striped">
									<tr>
										<th>文章ID</th>
										<th>文章标题</th>
										<th>作者</th>
										<th>发布时间</th>
										<th>所属栏目</th>
										<th>操作</th>
									</tr>
									<tr>
										<td>12</td>
										<td>清平乐村居</td>
										<td>辛弃疾</td>
										<td>2017年8月17日</td>
										<td>技术</td>
										<td>
											<a href="" class="btn btn-primary btn-xs" type="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  编辑</a>
											<a href="" class="btn btn-warning btn-xs" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 删除</a>
										</td>
									</tr>
							</table>
							<ul class="pagination">
							   <li><a href="#">&laquo;首页</a></li>
							   <li><a href="#">1</a></li>
							   <li><a href="#">2</a></li>
							   <li class="active"><a href="#">3</a></li>
							   <li><a href="#">4</a></li>
							   <li><a href="#">5</a></li>
							   <li><a href="#">6</a></li>
							   <li><a href="#">&raquo;尾页</a></li>
							</ul>
					    </div>
						<div class="col-sm-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>