<?php
namespace app\website\controller;

class Info extends Common{
	
	public function index(){
		$id=input('id');
		$rs=db('cate')->field('id,name')->where('id',$id)->find();
		$info=db('info')->where('cid',$id)->find();
		$this->assign('c',$rs);
		$this->assign('v',$info);
		return $this->fetch();
	}

	public function lists(){
		$rs=db('info')->field('id,title')->where('cid',0)->select();
		$this->assign('list',$rs);
		return $this->fetch();
	}

	public function add(){		
		return $this->fetch();		
	}

	public function runadd(){
		$data=input('');
		if(input('id')){
			$rs=db('info')->update($data);
		}else{
			$rs=db('info')->insert($data);
		}
		return $rs;
	}

	public function edit(){
		$id=input('id');
		$rs=db('info')->where('id',$id)->find();
		$this->assign('v',$rs);
		return $this->fetch('add');
	}

	public function del(){
		$id=input('id');
		$rs=db('info')->where('id',$id)->delete();
		return $rs;
	}

}