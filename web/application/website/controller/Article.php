<?
namespace app\website\controller;
use \think\Request;

class Article extends Common{

	public function index(){
		$id=input('id');
		$this->assign('id',$id);
		return $this->fetch();
	}

	public function fpage(){
		$db=db('article');
		$id=input('id');
		$p=input('page');
		$l=input('limit');
		$c=$db->where('cid',$id)->where('del',0)->count();
		$rs=$db->field('id,title,pic,tj,FROM_UNIXTIME(time,"%d-%m-%Y") as times,author')
		->where('cid',$id)->where('del',0)->order('time desc')->page($p,$l)->select();
		if(!$rs){$msg="本栏目暂无数据";}else{$msg='数据正常';} 
		$data=array('code'=>0,'msg'=>$msg,'count'=>$c,'data'=>$rs);
		return $data;
	}

}

?>