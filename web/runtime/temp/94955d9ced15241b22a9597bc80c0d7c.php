<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\collect\yunx.html";i:1539583390;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>运行结果</title>
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
	    <col width="200">
	    <col>
	    <col>
	  </colgroup>
	  <thead>
	    <tr>
	      <th>排序</th>
	      <th>标题</th>
	      <th>结果</th>
	    </tr> 
	  </thead>
	  <tbody>
	  <?php if(is_array($jg) || $jg instanceof \think\Collection || $jg instanceof \think\Paginator): $i = 0; $__LIST__ = $jg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
	    <tr>
	      <td><?php echo $v['id']; ?></td>
	      <td><?php echo $v['title']; ?></td>
	      <td><?php if($v['zt'] == 1): ?>成功<?php elseif($v['zt'] == 2): ?>重复内容已忽略<?php else: ?>失败<?php endif; ?></td>
	    </tr>
	  <?php endforeach; endif; else: echo "" ;endif; ?>
	  </tbody>
	</table>
	<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
</body>
</html>