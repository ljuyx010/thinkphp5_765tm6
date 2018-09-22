<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\siteset\index.html";i:1537337008;}*/ ?>
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
		    		<th>参数说明</th>
		    		<th>参数值</th>
		    		<th pc>变量名</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<tr>
		    		<td>网站名称</td>
		    		<td><input type="text" class="layui-input webname" lay-verify="required" <?php if(isset($v['webname'])): ?>value="<?php echo $v['webname']; ?>"<?php endif; ?> placeholder="请输入网站名称"></td>
		    		<td pc>webname</td>
		    	</tr>
		    	<tr>
		    		<td>默认关键字</td>
		    		<td><input type="text" class="layui-input keyword" <?php if(isset($v['keyword'])): ?>value="<?php echo $v['keyword']; ?>"<?php endif; ?> placeholder="请输入默认关键字"></td>
		    		<td pc>keyword</td>
		    	</tr>
		    	<tr>
		    		<td>网站描述</td>
		    		<td><textarea placeholder="请输入网站描述" class="layui-textarea description"><?php if(isset($v['description'])): ?><?php echo $v['description']; endif; ?></textarea></td>
		    		<td pc>description</td>
		    	</tr>
		    	<tr>
		    		<td>联系电话</td>
		    		<td><input type="text" class="layui-input tel" <?php if(isset($v['tel'])): ?>value="<?php echo $v['tel']; ?>"<?php endif; ?> placeholder="请输入座机或400"></td>
		    		<td pc>tel</td>
		    	</tr>
		    	<tr>
		    		<td>联系电话②</td>
		    		<td><input type="text" class="layui-input phone" <?php if(isset($v['phone'])): ?>value="<?php echo $v['phone']; ?>"<?php endif; ?> placeholder="请输入联系手机"></td>
		    		<td pc>phone</td>
		    	</tr>
		    	<tr>
		    		<td>公司地址</td>
		    		<td><input type="text" class="layui-input add" <?php if(isset($v['add'])): ?>value="<?php echo $v['add']; ?>"<?php endif; ?> placeholder="请输入公司地址"></td>
		    		<td pc>add</td>
		    	</tr>
		    	<tr>
		    		<td>公司邮箱</td>
		    		<td><input type="text" class="layui-input mail" <?php if(isset($v['mail'])): ?>value="<?php echo $v['mail']; ?>"<?php endif; ?> placeholder="请输入企业邮箱"></td>
		    		<td pc>mail</td>
		    	</tr>
		    	<tr>
		    		<td>联系QQ</td>
		    		<td><input type="text" class="layui-input QQ" <?php if(isset($v['QQ'])): ?>value="<?php echo $v['QQ']; ?>"<?php endif; ?> placeholder="请输入最联系QQ"></td>
		    		<td pc>QQ</td>
		    	</tr>
		    	<tr>
		    		<td>公众号二维码</td>
		    		<td><div class="layui-col-md3 layui-col-xs5">
			    		<input type="hidden" name="Wechat" value=""></input>
							<div class="layui-upload-list thumbBox mag0 magt3">
								<img class="layui-upload-img thumbImg" <?php if(isset($v['Wechat'])): ?>src="<?php echo $v['Wechat']; ?>"<?php endif; ?>>
							</div>
						</div></div>
					</td>
		    		<td pc>Wechat</td>
		    	</tr>
		    	
		    	<tr>
		    		<td>版权信息</td>
		    		<td><input type="text" class="layui-input powerby" <?php if(isset($v['powerby'])): ?>value="<?php echo $v['powerby']; ?>"<?php endif; ?> placeholder="请输入网站版权信息"></td>
		    		<td pc>powerby</td>
		    	</tr>		    	
		    	<tr>
		    		<td>网站备案号</td>
		    		<td><input type="text" class="layui-input record" <?php if(isset($v['record'])): ?>value="<?php echo $v['record']; ?>"<?php endif; ?> placeholder="请输入网站备案号"></td>
		    		<td pc>record</td>
		    	</tr>
		    	<tr>
		    		<td>第三方js</td>
		    		<td><textarea placeholder="第三方js代码" class="layui-textarea jscode"><?php if(isset($v['jscode'])): ?><?php echo $v['jscode']; endif; ?></textarea></td>
		    		<td pc>jscode</td>
		    	</tr>
		    </tbody>
		</table>
		<div class="magt10 layui-right" style="margin-right: 20px;">
			<div class="layui-input-block">
				<input type="hidden" class="name" value="sets"></input>
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

    //上传缩略图
    upload.render({
        elem: '.thumbBox',
        url: '<?php echo url("index/upload",'',''); ?>',
        method : "post",
        done: function(res, index, upload){
            if(res.code==200){
            	$('.thumbImg').attr('src',res.src);
            	$('.thumbBox').css("background","#fff");
            }else{
            	layer.msg(res.msg);
            }            
        }
    });
    form.on("submit(save)",function(data){        
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        // 实际使用时的提交信息
        $.post("<?php echo url('siteset/save'); ?>",{
            webname : $(".webname").val(), 
            keyword : $('.keyword').val(),
            description : $('.description').val(),
            tel : $('.tel').val(),
            phone : $('.phone').val(),
            Wechat:$('.thumbImg').attr("src"),
            add : $('.add').val(),
            mail : $('.mail').val(),
            QQ : $('.QQ').val(),
            powerby : $('.powerby').val(),
            record : $('.record').val(),
            jscode : $('.jscode').val(),
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