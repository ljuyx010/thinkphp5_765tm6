<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\article\edit.html";i:1537843113;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>添加文章</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/css/public.css" />
	<link rel="stylesheet" type="text/css" href="/public/static/css/upload.min.css" />
</head>
<body class="childrenBody">
<form class="layui-form layui-row layui-col-space10">
	<div class="layui-col-md9 layui-col-xs12">
		<div class="layui-row layui-col-space10">
			<div class="layui-col-md12 layui-col-xs12">
				<div class="layui-form-item magt3">
					<label class="layui-form-label">文章标题</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input title" lay-verify="required" value="<?php echo $a['title']; ?>">
					</div>
				</div>
				<div class="layui-form-item magt3">
					<label class="layui-form-label">文章关键字</label>
					<div class="layui-input-block">
						<input type="text" class="layui-input keywords"  value="<?php echo $a['keyword']; ?>">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">内容摘要</label>
					<div class="layui-input-block">
						<textarea placeholder="请输入内容摘要" class="layui-textarea description"><?php echo $a['description']; ?></textarea>
					</div>
				</div>
				<!-- 多图上传 -->
				<div class="layui-form-item">
					<label class="layui-form-label">封面图集</label>
	                <div class="layui-input-block layui-upload">
	                    <button type="button" class="layui-btn" id="upload-mutiple">选择图片</button>
	                    <div class="layui-upload-list">
						<ul class="x-layui-row" id="upload-list">
							<?php if($a['pic']): ?>
							<li class='img-wrapper' id='selected'><div class='img-container' style='width: 113px; height: 113px'><div class='xbg'></div><img data-id='<?php echo $pid; ?>' src='<?php echo $a['pic']; ?>' style='position: absolute; top: 0px; left: -18.8333px; width: 150.667px; height: 113px;'><div class='file-opt-box clearfix'><span class='remove'>删除</span></div></div></li>
							<?php endif; if(is_array($piclist) || $piclist instanceof \think\Collection || $piclist instanceof \think\Paginator): $i = 0; $__LIST__ = $piclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>
							<li class='img-wrapper'><div class='img-container' style='width: 113px; height: 113px'><div class='xbg'></div><img data-id='<?php echo $p['id']; ?>' src='<?php echo $p['imgurl']; ?>' style='position: absolute; top: 0px; left: -18.8333px; width: 150.667px; height: 113px;'><div class='file-opt-box clearfix'><span class='remove'>删除</span></div></div></li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						</div>
	                </div>
				</div>
			</div>
		</div>
		<div class="layui-form-item magb0">
			<label class="layui-form-label">文章内容</label>
			<div class="layui-input-block">
				<textarea style="width:100%;height:500px;visibility:hidden;" name="content" lay-verify="required" id="content"><?php echo $a['content']; ?></textarea>
			</div>
		</div>
	</div>
	<div class="layui-col-md3 layui-col-xs12">
		<blockquote class="layui-elem-quote title"><i class="seraph icon-caidan"></i> 专题分类</blockquote>
		<div class="border category">
			<div class="layui-form-item">
				<label class="layui-form-label"><i class="layui-icon layui-icon-flag"></i> 专　题</label>
				<div class="layui-input-block sid">
					<select name="sid">
					<option>选择专题</option>
					<?php if(is_array($sub) || $sub instanceof \think\Collection || $sub instanceof \think\Paginator): $i = 0; $__LIST__ = $sub;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<option <?php if($a['sid'] == $v['id']): ?>selected<?php endif; ?> value="<?php echo $v['id']; ?>"><?php echo re_substr($v['subname'],0,16); ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
		</div>
		<blockquote class="layui-elem-quote title magt10"><i class="layui-icon">&#xe609;</i> 发布</blockquote>
		<div class="border">
			
			<div class="layui-form-item">
				<label class="layui-form-label"> 作　者</label>
				<div class="layui-input-block">
					<input type="text" name="author" class="layui-input author" value="<?php echo $a['author']; ?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"> 来　源</label>
				<div class="layui-input-block">
					<input type="text" name="from" class="layui-input from" value="<?php echo $a['from']; ?>">
				</div>
			</div>

			<div class="layui-form-item releaseDate">
				<label class="layui-form-label"> 时　间</label>
				<div class="layui-input-block">
					<input type="text" class="layui-input" name="time" id="release" value="<?php echo date('Y-m-d H:i:s',$a['time']); ?>" readonly />
				</div>
			</div>

			<div class="layui-form-item tj">
				<label class="layui-form-label"><i class="seraph icon-zhiding"></i> 推　荐</label>
				<div class="layui-input-block">
					<input type="checkbox" name="tj" id="tj" lay-filter="tj" <?php if($a['tj']): ?>checked  value="1"<?php else: ?>value="0"<?php endif; ?> lay-skin="switch" lay-text="是|否">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label"> 跳　转</label>
				<div class="layui-input-block">
					<input type="text" name="url" class="layui-input url" value="<?php echo $a['url']; ?>">
				</div>
			</div>
			<hr class="layui-bg-gray" />
			<div class="layui-left">
				<input type="hidden" name="id" class="cid" value="<?php echo $a['id']; ?>"></input>
				<a class="layui-btn" lay-filter="addNews" lay-submit><i class="layui-icon">&#xe609;</i>保存文章</a>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/public/static/layui/layui.js"></script>
