<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\siteset\mail.html";i:1537342714;}*/ ?>
<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>参数设置页</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/css/font.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/css/public.css" />
</head>

<body class="childrenBody">
	<form class="layui-form">
		<table class="layui-table mag0">
			<colgroup>
				<col width="25%">
				<col width="45%">
				<col>
		    </colgroup>
		    <thead>
		    	<tr>
		    		<th>变量名</th>
		    		<th>参数值</th>
		    		<th pc>参数说明</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<tr>
		    		<td>smtp</td>
		    		<td><input type="text" class="layui-input smtp" lay-verify="required" <?php if(isset($v['smtp'])): ?>value="<?php echo $v['smtp']; ?>"<?php endif; ?> placeholder="smtp地址"></td>
		    		<td pc>邮箱smtp服务器地址</td>
		    	</tr>
		    	<tr>
		    		<td>port</td>
		    		<td><input type="text" class="layui-input port" <?php if(isset($v['port'])): ?>value="<?php echo $v['port']; ?>"<?php endif; ?> placeholder="smtp端口"></td>
		    		<td pc>smtp服务器端口</td>
		    	</tr>
		    	<tr>
		    		<td>secure</td>
		    		<td><input type="text" class="layui-input secure" <?php if(isset($v['secure'])): ?>value="<?php echo $v['secure']; ?>"<?php endif; ?> placeholder="加密方式"></td>
		    		<td pc>连接smtp服务器的加密方式(QQ邮箱要用ssl方式)</td>
		    	</tr>
		    	<tr>
		    		<td>username</td>
		    		<td><input type="text" class="layui-input username" <?php if(isset($v['username'])): ?>value="<?php echo $v['username']; ?>"<?php endif; ?> placeholder="邮箱账号"></td>
		    		<td pc>登录邮箱账号</td>
		    	</tr>
		    	<tr>
		    		<td>password</td>
		    		<td><input type="password" class="layui-input password" <?php if(isset($v['password'])): ?>value="<?php echo $v['password']; ?>"<?php endif; ?> placeholder="邮箱密码"></td>
		    		<td pc>登录邮箱密码或授权码</td>
		    	</tr>
		    	<tr>
		    		<td>formname</td>
		    		<td><input type="text" class="layui-input formname" <?php if(isset($v['formname'])): ?>value="<?php echo $v['formname']; ?>"<?php endif; ?> placeholder="发件人名称"></td>
		    		<td pc>发件人名称</td>
		    	</tr>    	
		    	<tr>
		    		<td>mail</td>
		    		<td><input type="text" class="layui-input mail" <?php if(isset($v['mail'])): ?>value="<?php echo $v['mail']; ?>"<?php endif; ?> placeholder="测试邮箱"></td>
		    		<td pc>发送测试信息到邮箱</td>
		    	</tr>
		    	
		    	<tr>
		    		<td>message</td>
		    		<td><textarea placeholder="测试信息" class="layui-textarea message"><?php if(isset($v['message'])): ?><?php echo $v['message']; endif; ?></textarea></td>
		    		<td pc>发送到测试邮箱的测试信息</td>
		    	</tr>		    	
		    </tbody>
		</table>
		<div class="magt10 layui-right" style="margin-right: 20px;">
			<div class="layui-input-block">
				<input type="hidden" class="name" value="mail"></input>
				<button class="layui-btn" lay-submit="" lay-filter="save">立即提交</button><?php if(isset($v['mail'])): ?>
				<button class="layui-btn layui-btn-danger" lay-submit="" lay-filter="test">发送邮件测试</button><?php endif; ?>
		    </div>
		</div>
	</form>
	<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
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

    $(".password").focus(function(){
    	$(".password").prop('type','text');
 	});
  	$(".password").blur(function(){
    	$(".password").prop('type','password');
 	});

    form.on("submit(save)",function(data){        
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        // 实际使用时的提交信息
        $.post("<?php echo url('siteset/save'); ?>",{
            smtp : $(".smtp").val(), 
            port : $('.port').val(),
            secure : $('.secure').val(),
            username : $('.username').val(),
            password : $('.password').val(),
            formname : $('.formname').val(),
            mail : $('.mail').val(),
            message : $('.message').val(),
            name : $('.name').val()
        },function(res){        	
        	if(res){
        		top.layer.close(index);
	            top.layer.msg("保存成功！");
        	}else{
        		top.layer.msg("保存失败！");
        	}
        })
        return false;
    })

    form.on("submit(test)",function(){
    	$.post("<?php echo url('siteset/mailtest'); ?>",{mail:$('.mail').val(),message:$('.message').val()},function(res){        	
        	if(res.error==0){
	            top.layer.msg("发送成功！");
        	}else{
        		top.layer.msg(res.message);
        	}
        })
        return false;
    })
})
</script>
</body>
</html>