<?
namespace app\website\controller;

class System extends Common{

	public function index(){
		vendor ('Nx.Datastyle');
		$data=db('nav')->where('display',1)->select();
		$data=\Datastyle::tree($data,'name','id','pid');
		$this->assign('list',$data);
		return $this->fetch();
	}

	public function menuadd(){
		$pid = input('post.id',0,'intval');
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
		$this->assign('id',$id);
		$this->assign('pid',$rs['pid']);
		$this->assign('v',$rs);
		$this->fetch(menuadd);
	}

}
?>