<script type="text/javascript" src="/public/static/kindeditor/NKeditor-all-min.js"></script>
<script type="text/javascript">
layui.use(['form','layer','layedit','laydate','upload'],function(){
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        laypage = layui.laypage,
        upload = layui.upload,
        layedit = layui.layedit,
        laydate = layui.laydate,
        $ = layui.jquery;

    //上传缩略图
    upload.render({
		elem: '#upload-mutiple',
		url: "<?php echo url('index/uploads','',''); ?>",
		multiple: true,
		done: function (res) {
			//上传完毕
			if (res.code == "200") {
				$('#upload-list').append("<li class='img-wrapper'><div class='img-container' style='width: 113px; height: 113px'><div class='xbg'></div><img data-id='"+res.pid+"' src='"+res.src+"' style='position: absolute; top: 0px; left: -18.8333px; width: 150.667px; height: 113px;'><div class='file-opt-box clearfix'><span class='remove'>删除</span></div></div></li>");			
			}else{
				top.layer.msg(res.msg);
			}
		}
	});
	//设置封面
	$(document).on("dblclick",".img-wrapper",function(){
	  $("#selected").attr('id','');
	  $(this).attr('id',"selected");
	});
	//删除图片
	$(document).on("click",".remove",function(){
		var prs=$(this).parents('.img-wrapper');
		var pid=$(this).parent().siblings("img").attr('data-id');
		$.post("<?php echo url('index/remove'); ?>",{id:pid},function(res){
			if(res){
				prs.remove();
			}else{
				top.layer.msg('删除失败');
			}
		});
	});
    //格式化时间
	function filterTime(val){
	    if(val < 10){
	        return "0" + val;
	    }else{
	        return val;
	    }
	}
    //时间选择
    laydate.render({
        elem: '#release',
        type: 'datetime',
        trigger : "click"
    });
    //是否置顶
    form.on('switch(tj)', function(data){
        var pd = data.elem.checked ? '1' : '0';
        $('#tj').val(pd);
    });
    //提交表单
    form.on("submit(addNews)",function(data){ 
    	var pics = [];     
        //同步编辑器内容到textarea
        //editor.sync();
        $("#upload-list li").each(function(){
		    pics.push($(this).find('img').attr('data-id'));
		})
        //弹出loading
        var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        $.post("<?php echo url('article/runadd'); ?>",{
            title : $(".title").val(),  //文章标题
            keyword : $(".keywords").val(), 
            description : $(".description").val(),  //文章摘要
            content : $("#content").val(),  //文章内容
            pic : $("#upload-list #selected img").attr("src"),  //缩略图
            pics : pics,
            sid : $(".sid select").val(),    //文章专题分类
            author : $('.author').val(),    //作者
            from : $('.from').val(), //来源
            time : $('#release').val(),    //发布时间
            tj : $("#tj").val(),    //是否置顶
            url : $('.url').val(),    //跳转地址
            id : $('.cid').val()
        },function(res){
        	if(res==1){
        		top.layer.close(index);
	            top.layer.msg("文章修改成功！");
	            layer.closeAll("iframe");
	            //刷新父页面
	            parent.location.reload();
        	}else{
        		top.layer.msg("文章修改失败！");
        	}
        });
        return false;
    })

    //创建一个编辑器
    KindEditor.ready(function(K) {
	    K.create('textarea[name="content"]', {
	        uploadJson : "http://herosphp.r9it.com/admin/upload/qiniu",
	        fileManagerJson : 'http://herosphp.r9it.com/admin/upload/filelist',
	        imageSearchJson : null, //图片搜索url
	        dialogOffset : 0, //对话框距离页面顶部的位置，默认为0居中，
	        filePostName: 'file',
	        allowFileManager : true,
	        allowImageUpload : true,
	        allowMediaUpload : true,
	        themeType : "grey", //主题
	        afterCreate : function() {
		        var self = this;
		        K.ctrl(document, 13, function() {
			        self.sync();
			        K('form[name=example]')[0].submit();
		        });
		        K.ctrl(self.edit.doc, 13, function() {
			        self.sync();
			        K('form[name=example]')[0].submit();
		        });
	        },
	        //错误处理 handler
	        errorMsgHandler : function(message, type) {
		        layer.alert(message);
	        }
	    });
	})

})
</script>
</body>
</html>