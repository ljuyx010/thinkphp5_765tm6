<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\cate\add.html";i:1537952779;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>设置栏目内容</title>
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
					<label class="layui-form-label">栏目名称</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input catename" name="name" value="" lay-verify="required" placeholder="请输入栏目名称">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">栏目副标题</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input en" name="en" value="" placeholder="请输入栏目副标题">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">栏目关键词</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input keyword" name="keyword" value="" placeholder="请输入栏目关键词">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">栏目描述</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input description" name="description" value="" placeholder="请输入栏目描述">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">栏目图片</label>
					<div class="layui-col-md2 layui-col-xs4">
					<input type="hidden" name="pic" value=""></input>
						<div class="layui-upload-list thumbBox mag0 magt3">
							<img class="layui-upload-img thumbImg">
						</div>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">栏目模型</label>
					<div class="layui-input-block">
					<div class="layui-col-md2 layui-col-xs4">
						<select name="model" lay-verify="required" lay-filter="model">
							<option value="article">文章</option>
							<option value="info">单页</option>
							<option value="gbook">表单</option>
							<option value="link">外链</option>
						</select>
					</div>
					</div>
				</div>
				<div class="layui-form-item page">
					<label class="layui-form-label">栏目分页</label>
					<div class="layui-input-block">
					<div class="layui-input-inline" style="width: auto;line-height:38px;">每页</div>
					<div class="layui-input-inline" style="width: 100px;">
				      	<select name="page" lay-verify="required">
							<option value="10">10</option>
							<option value="12">12</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="20">20</option>
						</select>
				    </div>
				    <div class="layui-input-inline" style="width: auto;line-height:38px;">篇文章</div>
				    </div>
				</div>
				<div class="layui-form-item link layui-hide">
					<label class="layui-form-label">跳转链接</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input link" name="link" value="" placeholder="请输入菜单图标无图标留空">
					</div>
				</div>
				<div class="layui-form-item gbook layui-hide">
					<label class="layui-form-label">表单模型</label>
					<div class="layui-input-block">
					<div class="layui-col-md2 layui-col-xs4">
						<select name="gid" lay-verify="required">
							<?php if(is_array($gtype) || $gtype instanceof \think\Collection || $gtype instanceof \think\Paginator): $i = 0; $__LIST__ = $gtype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $g['id']; ?>"><?php echo $g['gname']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">主菜单显示</label>
					<div class="layui-input-block">
						<input type="radio" name="isn" value="1" title="显示" lay-skin="primary" checked />
						<input type="radio" name="isn" value="0" title="不显示" lay-skin="primary" />
					</div>
				</div>
				<div class="layui-form-item">
				<div class="layui-input-block">
				<input class="id" type="hidden" name="id" value=""></input>
				<input class="pid" type="hidden" name="pid" value="<?php echo $pid; ?>"></input>
				<a class="layui-btn" lay-filter="add" lay-submit><i class="layui-icon">&#xe609;</i>保存</a></div>
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
    form.on("select(model)",function(data){
    	var lei=data.elem.value;
    	if(lei=="info"){$(".page").addClass("layui-hide");$(".link").addClass("layui-hide");$(".gbook").addClass("layui-hide");}
    	if(lei=="article"){$(".page").removeClass("layui-hide");$(".link").addClass("layui-hide");$(".gbook").addClass("layui-hide");}
    	if(lei=="gbook"){$(".page").addClass("layui-hide");$(".link").addClass("layui-hide");$(".gbook").removeClass("layui-hide");}
    	if(lei=="link"){$(".page").addClass("layui-hide");$(".link").removeClass("layui-hide");$(".gbook").addClass("layui-hide");}
    });
    form.on("submit(add)",function(data){        
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        // 实际使用时的提交信息
        $.post("<?php echo url('cate/runadd'); ?>",{
            name : $(".catename").val(), 
            en : $(".en").val(), 
            keyword : $('.keyword').val(),
            description : $('.description').val(),
            url : $('.link').val(),
            pic:$('.thumbImg').attr("src"),
            model:$('select[name=model]').val(),
            page:$('select[name=page]').val(),
            gid:$('select[name=gid]').val(),
            isn:$('select[name=isn]').val(),
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