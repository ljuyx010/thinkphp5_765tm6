<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\collect\test.html";i:1539334543;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>采集测试</title>
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
	<table class="layui-table" lay-filter="baklist">
		<colgroup>
	    <col width="80">
	    <col>
	    <col>
	    <col width="150">
	    <col width="200">	    
	    <col width="150">	    
	    <col width="150">	    
	  </colgroup>
	  <thead>
	    <tr>
	      <th>排序</th>
	      <th>标题</th>
	      <th>链接</th>
	      <th>题图</th>
	      <th>日期</th>
	      <th>浏览量</th>
	      <th>操作</th>
	    </tr> 
	  </thead>
	  <tbody>
	  	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
	    <tr>
	      <td><?php echo $k; ?></td>
	      <td><a href="<?php echo $v['url']; ?>" target="_blank"><?php echo $v['title']; ?></a></td>
	      <td><?php echo $v['url']; ?></td>
	      <td><?php if(isset($v['img'])): ?><img src="<?php echo $v['img']; ?>" height="26"><?php endif; ?></td>
	      <td><?php if(isset($v['time'])): ?><?php echo $v['time']; endif; ?></td>
	      <td><?php if(isset($v['click'])): ?><?php echo $v['click']; endif; ?></td>
	      <td><a class="layui-btn layui-btn-xs" onclick="testn('<?php echo urlencode($v['url']); ?>')">测试内容页</a></td>
	    </tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	  </tbody>
	</table>
	<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
	<script type="text/javascript">
	layui.use(['layer'],function(){
    var layer = parent.layer === undefined ? layui.layer : top.layer;
    });

    function testn(url){
		$.ajax({
			url: "<?php echo url('collect/test',['id'=>$id]); ?>", 
			type: 'POST',
			data: {u:url}, 
			dataType : "json",
			success: function (result){
				var d=result;
				layer.open({
					type: 1, 
					title: "采集内页测试",
					area: ['100%', '500px'],
					content: result

				}); 
			}
		})
	}
	</script>
</body>
</html>