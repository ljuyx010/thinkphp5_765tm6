layui.use(['form','layer','laydate','table','upload'],function(){
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        laydate = layui.laydate,
        upload = layui.upload,
        table = layui.table;

    //友链列表
    var tableIns = table.render({
        elem: '#linkList',
        url : url,
        page : true,
        cellMinWidth : 95,
        height : "full-104",
        limit : 20,
        limits : [10,15,20,25],
        id : "linkListTab",
        cols : [[
            {type: "checkbox", fixed:"left", width:50},
            {field: 'id', title: 'ID', width:80, align:"center"},
            {field: 'pic', title: '图片', width:180, align:"center",templet:function(d){
                if(d.pic){return '<a href="'+d.url+'" target="_blank"><img src="'+d.pic+'" height="26" /></a>';}else{return "";}  
            }},
            {field: 'subname', title: '专题名称', minWidth:240},
            {field: 'url', title: '跳转地址',width:300,templet:function(d){
                return '<a class="layui-blue" href="'+d.url+'" target="_blank">'+d.url+'</a>';
            }},
            {title: '排序', align:'center',width:90,templet:function(d){
                return '<input type="text" style="height:28px" class="layui-input sort" name="order" data-id="'+d.id+'" value="'+d.orders+'">';}
            },
            {field: 'addTime', title: '添加时间', align:'center',minWidth:110},
            {title: '操作', width:130,fixed:"right",align:"center", templet:function(){
                return '<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a><a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>';
            }}
        ]]
    });

    //搜索【此功能需要后台配合，所以暂时没有动态效果演示】
    $(".search_btn").on("click",function(){
        if($(".searchVal").val() != ''){
            table.reload("linkListTab",{
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

    //添加友链
    function addLink(edit){
        if(edit){
            var t="修改",aurl=edurl;
        }else{
            var t="添加",aurl=addurl;
        }
        var index = layer.open({
            title : t+"专题",
            type : 2,
            area : ["400px","400px"],
            content : aurl            
        })
    }
    $(".addLink_btn").click(function(){
        addLink();
    })

    //批量删除
    $(".delAll_btn").click(function(){
        var checkStatus = table.checkStatus('linkListTab'),
            data = checkStatus.data,
            linkId = [];
        if(data.length > 0) {
            for (var i in data) {
                linkId.push(data[i].id);
            }
            layer.confirm('确定删除选中的专题？', {icon: 3, title: '提示信息'}, function (index) {
                $.post(durl,{
                    ids : linkId  //将需要删除的linkId作为参数传入
                },function(data){
                tableIns.reload();
                layer.close(index);
                })
            })
        }else{
            layer.msg("请选择需要删除的专题");
        }
    })

    //列表操作
    table.on('tool(linkList)', function(obj){
        var layEvent = obj.event,
            data = obj.data;
        if(layEvent === 'edit'){ //编辑
            edurl=edurl+"/id/"+data.id;
            addLink(data);            
        } else if(layEvent === 'del'){ //删除
            layer.confirm('确定删除此专题？',{icon:3, title:'提示信息'},function(index){
                $.post(durl,{
                    linkId : data.id 
                },function(data){
                    tableIns.reload();
                    layer.close(index);
                })
            });
        }
    });

    //上传logo
    upload.render({
        elem: '.linkLogo',
        url: upurl,
        method : "post",
        done: function(res, index, upload){
            if(res.code==200){
                $('.linkLogoImg').attr('src',res.src);
                $('.linkLogo').css("background","#fff");
            }else{
                layer.msg(res.msg);
            }   
        }
    });

    //格式化时间
    function filterTime(val){
        if(val < 10){
            return "0" + val;
        }else{
            return val;
        }
    }
    //添加时间
    var time = new Date();
    var submitTime = time.getFullYear()+'-'+filterTime(time.getMonth()+1)+'-'+filterTime(time.getDate())+' '+filterTime(time.getHours())+':'+filterTime(time.getMinutes())+':'+filterTime(time.getSeconds());

    form.on("submit(addLink)",function(data){
        //弹出loading
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        $.post(surl,{
            pic : $(".linkLogoImg").attr("src"),  //logo
            subname : $(".name").val(),  //网站名称
            url : $(".url").val(),    //网址
            time : submitTime,    //发布时间
            id : $('.linkid').val()
        },function(res){
            if(res){
                top.layer.close(index);
                top.layer.msg("保存成功！");
                layer.closeAll("iframe");
                //刷新父页面
                $(".layui-tab-item.layui-show",parent.document).find("iframe")[0].contentWindow.location.reload();
            }else{
                top.layer.msg("保存失败！");
            }
            
        })
        return false;
    })

})

//排序
    
$(document).on('change', 'input', function() {
    var v=$(this).val();
    var id=$(this).attr("data-id");
    $.post(url,{'id':id,'order':v},function(result){
      if(result==0){
        layer.msg('排序失败!');
      }
    });
}); 