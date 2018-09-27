<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\gbook\index.html";i:1538041737;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>留言列表</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/css/public.css" />
	<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/static/layui/layui.js"></script>
</head>
<body class="childrenBody">
<form class="layui-form">
	<table id="newsList" lay-filter="newsList"></table>
	<!--操作-->
	<script type="text/html" id="newsListBar">
		<a class="layui-btn layui-btn-xs" lay-event="edit">查看</a>
		<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
	</script>
</form>
<script>
layui.use(['form','layer','table'],function(){
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        table = layui.table;

    //格式化时间
    function filterTime(val){
        if(val < 10){
            return "0" + val;
        }else{
            return val;
        }
    }

    function fmtDate(obj){
    var time =  new Date(obj*1000);    
    return time.getFullYear()+'-'+filterTime(time.getMonth()+1)+'-'+filterTime(time.getDate())+' '+filterTime(time.getHours())+':'+filterTime(time.getMinutes())+':'+filterTime(time.getSeconds());
	}

    //新闻列表
    var tableIns = table.render({
        elem: '#newsList',
        url : "<?php echo url('gbook/page','id='.$id); ?>",
        cellMinWidth : 95,
        page : true,
        height : "full-125",
        limit : 15,
        limits : [10,15,20,25],
        id : "newsListTable",
        cols : [[
            {field: 'id', title: 'ID', fixed:"left", width:50},
        <?php if(is_array($field) || $field instanceof \think\Collection || $field instanceof \think\Paginator): $i = 0; $__LIST__ = $field;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if(in_array($v['zd'],$dis)): ?>
            {field: '<?php echo $v['zd']; ?>', title: '<?php echo $v['title']; ?>', align:'center'},
        	<?php endif; endforeach; endif; else: echo "" ;endif; ?>
            {field: 'ip', title: 'IP', align:'center', minWidth:80},
            {field: 'time', title: '留言时间', align:'center', minWidth:80,templet:function(t){return fmtDate(t.time);}},
            {field: 'rtime', title: '回复时间', align:'center', minWidth:80,templet:function(t){if(t.rtime){return fmtDate(t.rtime);}else{return "未回复";}}},
            {title: '操作', width:170, templet:'#newsListBar',fixed:"right",align:"center"}
        ]]
    });

    //查看留言
    function addNews(edit){
        var index = layui.layer.open({
            title : "查看留言",
            type : 2,
            content : "<?php echo url('gbook/edit','',''); ?>"+"/id/"+edit.id,
            success : function(){
                setTimeout(function(){
                    layui.layer.tips('点击此处返回留言列表', '.layui-layer-setwin .layui-layer-close', {
                        tips: 3
                    });
                },500)
            }
        })
        layui.layer.full(index);
        //改变窗口大小时，重置弹窗的宽高，防止超出可视区域（如F12调出debug的操作）
        $(window).on("resize",function(){
            layui.layer.full(index);
        })
    }

    //列表操作
    table.on('tool(newsList)', function(obj){
        var layEvent = obj.event,
            data = obj.data;
        if(layEvent === 'edit'){ //编辑
            addNews(data);
            //console.log(data);
        } else if(layEvent === 'del'){ //删除
            layer.confirm('确定删除此留言？',{icon:3, title:'提示信息'},function(index){
                $.post("<?php echo url('gbook/del'); ?>",{
                    id : data.id  //将需要删除的id
                },function(data){
                    tableIns.reload();
                    layer.close(index);
                })
            });
        }
    });
})
</script>
</body>
</html>