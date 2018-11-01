<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\subject\index.html";i:1537588905;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>专题管理</title>
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
			<div class="layui-inline f-right">
				<div class="layui-input-inline">
					<input type="text" class="layui-input searchVal" placeholder="请输入搜索的内容" />
				</div>
				<a class="layui-btn search_btn" data-type="reload">搜索</a>
			</div>
			<div class="layui-inline">
				<a class="layui-btn layui-btn-normal addLink_btn">添加专题</a>
			</div>
			<div class="layui-inline">
				<a class="layui-btn layui-btn-danger layui-btn-normal delAll_btn">批量删除</a>
			</div>
		</form>
	</blockquote>
	<table id="linkList" lay-filter="linkList"></table>
	<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
	<script type="text/javascript">
		var url="<?php echo url('subject/page','',''); ?>";
		var addurl="<?php echo url('subject/add'); ?>";
		var edurl="<?php echo url('subject/edit','',''); ?>";
		var durl="<?php echo url('subject/del','',''); ?>";
		var upurl="<?php echo url('index/upload','',''); ?>";
	</script>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
	<script type="text/javascript" src="/public/static/js/subject.js"></script>
</body>
</html>