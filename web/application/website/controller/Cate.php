<?
namespace app\website\controller;
use \think\Request;

class Cate extends Common{
	
	public function index(){
		vendor ('Nx.Datastyle');
		$data=db('cate')->field('id,pid,name,model,order,isf')->select();
		$pid=db('cate')->field('pid')->where('pid','>',0)->group('pid')->select();
		$array=array();
		foreach ($pid as $k=>$v){
		   $array[]=$v['pid'];
		}
		$data=\Datastyle::tree($data,'name','id','pid');
		$this->assign('pid',$array);
		$this->assign('list',$data);
		return $this->fetch();
	}

	public function add(){
		$pid = input('id',0,'intval');
		$this->assign('pid',$pid);
		return $this->fetch();
	}

	public function runadd(){
		$id=input('id','','intval');
		$nav=db('cate');
		$data=Request::instance()->except('id');
		if($id){
			$rs=$nav->where('id',$id)->update($data);
		}else{
			$rs=$nav->insert($data);
		}
		if($rs==0){return '1';}else if($rs){return '1';}else{return '0';}
	}

	public function edit(){
		$id= input('id',0,'intval');
		$rs=db('cate')->where('id',$id)->find();
		$this->assign('v',$rs);
		return $this->fetch();
	}

	public function dis(){
		$id=input('id','','intval');
		$dis=input('dis','','intval');
		$order=input('ord','','intval');
		if($dis!=''){$data['isf']=$dis;}
		if($order!=''){$data['order']=$order;}
		$rs=db('cate')->where('id',$id)->update($data);
		if($rs){return 1;}else{return 0;}
	}

	public function del(){
		$id=input('id','','intval');
		$rs=db('cate')->where('id',$id)->delete();
		if($rs){return 1;}else{return 0;}
	}

	
}

?>