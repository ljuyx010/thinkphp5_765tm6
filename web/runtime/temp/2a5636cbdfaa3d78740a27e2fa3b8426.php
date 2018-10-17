<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\collect\add.html";i:1539574981;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>采集规则</title>
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
			<div class="layui-col-md6 layui-col-xs12">
				<fieldset class="layui-elem-field">
				  <legend>第一步：列表页规则</legend>
				  <div class="layui-field-box">
				    <div class="layui-form-item" style="padding-top:20px;">
						<label class="layui-form-label">规则名称</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input name" name="name" <?php if(isset($v['name'])): ?>value="<?php echo $v['name']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入规则名称">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">数据源域名</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input site" name="site" <?php if(isset($v['site'])): ?>value="<?php echo $v['site']; ?>"<?php endif; ?> placeholder="请输入数据源域名">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">列表页地址</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input url" name="url" <?php if(isset($v['url'])): ?>value="<?php echo $v['url']; ?>"<?php endif; ?> lay-verify="url" placeholder="请输入数据页面地址，分页用{p}表示">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">列表页分页</label>
						<div class="layui-input-block">
							<div class="layui-input-inline" style="width: 100px;">
						      <input type="text" name="s" placeholder="起始页" autocomplete="off" class="layui-input" lay-verify="required" <?php if(isset($v['s'])): ?>value="<?php echo $v['s']; ?>"<?php endif; ?>>
						    </div>
						    <div class="layui-form-mid">-</div>
						    <div class="layui-input-inline" style="width: 100px;">
						      <input type="text" name="d" placeholder="末尾页" autocomplete="off" class="layui-input" lay-verify="required" <?php if(isset($v['d'])): ?>value="<?php echo $v['d']; ?>"<?php endif; ?>>
						    </div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">采集到栏目</label>
						<div class="layui-input-block">
							<select name="cid" class="cid" lay-verify="required">
								<option value="">选择栏目</option>
								<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;if(in_array($l['id'],$pid)): ?>
									<option value="<?php echo $l['id']; ?>" disabled><?php echo $l['_name']; ?></option>
									<?php elseif(isset($v['cid'])): ?>
									<option <?php if($l['id'] == $v['cid']): ?>selected<?php endif; ?> value="<?php echo $l['id']; ?>"><?php echo $l['_name']; ?></option>
									<?php else: ?>
									<option value="<?php echo $l['id']; ?>"><?php echo $l['_name']; ?></option>
									<?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">列表标题</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input titlegz" name="titlegz" <?php if(isset($v['titlegz'])): ?>value="<?php echo $v['titlegz']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入标题标记,如:.news li">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">列表链接</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input urlgz" name="urlgz" <?php if(isset($v['urlgz'])): ?>value="<?php echo $v['urlgz']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入链接标记,如:.news li a[href]">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">发布时间</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input timegz" name="timegz" <?php if(isset($v['timegz'])): ?>value="<?php echo $v['timegz']; ?>"<?php endif; ?>  placeholder="请输入日期标记,如:.time">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">题图标记</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input imgz" name="imgz" <?php if(isset($v['imgz'])): ?>value="<?php echo $v['imgz']; ?>"<?php endif; ?>  placeholder="请输入题图标记,如:.pic img">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">浏览量标记</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input clickgz" name="clickgz" <?php if(isset($v['clickgz'])): ?>value="<?php echo $v['clickgz']; ?>"<?php endif; ?>  placeholder="请输入浏览量标记,如:.click">
						</div>
					</div>
				  </div>
				</fieldset>
			</div>
			<div class="layui-col-md6 layui-col-xs12">
				<fieldset class="layui-elem-field">
				  <legend>第二步：正文页规则</legend>
				  <div class="layui-field-box">
				  	<div class="layui-form-item" style="padding-top:20px;">
						<label class="layui-form-label">数据源编码</label>
						<div class="layui-input-block">							
							<select name="bm" class="bm" lay-verify="required">								
								<?php if(isset($v['bm'])): ?>
								<option <?php if($v['bm'] == '0'): ?>selected<?php endif; ?> value="0">utf-8</option>
								<option <?php if($v['bm'] == '1'): ?>selected<?php endif; ?> value="1">gbk</option>
								<?php else: ?>
								<option value="0">utf-8</option>
								<option value="1">gbk</option>>
								<?php endif; ?>								
							</select>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">文章标题</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input ntgz" name="ntgz" <?php if(isset($v['ntgz'])): ?>value="<?php echo $v['ntgz']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入文章标题标记,如:.title">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">文章关键字</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input keywordgz" <?php if(isset($v['keywordgz'])): ?>value="<?php echo $v['keywordgz']; ?>"<?php endif; ?> value=""  placeholder="请输入关键字标记,如:meta[name='keywords']">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">文章描述</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input descgz" name="descgz" <?php if(isset($v['descgz'])): ?>value="<?php echo $v['descgz']; ?>"<?php endif; ?>  placeholder="请输入关键字标记,如:meta[name='description']">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">文章正文</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input contgz" name="contgz" <?php if(isset($v['contgz'])): ?>value="<?php echo $v['contgz']; ?>"<?php endif; ?>  lay-verify="required" placeholder="请输入关键字标记,如:.content">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">文章作者</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input authorgz" name="authorgz" <?php if(isset($v['authorgz'])): ?>value="<?php echo $v['authorgz']; ?>"<?php endif; ?>  placeholder="请输入文章作者,如:.title span:eq(1)">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">文章来源</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input fromgz" name="fromgz" <?php if(isset($v['fromgz'])): ?>value="<?php echo $v['fromgz']; ?>"<?php endif; ?> placeholder="请输入文章来源标记,如:.title span:eq(2)">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">文章日期</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input ntime" name="ntime" <?php if(isset($v['ntime'])): ?>value="<?php echo $v['ntime']; ?>"<?php endif; ?>  placeholder="请输入文章日期标记,如:.title span:eq(3)">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">文章点击量</label>
						<div class="layui-input-block">
							<input type="text" class="layui-input hitgz" name="hitgz" <?php if(isset($v['hitgz'])): ?>value="<?php echo $v['hitgz']; ?>"<?php endif; ?>  placeholder="请输入文章点击量标记,如:.title span:eq(4)">
						</div>
					</div>
				  </div>
				</fieldset>
				<div class="layui-left">
				<input type="hidden" name="id" class="id" <?php if(isset($v['id'])): ?>value="<?php echo $v['id']; ?>"<?php endif; ?>></input>
				<a class="layui-btn" lay-filter="addNews" lay-submit><i class="layui-icon">&#xe609;</i>保存规则</a>
			</div>
			</div>						
		</div>
	</div>
</form>
<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/public/static/layui/layui.js"></script>
<script>
layui.use(['form','layer','layedit','laydate'],function(){
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        laypage = layui.laypage,
        layedit = layui.layedit,
        laydate = layui.laydate,
        $ = layui.jquery;

    
    form.on("submit(addNews)",function(data){        
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        // 实际使用时的提交信息
        $.post("<?php echo url('collect/runadd'); ?>",{
            name : $(".name").val(), 
            site : $(".site").val(), 
            url : $('.url').val(),
            cid : $('.cid').val(),
            s : $('input[name=s]').val(),
            d:$('input[name=d]').val(),
            titlegz:$('.titlegz').val(),
            urlgz:$('.urlgz').val(),
            timegz:$('.timegz').val(),
            imgz:$('.imgz').val(),
            clickgz : $('.clickgz').val(),
            bm : $('.bm').val(),
            ntgz : $('.ntgz').val(),
            keywordgz : $('.keywordgz').val(),
            descgz : $('.descgz').val(),
            contgz : $('.contgz').val(),
            authorgz : $('.authorgz').val(),
            fromgz : $('.fromgz').val(),
            ntime : $('.ntime').val(),
            hitgz : $('.hitgz').val(),
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