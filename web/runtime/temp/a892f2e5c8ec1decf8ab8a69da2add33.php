<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\auth\add.html";i:1541043988;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>设置节点内容</title>
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
			<div class="layui-col-md9 layui-col-xs12">
				<div class="layui-form-item magt3">
					<label class="layui-form-label">节点名称</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input title" name="title" <?php if(isset($v['title'])): ?>value="<?php echo $v['title']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入节点名称">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">节点规则</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input name" name="name" <?php if(isset($v['name'])): ?>value="<?php echo $v['name']; ?>"<?php endif; ?> placeholder="请输入节点副标题">
					</div>
				</div>		
				<div class="layui-form-item">
					<label class="layui-form-label">是否启用</label>
					<div class="layui-input-block">
					<?php if(isset($v['status'])): ?>
						<input type="radio" name="isn" value="1" title="启用" lay-skin="primary" <?php if($v['status']): ?>checked<?php endif; ?> />
						<input type="radio" name="isn" value="0" title="不启用" lay-skin="primary" <?php if(!$v['status']): ?>checked<?php endif; ?>/>
					<?php else: ?>
						<input type="radio" name="isn" value="1" title="启用" lay-skin="primary" checked />
						<input type="radio" name="isn" value="0" title="不启用" lay-skin="primary" />
					<?php endif; ?>
					</div>
				</div>
				<div class="layui-form-item">
				<div class="layui-input-block">
				<input class="id" type="hidden" name="id" <?php if(isset($v['id'])): ?>value="<?php echo $v['id']; ?>"<?php endif; ?>></input>
				<input class="pid" type="hidden" name="pid" value="<?php echo $pid; ?>"></input>
				<a class="layui-btn" lay-filter="add" lay-submit><i class="layui-icon">&#xe609;</i>保存</a></div>
				</div>
			</div>			
		</div>
	</div>
</form>
<script type="text/javascript" src="/public/static/layui/layui.js"></script>
<script>
layui.use(['form','layer','layedit','laydate'],function(){
    var form = layui.form
        layer = parent.layer === undefined ? layui.layer : top.layer,
        laypage = layui.laypage,
        upload = layui.upload,
        layedit = layui.layedit,
        laydate = layui.laydate,
        $ = layui.jquery;

    form.on("submit(add)",function(data){        
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        // 实际使用时的提交信息
        $.post("<?php echo url('auth/runadd'); ?>",{
            name : $(".name").val(), 
            title : $(".title").val(), 
            status:$('select[name=isn]').val(),
            id : $('.id').val(),
            pid : $('.pid').val()
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