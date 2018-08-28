<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wwwroot\thinkphp5_765tm6\web/application/website\view\system\index.html";i:1535450624;}*/ ?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>分类页</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/public/static/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/css/welcome.css" />
    <script type="text/javascript" src="/public/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/static/layui/layui.js"></script>
  </head>
  
  <body>
    <div class="x-body">
      <xblock>
          <button class="layui-btn add-btn"><i class="layui-icon layui-icon-add-circle-fine"></i>增加顶级分类</button>
        <div class="layui-clear"></div>
      </xblock>
      <table class="layui-table layui-form">
        <thead>
          <tr>
            <th width="70">ID</th>
            <th>栏目名</th>
            <th width="50">排序</th>
            <th width="50">状态</th>
            <th width="220">操作</th>
        </thead>
        <tbody class="x-cate">
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
          <tr cate-id='<?php echo $v['id']; ?>' fid='<?php echo $v['pid']; ?>' >
            <td><?php echo $v['id']; ?></td>
            <td><i class="layui-icon x-show" status='true'>&#xe623;</i>
              <?php echo $v['_name']; ?>
            </td>
            <td><input type="text" class="layui-input x-sort" name="order" data-id="<?php echo $v['id']; ?>" value="<?php echo $v['order']; ?>"></td>
            <td>
              <input type="checkbox" name="switch" lay-text="开|关" id="<?php echo $v['id']; ?>" lay-filter="display" <?php if($v['display']): ?>checked=""<?php endif; ?> lay-skin="switch">
            </td>
            <td class="td-manage">
              <button class="layui-btn layui-btn layui-btn-xs edit-btn" data-id="<?php echo $v['id']; ?>"><i class="layui-icon">&#xe642;</i>编辑</button>
              <button class="layui-btn layui-btn-warm layui-btn-xs add-xia"  data-id="<?php echo $v['id']; ?>" ><i class="layui-icon">&#xe654;</i>添加子栏目</button>
              <button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="menu_del(this,<?php echo $v['id']; ?>)" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
            </td>
          </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>  
        
        </tbody>
      </table>
    </div>
    <script>
    layui.use(['form','layer','laydate','table','laytpl'],function(){
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        laydate = layui.laydate,
        laytpl = layui.laytpl,
        table = layui.table;

    form.on('switch(display)',function display(data){
        var pd = data.elem.checked ? '1' : '0';
        var id = data.elem.id;
        $.post("<?php echo url('system/dis','',''); ?>",{"dis":pd,"id":id},function(result){
          if(result){
            layer.msg('操作成功！');
          }else{
            layer.msg('操作失败!');
          }
        });
    });
    //添加
    function addmenu(id,e){
        if(e==1){
          var url="<?php echo url('system/menuedit','',''); ?>/id/"+id;
          var p="修改";
        }else{
          var url="<?php echo url('system/menuadd','',''); ?>/id/"+id;
          var p="添加";
        }
        var index = layui.layer.open({
            title : p+"菜单",
            type : 2,
            content : url,
        })
        layui.layer.full(index);
        //改变窗口大小时，重置弹窗的宽高，防止超出可视区域（如F12调出debug的操作）
        $(window).on("resize",function(){
            layui.layer.full(index);
        })
    }
    $(".add-btn").click(function(){
        addmenu();
    }) 
    $(".edit-btn").click(function(){
        var id=$(this).attr("data-id");
        addmenu(id,1);
    }) 
    $(".add-xia").click(function(){
        var id=$(this).attr("data-id");
        addmenu(id,0);
    }) 
  });
  $("input").blur(function(){
    var v=$(this).val();
    var id=$(this).attr("data-id");
    $.post("<?php echo url('system/dis','',''); ?>",{'id':id,'ord':v},function(result){
      if(result==0){
        layer.msg('排序失败!');
      }
    });
  });
  function menu_del(obj,id){
      layer.confirm('确认要删除吗？',function(index){            
          //发异步删除数据
        $.post("<?php echo url('system/del','',''); ?>",{id:id},function(result){
          if(result){
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
          }else{
            layer.msg('删除失败!',{icon:2,time:1000});
          }
        });

      });
    }
  $(function () {
    $("tbody.x-cate tr[fid!='0']").hide();
    // 栏目多级显示效果
    $('.x-show').click(function () {
        if($(this).attr('status')=='true'){
            $(this).html('&#xe625;'); 
            $(this).attr('status','false');
            cateId = $(this).parents('tr').attr('cate-id');
            $("tbody tr[fid="+cateId+"]").show();
       }else{
            cateIds = [];
            $(this).html('&#xe623;');
            $(this).attr('status','true');
            cateId = $(this).parents('tr').attr('cate-id');
            getCateId(cateId);
            for (var i in cateIds) {
                $("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').html('&#xe623;').attr('status','true');
            }
       }
    })
  })
    var cateIds = [];
    function getCateId(cateId) {
        
        $("tbody tr[fid="+cateId+"]").each(function(index, el) {
            id = $(el).attr('cate-id');
            cateIds.push(id);
            getCateId(id);
        });
    }
  </script>
  </body>
</html>