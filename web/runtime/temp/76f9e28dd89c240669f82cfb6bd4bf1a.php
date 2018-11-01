<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\auth\gadd.html";i:1541065647;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>设置用户组权限</title>
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
					<label class="layui-form-label">用户组名称</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input title" name="title" <?php if(isset($v['title'])): ?>value="<?php echo $v['title']; ?>"<?php endif; ?> lay-verify="required" placeholder="请输入用户组名称">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">功能权限</label>
					<div class="layui-input-block">
					<table class="layui-table">
					    <thead>
					      <tr>
					        <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
					        <th>权限名</th>
					        <th>子权限集</th>
					      </tr> 
					    </thead>
					    <tbody>
					    <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?>
					      <tr>
					        <td><input type="checkbox" name="nid[]" value="<?php echo $n['id']; ?>" lay-skin="primary"></td>
					        <td><?php echo $n['title']; ?></td>
					        <td>
							<?php if(is_array($n['children']) || $n['children'] instanceof \think\Collection || $n['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $n['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
							<input type="checkbox" name="nid[]" value="<?php echo $c['id']; ?>" title="<?php echo $c['title']; ?>" lay-skin="primary">
							<?php endforeach; endif; else: echo "" ;endif; ?>
					        </td>
					      </tr>
					    <?php endforeach; endif; else: echo "" ;endif; ?>
					    </tbody>
					</table>
					</div>
				</div>		
				<div class="layui-form-item">
					<label class="layui-form-label">栏目鉴权</label>
					<div class="layui-input-block">
					<?php if(isset($v['idr'])): ?>
						<input type="radio" name="isn" value="1" title="启用" lay-skin="primary" <?php if($v['idr']): ?>checked<?php endif; ?> />
						<input type="radio" name="isn" value="0" title="不启用" lay-skin="primary" <?php if(!$v['idr']): ?>checked<?php endif; ?>/>
					<?php else: ?>
						<input type="radio" name="isn" value="1" title="启用" lay-skin="primary"  />
						<input type="radio" name="isn" value="0" title="不启用" lay-skin="primary" checked />
					<?php endif; ?>
					</div>
				</div>
				<div class="layui-form-item" id="menu">
					<label class="layui-form-label">栏目权限</label>
					<div class="layui-input-block">
					<table class="layui-table">
				        <thead>
				          <tr>
				            <th width="70"><input type="checkbox" name="" lay-skin="primary" lay-filter="allCate"></th>
				            <th>栏目ID</th>
				            <th>栏目名称</th>
				        </thead>
				        <tbody class="x-cate">
				        <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?>
				          <tr cate-id='<?php echo $l['id']; ?>' fid='<?php echo $l['pid']; ?>' >
				          	<td><input type="checkbox" name="cid[]" value="<?php echo $l['id']; ?>" lay-skin="primary"></td>
				            <td><?php echo $l['id']; ?></td>
				            <td><?php echo $l['_name']; ?></td>		            
				          </tr>
				        <?php endforeach; endif; else: echo "" ;endif; ?>
				        </tbody>
				    </table>
				    </div>
				</div>
				<div class="layui-form-item">
				<div class="layui-input-block">
				<input class="id" type="hidden" name="id" <?php if(isset($v['id'])): ?>value="<?php echo $v['id']; ?>"<?php endif; ?>></input>
				<a class="layui-btn" lay-filter="add" lay-submit><i class="layui-icon">&#xe609;</i>保存</a></div>
				</div>
			</div>			
		</div>
	</div>
</form>
<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
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

    form.on('checkbox(allChoose)', function (data) {
        $("input[name='nid[]']").each(function () {
            this.checked = data.elem.checked;
        });
        form.render('checkbox');
    });

    form.on('checkbox(allCate)', function (data) {
        $("input[name='cid[]']").each(function () {
            this.checked = data.elem.checked;
        });
        form.render('checkbox');
    });

    $("radio[name='isn']").click(function(){
	    var value = $(this).vale();
	    console.log(value);
	    if(value){
	    	$('#menu').css("display","block");
	    }else{
	    	$('#menu').css("display","none");
	    }
	});


    form.on("submit(add)",function(data){        
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        // 实际使用时的提交信息
        $.post("<?php echo url('auth/runadd'); ?>",{
            name : $(".name").val(), 
            title : $(".title").val(), 
            idr:$('select[name=isn]').val(),
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