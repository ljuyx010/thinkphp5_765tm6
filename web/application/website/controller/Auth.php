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
		$data=array('title'=>input('title'),'rules'=>implode(",", input('nid/a')));
		if(input('idr')){$data['idr']=input('idr');$data['cid']=implode(",", input('cid/a'));}
		$nav=db('auth_group');
		if($id){
			$rs=$nav->where('id',$id)->update($data);
		}else{
			$rs=$nav->insert($data);
		}
		if($rs==0){return '1';}else if($rs){return '1';}else{return '0';}
	}

	public function gedit(){
		vendor ('Nx.Datastyle');
		$id= input('id',0,'intval');
		$cate=db('cate')->field('id,pid,name')->select();
		$nav=db('auth_rule')->field('id,pid,title')->where('status',1)->select();
		$rs=db('auth_group')->where('id',$id)->find();
		$rs['rules']=explode(",",$rs['rules']);
		$rs['cid']=explode(",",$rs['cid']);
		$cate=\Datastyle::tree($cate,'name','id','pid');
		$nav=\Datastyle::node_merge($nav);
		$this->assign('cate',$cate);
		$this->assign('nav',$nav);		
		$this->assign('v',$rs);
		return $this->fetch('gadd');
	}

	public function gdis(){
		$id=input('id','','intval');
		$dis=input('dis','','intval');
		$data['status']=$dis;
		$rs=db('auth_group')->where('id',$id)->update($data);
		if($rs){return 1;}else{return 0;}
	}

	public function gdel(){
		$id=input('id','','intval');
		$rs=db('auth_group')->where('id',$id)->delete();
		if($rs){return 1;}else{return 0;}
	}

	public function user(){
		if(input('f')){
			$db=db('admin');
			$p=input('page');
			$l=input('limit');
			$c=$db->where('csr',0)->count();
			$rs=$db->alias('a')->join('auth_group g','a.gid=g.id')
			->field('a.id,gid,username,name,pic,state,FROM_UNIXTIME(regtime,"%Y-%m-%d") as regtimes,g.id,g.title')
			->where('csr',0)->order('a.id asc')->page($p,$l)->select();		
			if(!$rs){
				$msg="本栏目暂无数据";
			}else{
				$msg='数据正常';
			}

			$data=array('code'=>0,'msg'=>$msg,'count'=>$c,'data'=>$rs);
			return $data;
		}else{
			return $this->fetch();
		}		
	}

	public function addu(){
		$rs=db('auth_group')->field('id,title')->where('status',1)->select();
		$this->assign('type',$rs);
		return $this->fetch();
	}

	public function runu(){
		$id=input('id','','intval');
		$data=array('pic'=>input('pic'),'name'=>input('name'),'username'=>input('username'),'csr'=>input('csr'));
		if(input('password')){$data['password']=md5(md5(input('password')));}
		$nav=db('admin');
		if($id){
			$rs=$nav->where('id',$id)->update($data);
			db('auth_group_access')->where('uid',$id)->update(['group_id'=>input('gid')]);
		}else{
			$data['regtime']=time();
			$rs=$nav->insertGetId($data);
			db('auth_group_access')->insert(['uid'=>$rs,'group_id'=>input('gid')]);
		}
		if($rs==0){return '1';}else if($rs){return '1';}else{return '0';}
	}

	public function editu(){
		$rs=db('auth_group')->field('id,title')->where('status',1)->select();
		$data=db('admin')->field('password,state,regtime',true)->where('id',input('id'))->find();
		$this->assign('type',$rs);
		$this->assign('v',$data);
		return $this->fetch('addu');
	}

	public function delu(){
		$z=input('tj');
		input('id') ? $where['id']=input('id') : $where['id']=array('in',input('ids/a'));
		if(is_null($z)){
			$rs=db('admin')->where($where)->delete();
		}else{
			$rs=db('admin')->where($where)->setField('state',$z);
		}
		return $rs;		
	}

}