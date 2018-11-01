<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\banner\index.html";i:1537580971;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>图片管理</title>
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
<form class="layui-form">
	<blockquote class="layui-elem-quote news_search">
		<div class="layui-inline">
			<input type="checkbox" name="selectAll" id="selectAll" lay-filter="selectAll" lay-skin="primary" title="全选">
		</div>
		<div class="layui-inline">
			<a class="layui-btn layui-btn-sm layui-btn-danger batchDel">批量删除</a>
		</div>
		<div class="layui-inline">
			<a class="layui-btn layui-btn-sm add">上传图片</a>
		</div>
	</blockquote>
	<ul class="layer-photos-demo" id="Images"></ul>
</form>
<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/public/static/layui/layui.js"></script>
<script type="text/javascript">
	var url="<?php echo url('banner/page'); ?>";
	var addurl="<?php echo url('banner/add'); ?>";
	var edurl="<?php echo url('banner/edit','',''); ?>";
	var durl="<?php echo url('banner/del'); ?>";
	var upurl="<?php echo url('index/upload','',''); ?>";
</script>
<script type="text/javascript" src="/public/static/js/images.js"></script>
</body>
</html>