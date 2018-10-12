<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\article\recyle.html";i:1538983579;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文章列表</title>
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
	<blockquote class="layui-elem-quote quoteBox">
		<form class="layui-form">
			<div class="layui-inline f-right">
				<div class="layui-input-inline">
					<input type="text" class="layui-input searchVal" placeholder="请输入文章标题" />
				</div>
				<a class="layui-btn search_btn" data-type="reload">搜索</a>
			</div>			
			<div class="layui-inline">
				<a class="layui-btn layui-btn-normal restore_btn">批量还原</a>
			</div>
			<div class="layui-inline">
				<a class="layui-btn layui-btn-danger  delAll_btn">批量删除</a>
			</div>
		</form>
	</blockquote>
	<table id="newsList" lay-filter="newsList"></table>
	<!--操作-->
	<script type="text/html" id="newsListBar">
		<a class="layui-btn layui-btn-xs" lay-event="edit">查看</a>
		<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
		<a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="look">还原</a>
	</script>
</form>
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
        url : "<?php echo url('article/recyle','t=1',''); ?>",
        cellMinWidth : 95,
        page : true,
        height : "full-125",
        limit : 15,
        limits : [10,15,20,25],
        id : "newsListTable",
        cols : [[
            {type: "checkbox", fixed:"left", width:50},
            {field: 'id', title: 'ID', width:60, align:"center"},
            {field: 'title', title: '文章标题', minWidth:350,templet:function(d){
                if(d.pic){return d.title+'<span style="color:#5FB878">[图]</span>'}else{return d.title}
            }},
        	{field: 'cname', title: '所属栏目', align:'center'},
            {field: 'author', title: '作者', align:'center'},            
            {field: 'tj', title: '是否推荐', align:'center', templet:function(d){
                if(d.tj){t="checked";}
                return '<input type="checkbox" name="newsTop" lay-filter="newsTop" lay-skin="switch" lay-id="'+d.id+'" lay-text="是|否" '+t+'>'
            }},
            {field: 'times', title: '发布时间', align:'center', minWidth:80},
            {title: '操作', width:170, templet:'#newsListBar',fixed:"right",align:"center"}
        ]]
    });

    //是否置顶
    form.on('switch(newsTop)', function(data){
        var index = layer.msg('修改中，请稍候',{icon: 16,time:false,shade:0.8});
        var id=this.getAttribute('lay-id'),pd = data.elem.checked ? '1' : '0';
        $.post("<?php echo url('article/fpage','',''); ?>",{"tj":pd,"aid":id},function(result){
            layer.close(index);
          if(result){
            layer.msg('操作成功！');
          }else{
            layer.msg('操作失败!');
          }
        });
    });

    //搜索【此功能需要后台配合，所以暂时没有动态效果演示】
    $(".search_btn").on("click",function(){
        if($(".searchVal").val() != ''){
            table.reload("newsListTable",{
                page: {
                    curr: 1 //重新从第 1 页开始
                },
                where: {
                    key: $(".searchVal").val()  //搜索的关键字
                }
            })
        }else{
            layer.msg("请输入搜索的内容");
        }
    });

    //添加文章
    function addNews(edit){
        var index = layui.layer.open({
            title : "修改文章",
            type : 2,
            content : "<?php echo url('article/edit','',''); ?>"+"/id/"+edit.id,
            success : function(){
                setTimeout(function(){
                    layui.layer.tips('点击此处返回文章列表', '.layui-layer-setwin .layui-layer-close', {
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

    //批量还原    
    $(".restore_btn").click(function(){
        var checkStatus = table.checkStatus('newsListTable'),
            data = checkStatus.data,
            newsId = [];
        if(data.length > 0) {
            for (var i in data) {
                newsId.push(data[i].id);
            }
            layer.confirm('确定还原选中的文章？', {icon: 3, title: '提示信息'}, function (index) {
                $.post("<?php echo url('article/restore','',''); ?>",{
                    ids : newsId  //将需要删除的newsId作为参数传入
                },function(data){
                tableIns.reload();
                layer.close(index);
                })
            })
        }else{
            layer.msg("请选择需要还原的文章");
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
            layer.confirm('确定删除选中的文章？', {icon: 3, title: '提示信息'}, function (index) {
                $.post("<?php echo url('article/del','t=1',''); ?>",{
                    ids : newsId  //将需要删除的newsId作为参数传入
                },function(data){
                tableIns.reload();
                layer.close(index);
                })
            })
        }else{
            layer.msg("请选择需要删除的文章");
        }
    })

    //列表操作
    table.on('tool(newsList)', function(obj){
        var layEvent = obj.event,
            data = obj.data;
        if(layEvent === 'edit'){ //编辑
            addNews(data);            
        } else if(layEvent === 'del'){ //删除
            layer.confirm('确定删除此文章？',{icon:3, title:'提示信息'},function(index){
                $.post("<?php echo url('article/del','t=1',''); ?>",{
                    newsId : data.id  //将需要删除的newsId作为参数传入
                },function(data){
                    tableIns.reload();
                    layer.close(index);
                })
            });
        } else if(layEvent === 'look'){ //还原
           	$.post("<?php echo url('article/restore','',''); ?>",{
                newsId : data.id
            },function(data){
            	if(data){tableIns.reload();}else{layer.msg("还原失败！");}
            })
        }
    });

})
</script>
</body>
</html>