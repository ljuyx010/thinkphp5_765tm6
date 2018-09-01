<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\system\menuedit.html";i:1535698140;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>设置菜单内容</title>
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
					<label class="layui-form-label">菜单名称</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input newsName" name="name" value="<?php echo $v['name']; ?>" lay-verify="required" placeholder="请输入菜单名称">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">菜单图标</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input ico" name="ico" value="<?php echo $v['ico']; ?>" placeholder="请输入菜单图标无图标留空">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">链接地址</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input url" name="url" value="<?php echo $v['url']; ?>" placeholder="请输入菜单链接地址">
						<input class="id" type="hidden" name="id" value="<?php echo $v['id']; ?>"></input>
						<input class="pid" type="hidden" name="pid" value="<?php echo $v['pid']; ?>"></input>
					</div>
				</div>
				<div class="layui-form-item">
				<div class="layui-input-block">
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
        //截取文章内容中的一部分文字放入文章摘要
        //var abstract = layedit.getText(editIndex).substring(0,50);
        //弹出loading
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        // 实际使用时的提交信息
        $.post("<?php echo url('system/runadd'); ?>",{
            name : $(".newsName").val(), 
            ico : $(".ico").val(), 
            url : $('.url').val(),
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
        setTimeout(function(){
            top.layer.close(index);
            top.layer.msg("保存成功！");
            layer.closeAll("iframe");
            //刷新父页面
            parent.location.reload();
        },500);
        return false;
    })
})
</script>
</body>
</html>