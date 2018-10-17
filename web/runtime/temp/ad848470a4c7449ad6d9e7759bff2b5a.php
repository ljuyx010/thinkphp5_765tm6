<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\collect\nei.html";i:1539575945;}*/ ?>
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
	    <col width="200">
	    <col>    
	  </colgroup>
	  <thead>
	    <tr>
	      <th>采集项目</th>
	      <th>采集内容</th>	      
	    </tr> 
	  </thead>
	  <tbody>
	    <tr>
	      <td>文章标题</td>
	      <td><?php if(isset($v[0]['title'])): ?><?php echo $v[0]['title']; endif; ?></td>
	    </tr>
	    <tr>
	      <td>文章关键词</td>
	      <td><?php if(isset($v[0]['keyword'])): ?><?php echo $v[0]['keyword']; endif; ?></td>
	    </tr>
	    <tr>
	      <td>文章描述</td>
	      <td><?php if(isset($v[0]['description'])): ?><?php echo $v[0]['description']; endif; ?></td>
	    </tr>
	    <tr>
	      <td>文章作者</td>
	      <td><?php if(isset($v[0]['author'])): ?><?php echo $v[0]['author']; endif; ?></td>
	    </tr>
	    <tr>
	      <td>文章来源</td>
	      <td><?php if(isset($v[0]['from'])): ?><?php echo $v[0]['from']; endif; ?></td>
	    </tr>
	    <tr>
	      <td>文章浏览量</td>
	      <td><?php if(isset($v[0]['click'])): ?><?php echo $v[0]['click']; endif; ?></td>
	    </tr>
	    <tr>
	      <td>文章发布日期</td>
	      <td><?php if(isset($v[0]['time'])): ?><?php echo $v[0]['time']; endif; ?></td>
	    </tr>
	    <tr>
	      <td>文章内容</td>
	      <td><?php echo $v[0]['content']; ?></td>
	    </tr>
	  </tbody>
	</table>
	<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
</body>
</html>