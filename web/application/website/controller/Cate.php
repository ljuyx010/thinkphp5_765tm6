<?php
namespace app\website\controller;

class Cate extends Common{
	
	public function index(){
		vendor ('Nx.Datastyle');	
		$data=db('cate')->field('id,pid,name,model,orders,isf')->order('orders asc,id asc')->select();
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
		$rs=db('gtype')->field('id,gname')->where('del',0)->select();
		$this->assign('pid',$pid);
		$this->assign('gtype',$rs);
		return $this->fetch();
	}

	public function runadd(){
		$id=input('id','','intval');
		$nav=db('cate');
		$data=input('');
		if($id){
			$rs=$nav->update($data);
		}else{
			$rs=$nav->insert($data);
		}
		if($rs==0){return '1';}else if($rs){return '1';}else{return '0';}
	}

	public function edit(){
		vendor ('Nx.Datastyle');
		$id= input('id',0,'intval');
		$gtype=db('gtype')->field('id,gname')->where('del',0)->select();
		$rs=db('cate')->where('id',$id)->find();
		$data=db('cate')->field('id,pid,name,model,orders,isf')->order('orders asc,id asc')->select();
		$data=\Datastyle::tree($data,'name','id','pid');
		$this->assign('list',$data);
		$this->assign('v',$rs);
		$this->assign('gtype',$gtype);
		return $this->fetch();
	}

	public function dis(){
		$id=input('id','','intval');
		$dis=input('dis','','intval');
		$order=input('ord','','intval');
		if($dis!=''){$data['isf']=$dis;}
		if($order!=''){$data['orders']=$order;}
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