<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\auth\addu.html";i:1541237251;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理员内容页</title>
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
		<label class="layui-form-label">名称</label>
		<div class="layui-input-block">
			<input type="text" class="layui-input name" lay-verify="required" <?php if(isset($v['name'])): ?>value="<?php echo $v['name']; ?>"<?php endif; ?> placeholder="请输入名称" />
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">账号</label>
		<div class="layui-input-block">
			<input type="text" class="layui-input username" lay-verify="required" <?php if(isset($v['username'])): ?>value="<?php echo $v['username']; ?>" readonly<?php endif; ?> placeholder="请输入账号" />
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">密码</label>
		<div class="layui-input-block">
			<input type="password" class="layui-input password" <?php if(!isset($v)): ?>lay-verify="required"<?php endif; ?> placeholder="请输入密码" />
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">确认密码</label>
		<div class="layui-input-block">
			<input type="password" class="layui-input password1" <?php if(!isset($v)): ?>lay-verify="required"<?php endif; ?> placeholder="请输入确认密码" />
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">用户组</label>
		<div class="layui-input-block tid">
			<select name="tid">
			<?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;if(isset($v['tid']) && $v['gid'] == $t['id']): ?>				
				<option selected="selected" value="<?php echo $t['id']; ?>"><?php echo re_substr($t['title'],0,16); ?></option>
				<?php else: ?>
				<option value="<?php echo $t['id']; ?>"><?php echo re_substr($t['title'],0,16); ?></option>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
	</div>

	<div class="layui-form-item layui-center">
		<input type="hidden" class="uid" <?php if(isset($v['id'])): ?>value="<?php echo $v['id']; ?>"<?php endif; ?>>
		<input type="hidden" class="csr" value="0">
		<button class="layui-btn" lay-filter="addLink" lay-submit>提交</button>
	</div>
</form>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
	<script type="text/javascript">
		var add,editu,page,durl;
		var upurl="<?php echo url('index/upload','',''); ?>";
		var surl="<?php echo url('auth/runu','',''); ?>";
	</script>
	<script type="text/javascript" src="/public/static/js/user.js"></script>
</body>
</html>