<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\collect\note.html";i:1539739180;}*/ ?>
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
	<blockquote class="layui-elem-quote quoteBox">
		<form class="layui-form">
			<div class="layui-inline">
				<a class="layui-btn addNews_btn">文章入库</a>
			</div>
			<div class="layui-inline">
				<a class="layui-btn layui-btn-danger  delAll_btn">批量删除</a>
			</div>
		</form>
	</blockquote>
	<table id="newsList" lay-filter="newsList"></table>
	<!--操作-->
	<script type="text/html" id="newsListBar">		
		<a class="layui-btn layui-btn-xs" lay-event="edit">入库</a>	
	</script>
	<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/layui/layui.js"></script>
	<script>
layui.use(['form','layer','laydate','table','laytpl'],function(){
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        laydate = layui.laydate,
        laytpl = layui.laytpl,
        table = layui.table,t;

    //新闻列表
    var tableIns = table.render({
        elem: '#newsList',
        url : "<?php echo url('collect/note','t=1',''); ?>",
        cellMinWidth : 95,
        page : true,
        height : "full-125",
        limit : 15,
        limits : [10,15,20,25],
        id : "newsListTable",
        cols : [[
            {type: "checkbox", fixed:"left", width:50},
            {field: 'id', title: 'ID', width:60, align:"center"},
            {field: 'title', title: '文章标题', minWidth:350},
        	{field: 'name', title: '所属栏目', align:'center'},
            {field: 'times', title: '文章日期', align:'center', minWidth:80},
            {title: '操作', width:170, templet:'#newsListBar',fixed:"right",align:"center"}
        ]]
    });

    //批量入库
    $(".addNews_btn").click(function(){
        var checkStatus = table.checkStatus('newsListTable'),
            data = checkStatus.data,
            newsId = [];
        if(data.length > 0) {
            for (var i in data) {
                newsId.push(data[i].id);
            }
            layer.confirm('确定入库选中的记录？', {icon: 3, title: '提示信息'}, function (index) {
                $.post("<?php echo url('collect/putin','',''); ?>",{
                    ids : newsId  //将需要删除的newsId作为参数传入
                },function(data){
                tableIns.reload();
                })
            })
        }else{
            layer.msg("请选择需要入库的记录");
        }
    })

    //批量删除
    $(".delAll_btn").click(function(){
        var checkStatus = table.checkStatus('newsListTable'),
            data = checkStatus.data,
            newsId = [];
        if(data.length > 0) {
            for (var i in data) {
                newsId.push(data[i].id);
            }
            layer.confirm('确定删除选中的记录？', {icon: 3, title: '提示信息'}, function (index) {
                $.post("<?php echo url('collect/delcj','',''); ?>",{
                    ids : newsId  //将需要删除的newsId作为参数传入
                },function(data){
                tableIns.reload();
                })
            })
        }else{
            layer.msg("请选择需要删除的记录");
        }
    })   

    //列表操作
    table.on('tool(newsList)', function(obj){
        var layEvent = obj.event,
            data = obj.data;
        if(layEvent === 'edit'){ //编辑
            $.post("<?php echo url('collect/putin','',''); ?>",{
                id : data.id  //将需要删除的newsId作为参数传入
            },function(data){
            tableIns.reload();
            })            
        }
    });

})
</script>
</body>
</html>