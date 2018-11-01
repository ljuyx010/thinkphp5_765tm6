<?php
namespace app\website\controller;

class Auth extends Common{

	public function access(){
		vendor ('Nx.Datastyle');	
		$data=db('auth_rule')->field('id,pid,name,title,status')->order('id asc')->select();
		$pid=db('auth_rule')->field('pid')->where('pid','>',0)->group('pid')->select();
		$array=array();
		foreach ($pid as $k=>$v){
		   $array[]=$v['pid'];
		}
		$data=\Datastyle::tree($data,'title','id','pid');
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
		$nav=db('auth_rule');
		$data=input('');
		if($id){
			$rs=$nav->update($data);
		}else{
			$rs=$nav->insert($data);
		}
		if($rs==0){return '1';}else if($rs){return '1';}else{return '0';}
	}

	public function edit(){
		$id= input('id',0,'intval');
		$rs=db('auth_rule')->where('id',$id)->find();
		$this->assign('v',$rs);
		$this->assign('pid',$rs['pid']);
		return $this->fetch('add');
	}

	public function dis(){
		$id=input('id','','intval');
		$dis=input('dis','','intval');
		$data['status']=$dis;
		$rs=db('auth_rule')->where('id',$id)->update($data);
		if($rs){return 1;}else{return 0;}
	}

	public function del(){
		$id=input('id','','intval');
		$rs=db('auth_rule')->where('id',$id)->delete();
		if($rs){return 1;}else{return 0;}
	}

	public function rule(){
		$data=db('auth_group')->field('id,title,status')->order('id asc')->select();
		$this->assign('list',$data);
		return $this->fetch();
	}

	public function gadd(){
		vendor ('Nx.Datastyle');
		$cate=db('cate')->field('id,pid,name')->select();
		$nav=db('auth_rule')->field('id,pid,title')->where('status',1)->select();
		$cate=\Datastyle::tree($cate,'name','id','pid');
		$nav=\Datastyle::node_merge($nav);
		$this->assign('cate',$cate);
		$this->assign('nav',$nav);
		return $this->fetch();
	}

	public function rungadd(){
		$id=input('id','','intval');
		$nav=db('auth_rule');
		$data=input('');
		if($id){
			$rs=$nav->update($data);
		}else{
			$rs=$nav->insert($data);
		}
		if($rs==0){return '1';}else if($rs){return '1';}else{return '0';}
	}

	public function gedit(){
		$id= input('id',0,'intval');
		$rs=db('auth_rule')->where('id',$id)->find();
		$this->assign('v',$rs);
		$this->assign('pid',$rs['pid']);
		return $this->fetch('gadd');
	}

	public function gdis(){
		$id=input('id','','intval');
		$dis=input('dis','','intval');
		$data['status']=$dis;
		$rs=db('auth_rule')->where('id',$id)->update($data);
		if($rs){return 1;}else{return 0;}
	}

	public function gdel(){
		$id=input('id','','intval');
		$rs=db('auth_rule')->where('id',$id)->delete();
		if($rs){return 1;}else{return 0;}
	}

}