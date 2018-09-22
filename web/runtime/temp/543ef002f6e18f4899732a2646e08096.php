<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\banner\add.html";i:1537586300;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>广告图内容页</title>
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
		<div class="layui-upload-list advimg">
			<img class="layui-upload-img linkLogoImg" <?php if(isset($v['pic'])): ?>src="<?php echo $v['pic']; ?>"<?php endif; ?>>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">图片名称</label>
		<div class="layui-input-block">
			<input type="text" class="layui-input name" lay-verify="required" <?php if(isset($v['name'])): ?>value="<?php echo $v['name']; ?>"<?php endif; ?> placeholder="请输入网站名称" />
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">跳转地址</label>
		<div class="layui-input-block">
			<input type="text" class="layui-input url" <?php if(isset($v['url'])): ?>value="<?php echo $v['url']; ?>"<?php endif; ?> placeholder="请输入网站地址" />
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">图片类别</label>
		<div class="layui-input-block tid">
			<select name="tid">
			<?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;if(isset($v['tid']) && $v['tid']==$t['id']): ?>
				<option selected="selected" value="<?php echo $t['id']; ?>"><?php echo re_substr($t['name'],0,16); ?></option>
				<?php else: ?>
				<option value="<?php echo $t['id']; ?>"><?php echo re_substr($t['name'],0,16); ?></option>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">排列序号</label>
		<div class="layui-input-block">
			<input type="text" class="layui-input orders" <?php if(isset($v['orders'])): ?>value="<?php echo $v['orders']; ?>"<?php endif; ?> placeholder="序号从小到大排列" />
		</div>
	</div>
	<div class="layui-form-item">
		<label class="layui-form-label">备注信息</label>
		<div class="layui-input-block">
			<textarea placeholder="备注信息" class="layui-textarea mark"><?php if(isset($v['mark'])): ?><?php echo $v['mark']; endif; ?></textarea>
		</div>
	</div>
	<div class="layui-form-item layui-center">
		<input type="hidden" class="linkid" <?php if(isset($v['id'])): ?>value="<?php echo $v['id']; ?>"<?php endif; ?>>
		<button class="layui-btn" lay-filter="addLink" lay-submit>提交</button>
	</div>
</form>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
	<script type="text/javascript">
		var url="<?php echo url('banner/page','',''); ?>";
		var upurl="<?php echo url('index/upload','',''); ?>";
		var surl="<?php echo url('banner/runadd','',''); ?>";
	</script>
	<script type="text/javascript" src="/public/static/js/images.js"></script>
</body>
</html>