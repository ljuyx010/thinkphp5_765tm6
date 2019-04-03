<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\login\index.html";i:1543195405;}*/ ?>
<!DOCTYPE html>
<html class="loginHtml">
<head>
	<meta charset="utf-8">
	<title>登录--DpcmsT2.0</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/css/public.css" />
</head>
<body class="loginBody">
	<form class="layui-form">
		<div class="login_face"><img src="/public/static/images/face.jpg" class="userAvatar"></div>
		<div class="layui-form-item input-item">
			<label for="userName">用户名</label>
			<input type="text" placeholder="请输入用户名" autocomplete="off" id="userName" class="layui-input" lay-verify="required">
		</div>
		<div class="layui-form-item input-item">
			<label for="password">密码</label>
			<input type="password" placeholder="请输入密码" autocomplete="off" id="password" class="layui-input" lay-verify="required">
		</div>
		<div class="layui-form-item input-item" id="imgCode">
			<label for="code">验证码</label>
			<input type="text" placeholder="请输入验证码" autocomplete="off" id="code" class="layui-input">
			<img id="verfy" onclick="refresh()" src="<?php echo captcha_src(); ?>">
		</div>
		<div class="layui-form-item">
			<button class="layui-btn layui-block" lay-filter="login" lay-submit>登录</button>
		</div>
		<div class="layui-form-item layui-row" style="font-size:10px;">
			<span class="layui-col-xs6 layui-col-sm6 layui-col-md6 layui-col-lg6">电话:400-6688-605</span>
			<span class="layui-col-xs6 layui-col-sm6 layui-col-md6 layui-col-lg6"><a href="http://www.dpwl.net/">湖北大鹏网络</a>版权所有</span>
		</div>
	</form>
	<script type="text/javascript">
		var check="<?php echo url('login/check'); ?>";
		var tz="/website/";
	</script>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
	<script type="text/javascript" src="/public/static/js/login.js"></script>
	<script type="text/javascript" src="/public/static/js/cache.js"></script>
</body>
</html>