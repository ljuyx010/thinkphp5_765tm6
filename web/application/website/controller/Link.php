<?php
namespace app\website\controller;

class Link extends Common{

	public function type(){
		$rs=db('type')->where('type','link')->order('orders asc,id asc')->select();
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
		$data['type']="link";
		if($id){
			$rs=db('type')->where('id',$id)->update($data);
		}else{
			$rs=db('type')->insert($data);
		}
		return $rs;
	}

	public function typedel(){
		$rs=db('type')->where('id',input('id'))->where('type','link')->delete();
		return $rs;
	}

	public function index(){
		return $this->fetch();
	}

	public function fpage(){
		$db=db('link');
		$id=input('id');
		$p=input('page');
		$l=input('limit');
		$o=input('order');
		$key=input('key');
		$map=array();
		if($key){$map['name']=['like','%'.$key.'%'];}
		if(is_null($id)){
			$c=$db->where($map)->count();
			$rs=$db->alias('a')->join('type t','a.tid = t.id')->field('a.id,logo,a.name,url,tid,t.name as typename,a.orders,FROM_UNIXTIME(time,"%Y-%m-%d %H:%i") as addTime')->where($map)->order('orders ASC,id ASC')->page($p,$l)->select();
			if(!$rs){$msg="暂无数据";}else{$msg='数据正常';} 
			$data=array('code'=>0,'msg'=>$msg,'count'=>$c,'data'=>$rs);
			return $data;
		}else{
			$rs=$db->where('id',$id)->setField('orders',$o);
			return $rs;
		}
		
	}

	public function add(){
		$rs=db('type')->field('id,name,orders')->where('type','link')->order('orders ASC')->select();
		$this->assign('type',$rs);
		return $this->fetch();
	}

	public function runadd(){
		$data=input('post.');	
		if(input('id')){
			$rs=db('link')->update($data);
		}else{
			$data['time']=strtotime(input('addtime'));
			$rs=db('link')->insert($data);
		}		
		return $rs;
	}

	public function edit(){
		$id=input('id');
		$rs=db('type')->field('id,name,orders')->where('type','link')->order('orders ASC')->select();
		$v=db('link')->where('id',$id)->find();
		$this->assign('type',$rs);
		$this->assign('v',$v);
		return $this->fetch('add');
	}

	public function del(){
		input('linkId') ? $where['id']=input('linkId') : $where['id']=array('in',input('ids/a'));
		$rs=db('link')->where($where)->delete();
		return $rs;
	}

}