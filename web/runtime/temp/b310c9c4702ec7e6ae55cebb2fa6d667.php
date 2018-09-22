<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\subject\add.html";i:1537589010;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>专题设置</title>
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
<form class="layui-form linksAdd">
	<div class="layui-form-item">
		<div class="layui-upload-list linkLogo">
			<img class="layui-upload-img linkLogoImg" <?php if(isset($v['pic'])): ?>src="<?php echo $v['pic']; ?>"<?php endif; ?>>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">专题名称</label>
		<div class="layui-input-block">
			<input type="text" class="layui-input name" lay-verify="required" <?php if(isset($v['subname'])): ?>value="<?php echo $v['subname']; ?>"<?php endif; ?> placeholder="请输入网站名称" />
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">跳转地址</label>
		<div class="layui-input-block">
			<input type="text" class="layui-input url" <?php if(isset($v['url'])): ?>value="<?php echo $v['url']; ?>"<?php endif; ?> placeholder="请输入网站地址" />
		</div>
	</div>
	<div class="layui-form-item layui-center">
		<input type="hidden" class="linkid" <?php if(isset($v['id'])): ?>value="<?php echo $v['id']; ?>"<?php endif; ?>>
		<button class="layui-btn" lay-filter="addLink" lay-submit>提交</button>
	</div>
</form>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
	<script type="text/javascript">
		var url="<?php echo url('subject/page','',''); ?>";
		var upurl="<?php echo url('index/upload','',''); ?>";
		var surl="<?php echo url('subject/runadd','',''); ?>";
	</script>
	<script type="text/javascript" src="/public/static/js/subject.js"></script>
</body>
</html>