<?php
namespace app\website\controller;

class Banner extends Common{

	public function type(){
		$rs=db('type')->where('type','banner')->order('orders asc,id asc')->select();
		$this->assign('list',$rs);
		return $this->fetch();
	}

	public function typeadd(){
		return $this->fetch();
	}

	public function typedit(){
		$id=input('id');
		$rs=db('type')->where('id',$id)->find();
		$this->assign('v',$rs);
		return $this->fetch('typeadd');
	}

	public function runtype(){
		$id=input('id');
		if(input('name'))$data['name']=input('name');
		if(input('order'))$data['orders']=input('order');
		$data['type']="banner";
		if($id){
			$rs=db('type')->where('id',$id)->update($data);
		}else{
			$rs=db('type')->insert($data);
		}
		return $rs;
	}

	public function typedel(){
		$rs=db('type')->where('id',input('id'))->where('type','banner')->delete();
		return $rs;
	}

	public function index(){
		return $this->fetch();
	}

	public function page(){
		$rs=db('adv')->field('id,name,pic as src,orders')->order('orders ASC,id ASC')->select();
		$data=array("title"=>"图片管理","id"=>"Images","start"=>0,"data"=>$rs);
		return $data;
	}

	public function add(){
		$rs=db('type')->field('id,name,orders')->where('type','banner')->order('orders ASC')->select();
		$this->assign('type',$rs);
		return $this->fetch();
	}

	public function runadd(){
		$data=input('post.');				
		if(input('id')){
			$rs=db('adv')->update($data);
		}else{
			$rs=db('adv')->insert($data);
		}		
		return $rs;
	}

	public function edit(){
		$id=input('id');
		$rs=db('type')->field('id,name,orders')->where('type','banner')->order('orders ASC')->select();
		$v=db('adv')->where('id',$id)->find();
		$this->assign('type',$rs);
		$this->assign('v',$v);
		return $this->fetch('add');
	}

	public function del(){
		input('id') ? $where['id']=input('id') : $where['id']=array('in',input('ids/a'));
		$rs=db('adv')->where($where)->delete();
		return $rs;
	}
}