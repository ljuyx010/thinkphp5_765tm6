<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\login\logs.html";i:1537857377;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>系统日志</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/css/public.css" />
<body class="childrenBody">

	<table id="logs" lay-filter="logs"></table>

	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
	<script>
		layui.use(['table'],function(){
	var table = layui.table;

	//系统日志
    table.render({
        elem: '#logs',
        url : "<?php echo url('login/page'); ?>",
        cellMinWidth : 95,
        page : true,
        height : "full-20",
        limit : 20,
        limits : [10,15,20,25],
        id : "systemLog",
        cols : [[
            {type: "checkbox", fixed:"left", width:50},
            {field: 'id', title: '序号', width:60, align:"center"},
            {field: 'username',title: '操作人', minWidth:100, templet:'#newsListBar',align:"center"},
            {field: 'ip', title: '操作IP',  align:'center',minWidth:130},
            {field: 'os', title: '操作系统', align:'center'},
            {field: 'browser', title: '浏览器', align:'center'},            
            {field: 'times', title: '登录时间', align:'center', width:170}
        ]]
    });
 	
	})
	</script>
</body>
</html>