<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\article\index.html";i:1535789325;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文章列表</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/css/public.css" />
	<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/static/layui/layui.js"></script>
</head>
<body class="childrenBody">
<form class="layui-form">
	<blockquote class="layui-elem-quote quoteBox">
		<form class="layui-form">
			<div class="layui-inline f-right">
				<div class="layui-input-inline">
					<input type="text" class="layui-input searchVal" placeholder="请输入文章标题" />
				</div>
				<a class="layui-btn search_btn" data-type="reload">搜索</a>
			</div>
			<div class="layui-inline">
				<a class="layui-btn layui-btn-normal addNews_btn"><i class="layui-icon">&#xe654;</i>添加文章</a>
			</div>
			<div class="layui-inline">
				<a class="layui-btn layui-btn-danger layui-btn-normal delAll_btn">批量删除</a>
			</div>
			<div class="layui-inline">
				<select name="cid" lay-filter="move">
					<option>文章转移到</option>
					<option value="info">单页</option>
					<option value="gbook">表单</option>
					<option value="link">外链</option>
				</select>
			</div>
		</form>
	</blockquote>
	<table id="newsList" lay-filter="newsList"></table>
	<!--审核状态-->
	<script type="text/html" id="newsStatus">
		{{#  if(d.newsStatus == "1"){ }}
		<span class="layui-red">等待审核</span>
		{{#  } else if(d.newsStatus == "0"){ }}
		<span class="layui-blue">已存草稿</span>
		{{#  } else { }}
			审核通过
		{{#  }}}
	</script>

	<!--操作-->
	<script type="text/html" id="newsListBar">
		<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
		<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
		<a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">预览</a>
	</script>
</form>
<script>var url="<?php echo url('article/fpage',['id'=>$id],''); ?>";</script>
<script type="text/javascript" src="/public/static/js/newsList.js"></script>
</body>
</html>