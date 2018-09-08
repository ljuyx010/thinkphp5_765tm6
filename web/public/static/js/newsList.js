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
        url : url,
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
        $.post(url,{"tj":pd,"aid":id},function(result){
            layer.close(index);
          if(result){
            layer.msg('操作成功！');
          }else{
            layer.msg('操作失败!');
          }
        });
    });
    //转移栏目
    form.on('select(move)', function(data){
        var checkStatus = table.checkStatus('newsListTable'),
            data = checkStatus.data,cid=$(".cid").val(),
            newsId = [];

        if(data.length > 0) {
            for (var i in data) {
                newsId.push(data[i].id);
            }
            layer.confirm('确定转移选中的文章？', {icon: 3, title: '提示信息'}, function (index) {
                $.post(url4,{
                    ids : newsId,cid : cid //将需要删除的newsId作为参数传入
                },function(data){
                tableIns.reload();
                layer.close(index);
                })
            })
        }else{
            layer.msg("请选择需要转移的文章");
        }
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
        if(edit){
            var t="修改",aurl=url6;
        }else{
            var t="添加",aurl=url5;
        }
        var index = layui.layer.open({
            title : t+"文章",
            type : 2,
            content : aurl,
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
    $(".addNews_btn").click(function(){
        addNews();
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
                $.post(url2,{
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
            url6=url6+"/id/"+data.id;
            addNews(data);            
        } else if(layEvent === 'del'){ //删除
            layer.confirm('确定删除此文章？',{icon:3, title:'提示信息'},function(index){
                $.post(url2,{
                    newsId : data.id  //将需要删除的newsId作为参数传入
                },function(data){
                    tableIns.reload();
                    layer.close(index);
                })
            });
        } else if(layEvent === 'look'){ //预览
            window.open(url3+'/id/'+data.id);
        }
    });

})