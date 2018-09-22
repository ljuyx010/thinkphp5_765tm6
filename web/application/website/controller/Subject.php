<?
namespace app\website\controller;

class Subject extends Common{

	public function index(){
		return $this->fetch();
	}

	public function page(){
		$db=db('subject');
		$id=input('id');
		$p=input('page');
		$l=input('limit');
		$o=input('order');
		$key=input('key');
		$map=array();
		if($key){$map['subname']=['like','%'.$key.'%'];}
		if(is_null($id)){
			$c=$db->where($map)->count();
			$rs=$db->field('*,FROM_UNIXTIME(time,"%Y-%m-%d %H:%i") as addTime')->where($map)->order('orders ASC,id ASC')->page($p,$l)->select();
			if(!$rs){$msg="暂无数据";}else{$msg='数据正常';} 
			$data=array('code'=>0,'msg'=>$msg,'count'=>$c,'data'=>$rs);
			return $data;
		}else{
			$rs=$db->where('id',$id)->setField('orders',$o);
			return $rs;
		}
	}

	public function add(){
		return $this->fetch();
	}

	public function runadd(){
		$data=input('post.');
		$data['time']=strtotime(input('time'));				
		if(input('id')){
			$rs=db('subject')->update($data);
		}else{
			$rs=db('subject')->insert($data);
		}		
		return $rs;
	}

	public function edit(){
		$id=input('id');
		$v=db('subject')->where('id',$id)->find();
		$this->assign('v',$v);
		return $this->fetch('add');
	}

	public function del(){
		input('id') ? $where['id']=input('id') : $where['id']=array('in',input('ids/a'));
		$rs=db('subject')->where($where)->delete();
		return $rs;
	}
}