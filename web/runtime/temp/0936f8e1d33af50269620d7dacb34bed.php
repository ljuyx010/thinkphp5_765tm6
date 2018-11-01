<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\siteset\wechat.html";i:1537500881;}*/ ?>
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
		    		<td>appid</td>
		    		<td><input type="text" class="layui-input appid" lay-verify="required" <?php if(isset($v['appid'])): ?>value="<?php echo $v['appid']; ?>"<?php endif; ?> placeholder="appid"></td>
		    		<td pc>公众号Appid</td>
		    	</tr>
		    	<tr>
		    		<td>appsecret</td>
		    		<td><input type="password" class="layui-input appsecret" <?php if(isset($v['appsecret'])): ?>value="<?php echo $v['appsecret']; ?>"<?php endif; ?> placeholder="appsecret"></td>
		    		<td pc>公众号AppSecret</td>
		    	</tr>
		    	<tr>
		    		<td colspan="3" class="layui-bg-gray">微信商户平台</td>		    		
		    	</tr>
		    	<tr>
		    		<td>mchid</td>
		    		<td><input type="text" class="layui-input mchid" <?php if(isset($v['mchid'])): ?>value="<?php echo $v['mchid']; ?>"<?php endif; ?> placeholder="商户号"></td>
		    		<td pc>微信支付商户号</td>
		    	</tr>
		    	<tr>
		    		<td>key</td>
		    		<td><input type="password" class="layui-input key" <?php if(isset($v['key'])): ?>value="<?php echo $v['key']; ?>"<?php endif; ?> placeholder="Api密匙"></td>
		    		<td pc>微信支付Api密钥</td>
		    	</tr>		    	
		    	
		    	<tr>
		    		<td>apiclient_cert</td>
		    		<td><textarea placeholder="apiclient_cert.pem" class="layui-textarea apiclient_cert"><?php if(isset($v['apiclient_cert'])): ?><?php echo $v['apiclient_cert']; endif; ?></textarea></td>
		    		<td pc>微信支付apiclient_cert.pem</td>
		    	</tr>
		    	<tr>
		    		<td>apiclient_key</td>
		    		<td><textarea placeholder="apiclient_key.pem" class="layui-textarea apiclient_key"><?php if(isset($v['apiclient_key'])): ?><?php echo $v['apiclient_key']; endif; ?></textarea></td>
		    		<td pc>微信支付apiclient_key.pem</td>
		    	</tr>		    	
		    </tbody>
		</table>
		<div class="magt10 layui-right" style="margin-right: 20px;">
			<div class="layui-input-block">
				<input type="hidden" class="name" value="wechat"></input>
				<button class="layui-btn" lay-submit="" lay-filter="save">立即提交</button>
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

    $(".appsecret").focus(function(){
    	$(".appsecret").prop('type','text');
 	});
 	$(".key").focus(function(){
    	$(".key").prop('type','text');
 	});
  	$(".appsecret").blur(function(){
    	$(".appsecret").prop('type','password');
 	});
 	$(".key").blur(function(){
    	$(".key").prop('type','password');
 	});

    form.on("submit(save)",function(data){        
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        // 实际使用时的提交信息
        $.post("<?php echo url('siteset/save'); ?>",{
            appid : $(".appid").val(), 
            appsecret : $('.appsecret').val(),
            mchid : $('.mchid').val(),
            key : $('.key').val(),
            apiclient_cert : $('.apiclient_cert').val(),
            apiclient_key : $('.apiclient_key').val(),
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
})
</script>
</body>
</html>