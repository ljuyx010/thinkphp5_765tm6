<?
namespace app\website\controller;

class Index extends Common{
	
	public function index(){
		return $this->fetch();
	}

	public function main(){
		return $this->fetch();
	}

	public function getmenu(){
		if(input('param.id')==1){
			$rs=db('nav')->field(['name'=>'title','ico'=>'icon','url'=>'href'])->where('display',1)->order('order ASC,id ASC')->select();
			return $rs;
		}
		if(input('param.id')==2){
			return '[{"title":"\u6587\u7ae0\u7ba1\u7406","icon":"layui-icon &#xe629;","href":"\/admin\/article\/index","spread":false},{"title":"\u7528\u6237\u7ba1\u7406","icon":"layui-icon layui-icon-username","href":"\/admin\/user\/index","spread":false},{"title":"testtest","icon":"iconfont xman-menu","href":"\/admin\/testtest\/index","spread":false}]';
		}
	}
	
}

?>