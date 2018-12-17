<?php
namespace app\website\controller;
use think\Controller;
use think\Db;
use think\Request;

class Common extends Controller{
	
	public function _initialize(){
		vendor('Auth.Authli');
		$auth=new \Auth\Authli();
		if(session('user.id')){			
			$url=request()->controller().'/'.lcfirst(request()->action());
			$result=$auth->check($url,session('user.id'));
			if(!$result){
				exit("<script>
		        top.layer.msg('Sorry，您没有此权限', {icon: 5});        
		        parent.$('#top_tabs .layui-this').remove();
		   		parent.$('#top_tabs li:eq(0)').addClass('layui-this');
		   		parent.$('.clildFrame .layui-tab-item:eq(0)').addClass('layui-show');
				parent.tab.tabMove();		
				</script>");
			}
		}else{
			echo "<script>window.parent.location.reload();</script>";
			$this->redirect('login/index');
		}
		
		
    }
    
	
}

?>