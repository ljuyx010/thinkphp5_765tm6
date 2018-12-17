<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\auth\user.html";i:1541237230;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理员列表</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/css/public.css" />
</head>
<body class="childrenBody">
	<blockquote class="layui-elem-quote quoteBox">
		<form class="layui-form">
			<div class="layui-inline">
				<a class="layui-btn layui-btn-normal addLink_btn">添加管理员</a>
			</div>
			<div class="layui-inline">
				<a class="layui-btn layui-btn-danger layui-btn-normal delAll_btn">批量删除</a>
			</div>
		</form>
	</blockquote>
	<table id="linkList" lay-filter="linkList"></table>
	<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
	<script type="text/javascript">
	var add="<?php echo url('auth/addu'); ?>",
	editu="<?php echo url('auth/editu','',''); ?>",
	page="<?php echo url('auth/user',['f'=>1],''); ?>",
	durl="<?php echo url('auth/delu'); ?>",upurl;
	</script>
	<script type="text/javascript" src="/public/static/js/user.js"></script>
</body>
</html>