	layui.use(['form','layer','laydate','table','upload'],function(){
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        laydate = layui.laydate,
        upload = layui.upload,
        table = layui.table;

    //管理员列表
    var tableIns = table.render({
        elem: '#linkList',
        url : page,
        page : true,
        cellMinWidth : 95,
        height : "full-104",
        limit : 20,
        limits : [10,15,20,25],
        id : "linkListTab",
        cols : [[
            {field:'id',type: "checkbox", fixed:"left", width:50},
            {field: 'pic', title: '头像', width:180, align:"center",templet:function(d){
                if(d.pic){return '<img src="'+d.pic+'" height="26" />';}else{return "";}  
            }},
            {field: 'username', title: '账号', minWidth:240},
            {field: 'name', title: '用户名',width:300},
            {field: 'title', title: '用户组',minWidth:200, align:'center'},
            {title: '状态', align:'center',width:90,templet:function(d){var t;
                if(d.state){t='checked=""';}
            	return '<input type="checkbox" name="switch" lay-text="启用|禁用" lay-filter="display" lay-id="'+d.id+'" '+t+' lay-skin="switch">';
            }},
            {field: 'regtimes', title: '添加时间', align:'center',minWidth:110},
            {title: '操作', width:130,fixed:"right",align:"center", templet:function(){
                return '<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a><a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>';
            }}
        ]]
    });

    //添加管理员
    function addLink(edit){
        if(edit){
            var t="修改",aurl=editu+"/id/"+edit.id;
        }else{
            var t="添加",aurl=add;
        }
        var index = layer.open({
            title : t+"管理员",
            type : 2,
            area : ["400px","520px"],
            content : aurl,
            success : function(){
                    setTimeout(function(){
                        layui.layer.tips('点击此处返回管理员列表', '.layui-layer-setwin .layui-layer-close', {
                            tips: 3
                        });
                    },500)
                } 
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
            layer.confirm('确定删除选中的管理员？', {icon: 3, title: '提示信息'}, function (index) {
                $.post(durl,{
                    ids : linkId  //将需要删除的linkId作为参数传入
                },function(data){
                tableIns.reload();
                layer.close(index);
                })
            })
        }else{
            layer.msg("请选择需要删除的管理员");
        }
    })
    //是否启用
    form.on('switch(display)', function(data){
        var index = layer.msg('修改中，请稍候',{icon: 16,time:false,shade:0.8});
        var id=this.getAttribute('lay-id'),pd = data.elem.checked ? '1' : '0';
        $.post(durl,{"tj":pd,"id":id},function(result){
            layer.close(index);
          if(result){
            layer.msg('操作成功！');
          }else{
            layer.msg('操作失败!');
          }
        });
    });
    //列表操作
    table.on('tool(linkList)', function(obj){
        var layEvent = obj.event,
            data = obj.data;
        if(layEvent === 'edit'){ //编辑
            addLink(data);            
        } else if(layEvent === 'del'){ //删除
            layer.confirm('确定删除此管理员？',{icon:3, title:'提示信息'},function(index){
                $.post(durl,{
                    id : data.id 
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
    
    form.on("submit(addLink)",function(data){
    var p1=$('.password').val(),p2=$('.password1').val();
    if(p1==p2){
        //弹出loading
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        $.post(surl,{
            pic : $(".linkLogoImg").attr("src"),  //logo
            name : $(".name").val(),  //用户名
            username : $(".username").val(),    //账号
            password : p1,    //备注
            gid :  $(".tid select").val(),    //分类
            csr:  $(".csr").val(),
            id : $('.uid').val()
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
    }else{
        top.layer.msg('密码和确认密码不一致', {icon: 5});  
    }
    })

})