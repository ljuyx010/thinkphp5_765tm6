<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\bak\index.html";i:1539052178;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>数据备份</title>
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
	<blockquote class="layui-elem-quote quoteBox">
		<form class="layui-form">
			<div class="layui-inline">
				<a class="layui-btn addLink_btn">新建备份</a>
			</div>
		</form>
	</blockquote>
	<table class="layui-table" lay-filter="baklist">
		<colgroup>
	    <col width="150">
	    <col>
	    <col width="250">
	    <col width="150">
	    <col width="200">	    
	  </colgroup>
	  <thead>
	    <tr>
	      <th>排序</th>
	      <th>文件名</th>
	      <th>备份时间</th>
	      <th>文件大小</th>
	      <th>操作</th>
	    </tr> 
	  </thead>
	  <tbody>
	  	<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $k = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
	    <tr>
	      <td><?php echo $v['id']; ?></td>
	      <td><a href="<?php echo url('bak/index',['Action'=>'download','File'=>$v['name']],''); ?>" target="_blank"><?php echo $v['name']; ?></a></td>
	      <td><?php echo $v['time']; ?></td>
	      <td><?php echo $v['size']; ?></td>
	      <td><a class="layui-btn layui-btn-xs" href="<?php echo url('bak/index',['Action'=>'download','File'=>$v['name']],''); ?>" target="_blank">下载</a>
	      <a class="layui-btn layui-btn-xs layui-btn-danger" onclick="del('<?php echo $v['name']; ?>')">删除</a></td>
	    </tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	  </tbody>
	</table>
	<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
	<script type="text/javascript">
		layui.use(['layer','laydate','table'],function(){
    var layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        laydate = layui.laydate,
        table = layui.table;

    //添加数据备份
    function addLink(){
        $.post("<?php echo url('bak/index','Action=backup'); ?>",function(data){location.reload();})
    }
    $(".addLink_btn").click(function(){
        addLink();
    })    
	})
	function del(f){
    	layer.confirm('确定删除此数据备份？',{icon:3, title:'提示信息'},function(index){
            $.post("<?php echo url('bak/index','Action=Del'); ?>",{
                File : f
            },function(data){
            	if(data){
            		layer.msg('删除成功！');
            		location.reload();
            	}else{
            		layer.msg('删除失败！');
            	}
            })
        });
    }
</script>
</body>
</html>