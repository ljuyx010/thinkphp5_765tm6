<?
namespace app\website\controller;
use \think\Request;

class Article extends Common{

	public function index(){
		vendor ('Nx.Datastyle');
		$id=input('id');
		$this->assign('id',$id);
		$db=db('cate');
		$data=$db->field('id,pid,name')->where('model','article')->select();
		$pid=$db->field('pid')->where('pid','>',0)->group('pid')->select();
		$array=array();
		foreach ($pid as $k=>$v){
		   $array[]=$v['pid'];
		}
		$data=\Datastyle::tree($data,'name','id','pid');
		$this->assign('pid',$array);
		$this->assign('list',$data);
		return $this->fetch();
	}

	public function fpage(){
		$db=db('article');
		$id=input('id');
		$p=input('page');
		$l=input('limit');
		$tj=input('tj');
		$key=input('key');
		$map['del']=0;
		$map['cid']=$id;
		if($key){$map['title']=['like','%'.$key.'%'];}
		if(is_null($tj)){
			$c=$db->where($map)->count();
			$rs=$db->field('id,title,pic,tj,FROM_UNIXTIME(time,"%Y-%m-%d") as times,author')
			->where($map)->order('time desc')->page($p,$l)->select();
			if(!$rs){$msg="本栏目暂无数据";}else{$msg='数据正常';} 
			$data=array('code'=>0,'msg'=>$msg,'count'=>$c,'data'=>$rs);
			return $data;
		}else{
			$rs=$db->where('id',input('aid'))->setField('tj',$tj);
			return $rs;
		}
		
	}

	public function move(){
		$id=input('ids/a');
		$cid=input('cid');
		$rs=db('article')->where('id','in',$id)->setField('cid',$cid);
		return $rs;
	}

	public function del(){
		$id = input('newsId') ? $where['id']=input('newsId') : $where['id']=array('in',input('ids/a'));
		$rs=db('article')->where($where)->setField('del',1);
		return $rs;
	}

	public function add(){
		$cid=input('cid');
		$rs=db('subject')->field('id,subname')->order('order asc')->select();
		$this->assign('cid',$cid);
		$this->assign('sub',$rs);
		return $this->fetch();
	}

	public function runadd(){
		p(input('post.*'));
	}

}

?>