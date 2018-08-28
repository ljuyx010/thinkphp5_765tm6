<?
namespace app\website\controller;

class System extends Common{

	public function index(){
		vendor ('Nx.Datastyle');
		$data=db('nav')->select();
		$data=\Datastyle::tree($data,'name','id','pid');
		$this->assign('list',$data);
		return $this->fetch();
	}

	public function menuadd(){
		$pid = input('id',0,'intval');
		$this->assign('pid',$pid);
		return $this->fetch();
	}

	public function runadd(){
		$id=input('id','','intval');
		$nav=db('nav');
		$data['pid']=input('pid',0,'intval');
		$data['name']=input('name');
		$data['ico']=input('ico');
		$data['url']=input('url');
		if($id){
			$rs=$nav->where('id',$id)->update($data);
		}else{
			$rs=$nav->insert($data);
		}
		if($rs==0){return '1';}else if($rs){return '1';}else{return '0';}
	}

	public function menuedit(){
		$id= input('id',0,'intval');
		$rs=db('nav')->where('id',$id)->find();
		$this->assign('v',$rs);
		return $this->fetch();
	}

	public function dis(){
		$id=input('id','','intval');
		$dis=input('dis','','intval');
		$order=input('ord','','intval');
		if($dis!=''){$data['display']=$dis;}
		if($order!=''){$data['order']=$order;}
		$rs=db('nav')->where('id',$id)->update($data);
		if($rs){return 1;}else{return 0;}
	}

	public function del(){
		$id=input('id','','intval');
		$rs=db('nav')->where('id',$id)->delete();
		if($rs){return 1;}else{return 0;}
	}

}
?>