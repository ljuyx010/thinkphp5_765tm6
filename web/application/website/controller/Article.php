<?php
namespace app\website\controller;

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
		input('newsId') ? $where['id']=input('newsId') : $where['id']=array('in',input('ids/a'));
		if(input('t')){
			$rs=db('article')->where($where)->delete();
		}else{
			$rs=db('article')->where($where)->setField('del',1);
		}		
		return $rs;
	}

	public function add(){
		$cid=input('cid');
		$rs=db('subject')->field('id,subname')->order('orders asc')->select();
		$this->assign('cid',$cid);
		$this->assign('sub',$rs);
		return $this->fetch();
	}

	public function runadd(){
		$data=array(
			'title' => input('title'),
			'keyword' => input('keyword'),
			'pic' => input('pic'),
			'sid' => input('sid'),
			'author' => input('author'),
			'from' => input('from'),
			'tj' => input('tj'),
			'url' => input('url')
		);
		$data['time']=input('time') ? strtotime(input('time')) : time();
		$data['pics']=input('pics') ? implode("|", input('pics/a')) : '';
		$data['description']=input('description') ? input('description') : re_substr(preg_replace('/\s/', '', input('content','','strip_tags')),0,300,false);
		$data['content']=input('content','','htmlspecialchars');
		if(input('?post.id')){
			$data['id']=input('id');
			$rs=db('article')->update($data);
		}else{
			$data['cid']=input('cid');
			$data['uid']=session('user.id')?session('user.id'):0;
			$rs=db('article')->insert($data);
		}
		return $rs;
	}

	public function edit(){
		$id=input('id');
		$article=db('article')->where('id',$id)->find();
		$pics=explode("|", $article['pics']);
		$pid=db('img')->where('imgurl',$article['pic'])->value('id');
		$piclist=db('img')->where('id','in',$pics)->select();
		$sub=db('subject')->field('id,subname')->order('orders asc')->select();
		$this->assign('a',$article);
		$this->assign('pid',$pid);
		$this->assign('piclist',$piclist);
		$this->assign('sub',$sub);
		return $this->fetch();
	}

	public function recyle(){
		if(input('t')){
			$p=input('page');
			$l=input('limit');
			$key=input('key');
			$map['del']=1;
			if($key){$map['title']=['like','%'.$key.'%'];}
			$c=db('article')->where($map)->count();
			$rs=db('article')->alias('a')->join('cate c','a.cid = c.id')->field('c.name as cname,a.id,title,a.pic,tj,FROM_UNIXTIME(time,"%Y-%m-%d") as times,author')->where($map)->order('time desc')->page($p,$l)->select();
			if(!$rs){$msg="暂无数据";}else{$msg='数据正常';}
			$data=array('code'=>0,'msg'=>$msg,'count'=>$c,'data'=>$rs);
			return $data;
		}else{
			return $this->fetch();
		}
	}

	public function restore(){
		input('newsId') ? $where['id']=input('newsId') : $where['id']=array('in',input('ids/a'));
		$rs=db('article')->where($where)->setField('del',0);		
		return $rs;
	}

}

?>