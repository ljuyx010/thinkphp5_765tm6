<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\gbook\edit.html";i:1538041911;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>留言信息</title>
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
	<?php if(is_array($field) || $field instanceof \think\Collection || $field instanceof \think\Paginator): $i = 0; $__LIST__ = $field;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?>
	<div class="layui-form-item layui-row layui-col-xs12">
		<div class="layui-col-xs4">
		<label class="layui-form-label"><?php echo $f['title']; ?></label>		
		<div class="layui-input-block">
			<div class="layui-form-mid layui-word-aux"><?php echo $v[$f['zd']]; ?></div>
		</div>
		</div>
	</div>
	<?php endforeach; endif; else: echo "" ;endif; ?>
	<div class="layui-form-item layui-row layui-col-xs12">
		<div class="layui-col-xs4">
		<label class="layui-form-label">留言日期</label>		
		<div class="layui-input-block">
			<div class="layui-form-mid layui-word-aux"><?php echo date('Y-m-d H:i:s',$v['time']); ?></div>
		</div>
		</div>
	</div>
	<div class="layui-form-item layui-row layui-col-xs12">
		<div class="layui-col-xs4">
		<label class="layui-form-label">留言IP</label>		
		<div class="layui-input-block">
			<div class="layui-form-mid layui-word-aux"><?php echo $v['ip']; ?></div>
		</div>
		</div>
	</div>
	<div class="layui-form-item layui-row layui-col-xs12">
		<label class="layui-form-label">留言回复</label>
		<div class="layui-input-block">
			<textarea placeholder="请输入回复信息（200字内）" class="layui-textarea reply" lay-verify="required"><?php if(isset($v['reply'])): ?><?php echo $v['reply']; endif; ?></textarea>
		</div>
	</div>
	<div class="layui-form-item layui-row layui-col-xs12">
		<div class="layui-input-block">
			<input type="hidden" class="id" value="<?php echo $v['id']; ?>"></input>
			<a class="layui-btn layui-btn-sm" lay-filter="tj" lay-submit><i class="layui-icon">&#xe609;</i>保存回复</a>
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
    $.post("<?php echo url('gbook/reply'); ?>",{id:$('.id').val(),reply:$('.reply').val()},function(res){
        if(res){
            top.layer.msg("回复成功！");
            layer.closeAll("iframe");
            //刷新父页面
            parent.location.reload();
        }else{
            top.layer.msg("回复失败！");
        }        
    })
    return false;
  })
});
</script>
</body>
</html>