<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wwwroot\thinkphp5_765tm6\web/application/index\view\gbook\index.html";i:1538039425;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="keywords" content="<?php echo $keyword; ?>">
	<meta name="description" content="<?php echo $description; ?>">
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
<form class="layui-form" style="width:80%;">
	<?php if(is_array($field) || $field instanceof \think\Collection || $field instanceof \think\Paginator): $i = 0; $__LIST__ = $field;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
	<div class="layui-form-item layui-row layui-col-xs12">
		<div class="layui-col-xs4">
		<label class="layui-form-label"><?php echo $v['title']; ?></label>		
		<div class="layui-input-block">
			<input type="text" class="layui-input gName" name="<?php echo $v['zd']; ?>" <?php if(in_array($v['zd'],$no)): ?>lay-verify="required"<?php endif; ?> placeholder="请输入<?php echo $v['title']; ?>">
		</div>
		</div>
	</div>
	<?php endforeach; endif; else: echo "" ;endif; ?>

	<div class="layui-form-item layui-row layui-col-xs12">
		<div class="layui-input-block">
	    <input type="hidden" name="cid" value="<?php echo $cid; ?>"></input>
			<a class="layui-btn layui-btn-sm" lay-filter="tj" lay-submit><i class="layui-icon">&#xe609;</i>提交</a>
		</div>
	</div>
</form>

<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/public/static/layui/layui.js"></script>
<script>
//Demo
layui.use(['form','layer'], function(){
  var form = layui.form,
  layer = parent.layer === undefined ? layui.layer : top.layer,
  $ = layui.jquery;

  //监听提交
  form.on("submit(tj)", function(data){
  	var temp=$('.layui-form').serialize();
    $.post("<?php echo url('gbook/submit'); ?>",temp,function(res){
        if(res.code){
            top.layer.msg(res.msg);
        }else{
            top.layer.msg(res.msg);
        }        
    })
    return false;
  })
});
</script>
</body>
</html>