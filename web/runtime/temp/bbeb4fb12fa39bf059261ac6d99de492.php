<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\link\typeadd.html";i:1537413457;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>设置分类内容</title>
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
<form class="layui-form layui-row layui-col-space10">
	<div class="layui-col-md12 layui-col-xs12">
		<div class="layui-row layui-col-space10">
			<div class="layui-col-md9 layui-col-xs7">
				<div class="layui-form-item magt3">
					<label class="layui-form-label">分类名称</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input name" <?php if(isset($v['name'])): ?>value="<?php echo $v['name']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入分类名称">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">分类排序</label>
					<div class="layui-input-block">
						<input type="text" style="width:200px;" class="layui-input order" name="order" <?php if(isset($v['order'])): ?>value="<?php echo $v['order']; ?>"<?php endif; ?>>
					</div>
				</div>
				<div class="layui-form-item">
				<div class="layui-input-block">
				<input type="hidden" class="id" <?php if(isset($v['id'])): ?>value="<?php echo $v['id']; ?>"<?php endif; ?>></input>
				<a class="layui-btn layui-btn-sm" lay-filter="addNews" lay-submit><i class="layui-icon">&#xe609;</i>保存</a></div>
				</div>
			</div>			
		</div>
	</div>
</form>
<script type="text/javascript" src="/public/static/layui/layui.js"></script>
<script>
layui.use(['form','layer','layedit','laydate','upload'],function(){
    var form = layui.form
        layer = parent.layer === undefined ? layui.layer : top.layer,
        laypage = layui.laypage,
        upload = layui.upload,
        layedit = layui.layedit,
        laydate = layui.laydate,
        $ = layui.jquery;

    form.on("submit(addNews)",function(data){
        //弹出loading
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        // 实际使用时的提交信息
        $.post("<?php echo url('link/runtype'); ?>",{
            name : $(".name").val(), 
            order : $(".order").val(), 
            id : $('.id').val()
        },function(res){        	
        	if(res){
        		top.layer.close(index);
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
})
</script>
</body>
</html>