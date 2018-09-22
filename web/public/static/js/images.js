layui.config({
	base : "./"
}).use(['flow','form','layer','upload'],function(){
    var flow = layui.flow,
        form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        upload = layui.upload,
        $ = layui.jquery;

    //流加载图片
    var imgNums = 15;  //单页显示图片数量
    flow.load({
        elem: '#Images', //流加载容器
        done: function(page, next){ //加载下一页
            $.post(url,function(res){
                //模拟插入
                var imgList = [],data = res.data;
                var maxPage = imgNums*page < data.length ? imgNums*page : data.length;
                setTimeout(function(){
                    for(var i=imgNums*(page-1); i<maxPage; i++){
                        imgList.push('<li><img layer-src="'+ data[i].src +'" src="'+ data[i].src +'" alt="'+data[i].name+'"><div class="operate"><div class="check"><input type="checkbox" name="id" lay-filter="choose" lay-skin="primary" value="'+data[i].id+'" title="'+data[i].name+'"></div><i class="layui-icon img_edit">&#xe642;</i><i class="layui-icon img_del">&#xe640;</i></div></li>');
                    }
                    next(imgList.join(''), page < (data.length/imgNums));
                    form.render();
                }, 500);
            });
        }
    });

    //设置图片的高度
    $(window).resize(function(){
        $("#Images li img").height($("#Images li img").width());
    })

    //添加友链
    function addLink(edit){
        if(edit){
            var t="修改",aurl=edurl+'/id/'+edit;
        }else{
            var t="添加",aurl=addurl;
        }
        var index = layer.open({
            title : t+"广告图片",
            type : 2,
            area : ["400px","550px"],
            content : aurl 
        })
    }
    $(".add").click(function(){
        addLink();
    })

    //修改图片
    $("body").on("click",".img_edit",function(){
        var _this = $(this);
        var id=_this.siblings().find("input").val();
        addLink(id);
    })

    //上传logo
    upload.render({
        elem: '.advimg',
        url: upurl,
        method : "post",
        done: function(res, index, upload){
            if(res.code==200){
                $('.linkLogoImg').attr('src',res.src);
                $('.advimg').css("background","#fff");
            }else{
                layer.msg(res.msg);
            }   
        }
    });

    //弹出层
    $("body").on("click","#Images img",function(){
        showImg();
    })

    //删除单张图片
    $("body").on("click",".img_del",function(){
        var _this = $(this);
        var id=_this.siblings().find("input").val();
        layer.confirm('确定删除图片"'+_this.siblings().find("input").attr("title")+'"吗？',{icon:3, title:'提示信息'},function(index){
            $.post(durl,{id:id},function(res){
                if(res){
                    _this.parents("li").hide(1000);
                    setTimeout(function(){_this.parents("li").remove();},950);
                    layer.close(index);
                }else{
                   layer.msg("删除失败");
                }
            });
           
        });
    })

    //全选
    form.on('checkbox(selectAll)', function(data){
        var child = $("#Images li input[type='checkbox']");
        child.each(function(index, item){
            item.checked = data.elem.checked;
        });
        form.render('checkbox');
    });

    //通过判断是否全部选中来确定全选按钮是否选中
    form.on("checkbox(choose)",function(data){
        var child = $(data.elem).parents('#Images').find('li input[type="checkbox"]');
        var childChecked = $(data.elem).parents('#Images').find('li input[type="checkbox"]:checked');
        if(childChecked.length == child.length){
            $(data.elem).parents('#Images').siblings("blockquote").find('input#selectAll').get(0).checked = true;
        }else{
            $(data.elem).parents('#Images').siblings("blockquote").find('input#selectAll').get(0).checked = false;
        }
        form.render('checkbox');
    })

    //批量删除
    $(".batchDel").click(function(){
        var $checkbox = $('#Images li input[type="checkbox"]');
        var $checked = $('#Images li input[type="checkbox"]:checked');
        var pId = [];
        if($checkbox.is(":checked")){
           $checked.each(function(){
                pId.push($(this).val());
            })
            layer.confirm('确定删除选中的图片？',{icon:3, title:'提示信息'},function(index){
                var index = layer.msg('删除中，请稍候',{icon: 16,time:false,shade:0.8});
                $.post(durl,{
                    ids : pId  //将需要删除的id
                },function(data){
                    //删除数据
                    $checked.each(function(){
                        $(this).parents("li").hide(1000);
                        setTimeout(function(){$(this).parents("li").remove();},950);
                    })
                    $('#Images li input[type="checkbox"],#selectAll').prop("checked",false);
                    form.render();
                    layer.close(index);
                    layer.msg("删除成功");
                })                
            })
        }else{
            layer.msg("请选择需要删除的图片");
        }
    })

    form.on("submit(addLink)",function(data){
        //弹出loading
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        $.post(surl,{
            pic : $(".linkLogoImg").attr("src"),  //logo
            name : $(".name").val(),  //网站名称
            url : $(".url").val(),    //网址
            mark : $('.mark').val(),    //备注
            tid :  $(".tid select").val(),    //分类
            orders : $('.orders').val(),   //排序
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

//图片管理弹窗
function showImg(){
    $.post(url,function(json){
        var res = json;
        layer.photos({
            photos: res,
            anim: 5
        });
    });
}