<?php
namespace app\website\controller;

class Gbook extends Common{
	
	public function type(){
		$data=db('gtype')->field('id,gname')->where('del',0)->order('id DESC')->select();
		$this->assign('list',$data);
		return $this->fetch();
	}
	
	public function typeadd(){
		return $this->fetch();
	}

	public function typedit(){
		$id=input('id');
		$data=db('gtype')->where('id',$id)->find();
		$field=json_decode(stripslashes($data['field']),true);
		$dis=explode("|", $data['disfield']);
		$no=explode("|", $data['notnull']);
		$this->assign('field',$field);
		$this->assign('no',$no);
		$this->assign('dis',$dis);
		$this->assign('gname',$data['gname']);
		$this->assign('id',$data['id']);
		return $this->fetch('typeadd');
	}

	public function runtype(){
		$no=array();
		$dis=array();
		$field=array();
		foreach (input('bs/a') as $k => $v) {
			$field[]=array('zd'=>$v,'title'=>input('name.'.$k));
		}
		foreach (input('dis/a') as $k => $v) {
			$dis[]=input('bs.'.$k);
		}
		foreach (input('notnull/a') as $k => $v) {
			$no[]=input('bs.'.$k);
		}		
		$data=array(
			'gname'=>input('gname'),
			'field'=>addslashes(json_encode($field)),
			'disfield'=>implode("|", $dis),
			'notnull'=>implode("|", $no)
		);
		if(input('id')){
			$rs=db('gtype')->where('id',input('id'))->update($data);
		}else{
			$rs=db('gtype')->insert($data);
		}
		return $rs;
	}

	public function typedel(){
		$id=input('id','','intval');
		$rs=db('gtype')->where('id',$id)->setField('del',1);
		return $rs;
	}

	public function index(){
		$id=input('id');
		$data=db('cate')->alias('c')->join('gtype g','c.gid = g.id')->field('c.id,c.gid,g.field,g.disfield')->where('c.id',$id)->find();
		$field=json_decode(stripslashes($data['field']),true);
		$dis=explode("|", $data['disfield']);
		$this->assign('id',$data['id']);
		$this->assign('field',$field);
		$this->assign('dis',$dis);
		return $this->fetch();
	}

	public function page(){
		$db=db('gbook');
		$id=input('id');
		$p=input('page');
		$l=input('limit');
		$c=$db->where('cid',$id)->count();
		$rs=$db->where('cid',$id)->order('time desc')->page($p,$l)->select();		
		if(!$rs){
			$msg="本栏目暂无数据";
		}else{
			$msg='数据正常';
			foreach ($rs as $k => $v) {
			$a=json_decode(stripslashes($v['content']),true);
			$v=array_merge($v,$a);
			unset($v['content']);
			$rs[$k]=$v;
			}
		}

		$data=array('code'=>0,'msg'=>$msg,'count'=>$c,'data'=>$rs);
		return $data;
	}

	public function edit(){
		$rs=db('gbook')->where('id',input('id'))->find();
		$a=json_decode(stripslashes($rs['content']),true);
		$rs=array_merge($rs,$a);
		unset($rs['content']);
		$data=db('cate')->alias('c')->join('gtype g','c.gid = g.id')->field('c.id,c.gid,g.field')->where('c.id',$rs['cid'])->find();
		$field=json_decode(stripslashes($data['field']),true);
		$this->assign('v',$rs);
		$this->assign('field',$field);
		return $this->fetch();
	}

	public function reply(){
		$data=input('');
		$data['rtime']=time();
		$rs=db('gbook')->update($data);
		return $rs;
	}

	public function del(){
		$id=input('id','','intval');
		$rs=db('gbook')->where('id',$id)->delete();
		return $rs;
	}

}