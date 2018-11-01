<?php
namespace app\website\controller;
use think\Controller;
use think\Db;
use think\Request;

class Common extends Controller{
	
	public function _initialize(){
		if(0){
			exit("<script>
	        top.layer.msg('Sorry，您没有此权限', {icon: 5});        
	        parent.$('#top_tabs .layui-this').remove();
	   		parent.$('#top_tabs li:eq(0)').addClass('layui-this');
	   		parent.$('.clildFrame .layui-tab-item:eq(0)').addClass('layui-show');
			parent.tab.tabMove();		
			</script>");
		}
		
    }
    
	
}

?>