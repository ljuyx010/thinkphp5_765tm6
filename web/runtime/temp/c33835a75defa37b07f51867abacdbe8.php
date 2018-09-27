<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\gbook\typeadd.html";i:1538020459;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>留言模型</title>
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
	<div class="layui-form-item layui-row layui-col-xs12">
		<div class="layui-col-xs4">
		<label class="layui-form-label">模型名</label>		
		<div class="layui-input-block">
			<input type="text" class="layui-input gName" name="gname" lay-verify="required" <?php if(isset($gname)): ?>value="<?php echo $gname; ?>"<?php endif; ?> placeholder="请输入模型名">
		</div>
		</div>
	</div>
	<?php if(isset($field)): if(is_array($field) || $field instanceof \think\Collection || $field instanceof \think\Paginator): $i = 0; $__LIST__ = $field;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
		<div class="layui-row">
		  <div class="magb15 layui-col-md4 layui-col-xs12">
		    <label class="layui-form-label">留言字段名</label>
		    <div class="layui-input-block userSex">
		      <input type="text" class="layui-input fieldn" name="name[]" lay-verify="required" value="<?php echo $v['title']; ?>" placeholder="请输入字段中文"></div>
		  </div>
		  <div class="magb15 layui-col-md3 layui-col-xs12">
		    <label class="layui-form-label">字段标识</label>
		    <div class="layui-input-block userSex">
		      <input type="text" class="layui-input field" name="bs[]" lay-verify="required" value="<?php echo $v['zd']; ?>" placeholder="请输入字段标识如：title"></div>
		  </div>
		  <div class="magb15 layui-col-md2 layui-col-xs12">
		    <label class="layui-form-label">是否必填</label>
		    <div class="layui-input-block">
		      <input type="checkbox" <?php if(in_array($v['zd'],$no)): ?>checked<?php endif; ?> name="notnull[]" title="必填" ></div>
		  </div>
		  <div class="magb15 layui-col-md2 layui-col-xs12">
		    <label class="layui-form-label">后台列表</label>
		    <div class="layui-input-block">
		      <input type="checkbox" name="dis[]" <?php if(in_array($v['zd'],$dis)): ?>checked<?php endif; ?> title="显示"></div>
		  </div>
		  <div class="magb15 layui-col-md1 layui-col-xs12">
		    <a class="layui-btn layui-btn-warm layui-btn-sm" href="javascript:;">删除字段</a></div>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; else: ?>
	<div class="layui-row last">
		<div class="magb15 layui-col-md4 layui-col-xs12">
			<label class="layui-form-label">留言字段名</label>
			<div class="layui-input-block userSex">
				<input type="text" class="layui-input fieldn" name='name[]' lay-verify="required" placeholder="请输入字段中文">
			</div>
		</div>
		<div class="magb15 layui-col-md3 layui-col-xs12">
			<label class="layui-form-label">字段标识</label>
			<div class="layui-input-block userSex">
				<input type="text" class="layui-input field" name="bs[]" lay-verify="required" placeholder="请输入字段标识如：title">
			</div>
		</div>
		<div class="magb15 layui-col-md2 layui-col-xs12">
			<label class="layui-form-label">是否必填</label>
			<div class="layui-input-block">
				<input type="checkbox" name="notnull[]" title="必填">
			</div>
		</div>
		<div class="magb15 layui-col-md2 layui-col-xs12">
			<label class="layui-form-label">后台列表</label>
			<div class="layui-input-block">
				<input type="checkbox" name="dis[]" title="显示">
			</div>
		</div>
		<div class="magb15 layui-col-md1 layui-col-xs12">
			<a class="layui-btn layui-btn-normal layui-btn-sm" href="javascript:;">增加字段</a>
		</div>
	</div>
	<?php endif; if(isset($field)): ?>
	<div class="layui-form-item layui-row layui-col-xs12 last">
		<div class="layui-input-block">
		<a class="layui-btn layui-btn-normal layui-btn-sm" href="javascript:;">增加字段</a>
	<?php else: ?>
	<div class="layui-form-item layui-row layui-col-xs12">
		<div class="layui-input-block">
	<?php endif; if(isset($id)): ?><input type="hidden" name="id" value="<?php echo $id; ?>"></input><?php endif; ?>
			<a class="layui-btn layui-btn-sm" lay-filter="tj" lay-submit><i class="layui-icon">&#xe609;</i>保存</a>
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

  var zd='<div class="layui-row"><div class="magb15 layui-col-md4 layui-col-xs12"><label class="layui-form-label">留言字段名</label><div class="layui-input-block userSex"><input type="text" class="layui-input fieldn" name="name[]" lay-verify="required" placeholder="请输入字段中文"></div></div><div class="magb15 layui-col-md3 layui-col-xs12"><label class="layui-form-label">字段标识</label><div class="layui-input-block userSex"><input type="text" class="layui-input field" name="bs[]" lay-verify="required" placeholder="请输入字段标识如：title"></div></div><div class="magb15 layui-col-md2 layui-col-xs12"><label class="layui-form-label">是否必填</label><div class="layui-input-block"><input type="checkbox" name="notnull[]" title="必填"></div></div><div class="magb15 layui-col-md2 layui-col-xs12"><label class="layui-form-label">后台列表</label><div class="layui-input-block"><input type="checkbox" name="dis[]" title="显示"></div></div><div class="magb15 layui-col-md1 layui-col-xs12"><a class="layui-btn layui-btn-warm layui-btn-sm" href="javascript:;">删除字段</a></div></div>';
  
  $('.layui-btn-normal').click(function(){
  	$('.last').before(zd);
  	form.render();
  });

  $(document).on('click', '.layui-btn-warm', function() {
    $(this).parents('.layui-row').remove();
  });

  //监听提交
  form.on("submit(tj)", function(data){
  	form.render();
  	var temp=$('.layui-form').serialize();
    $.post("<?php echo url('gbook/runtype'); ?>",temp,function(res){
        if(res){
            top.layer.msg("保存成功！");
            layer.closeAll("iframe");
            //刷新父页面
            parent.location.reload();
        }else{
            top.layer.msg("保存失败！");
        }        
    })
    return false;
  })
});
</script>
</body>
</html>