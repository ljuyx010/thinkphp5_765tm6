<?php
namespace app\website\controller;

class Collect extends Common{

	public function index(){
		if(input('t')){
			$p=input('page');
			$l=input('limit');
			$c=db('collect')->count();
			$rs=db('collect')->field('id,name,site,FROM_UNIXTIME(time,"%Y-%m-%d") as times')->order('time desc')->page($p,$l)->select();
			if(!$rs){$msg="暂无数据";}else{$msg='数据正常';} 
			$data=array('code'=>0,'msg'=>$msg,'count'=>$c,'data'=>$rs);
			return $data;
		}else{
			return $this->fetch();
		}
		
	}

	public function add(){
		vendor ('Nx.Datastyle');
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

	public function runadd(){
		$db=db('collect');
		$data=input('post.');
		if(input('id')){
			$rs=$db->update($data);
		}else{
			$rs=$db->insert($data);
		}
		if($rs){return 1;}else{return 0;}
	}

	public function edit(){		
		vendor ('Nx.Datastyle');
		$id=input('id');
		$db=db('cate');
		$data=$db->field('id,pid,name')->where('model','article')->select();
		$pid=$db->field('pid')->where('pid','>',0)->group('pid')->select();	
		$array=array();
		foreach ($pid as $k=>$v){
		   $array[]=$v['pid'];
		}
		$data=\Datastyle::tree($data,'name','id','pid');
		$rs=db('collect')->where('id',$id)->find();
		$this->assign('pid',$array);
		$this->assign('list',$data);
		$this->assign('v',$rs);
		return $this->fetch('add');
	}

	public function del(){
		$where['id']=array('in',input('ids/a'));
		$rs=db('collect')->where($where)->delete();			
		return $rs;
	}

	public function test(){
		vendor("QL.QueryList");
		$rs=db('collect')->where('id',input('id'))->find();
		if(!input('u')){
			$rules=array(
				'title'=>array($rs['titlegz'],'text'),
				'url'=>array($rs['urlgz'],'href')			
			);
			if($rs['timegz']) $rules['time']=array($rs['timegz'],'text');
			if($rs['imgz']) $rules['img']=array($rs['imgz'],'src');
			if($rs['clickgz']) $rules['click']=array($rs['clickgz'],'text');
			$url=str_replace("{p}",$rs['s'],$rs['url']);
			if($rs['bm']){
				$data=\QL\QueryList::Query($url,$rules,'','UTF-8','GB2312')->data;
			}else{
				$data=\QL\QueryList::Query($url,$rules)->data;
			}
			foreach($data as $k=>$v){
				if(strpos($v['url'],$rs['site']) == false){$data[$k]['surl']=$rs['site'].$v['url'];}
				if(isset($v['img'])){
					if(strpos($v['img'],$rs['site']) == false){$data[$k]['img']=$rs['site'].$v['img'];}
				}			
			}	
			$this->assign('id',input('id'));			
			$this->assign('list',$data);
			return $this->fetch();
		}else{
			$url=urldecode(input('u'));
			$rules=array(
				'title'=>array($rs['ntgz'],'text'),
				'content'=>array($rs['contgz'],'html')			
			);
			if($rs['descgz']) $rules['description']=array($rs['descgz'],'content');
			if($rs['keywordgz']) $rules['keyword']=array($rs['keywordgz'],'content');
			if($rs['authorgz']) $rules['author']=array($rs['authorgz'],'text');
			if($rs['fromgz']) $rules['from']=array($rs['fromgz'],'text');
			if($rs['ntime']) $rules['time']=array($rs['ntime'],'text');
			if($rs['hitgz']) $rules['click']=array($rs['hitgz'],'text');
			if($rs['bm']){
				$data=\QL\QueryList::Query($url,$rules,'','UTF-8','GB2312')->data;
			}else{
				$data=\QL\QueryList::Query($url,$rules)->data;
			}
			$this->assign('v',$data);
			return $this->fetch('nei');
		}
		
	}

	public function yunx(){
		vendor("QL.QueryList");
		$rs=db('collect')->where('id',input('id'))->find();
		$rules=array(
			'title'=>array($rs['titlegz'],'text'),
			'url'=>array($rs['urlgz'],'href')			
		);
		if($rs['timegz']) $rules['time']=array($rs['timegz'],'text','',function($time){return strtotime($time);});
		if($rs['imgz']) $rules['img']=array($rs['imgz'],'src');
		if($rs['clickgz']) $rules['click']=array($rs['clickgz'],'text');
		$js=0;
		while ($rs['s'] <= $rs['d']) {
		 	$url=str_replace("{p}",$rs['s'],$rs['url']);
			if($rs['bm'] && $rs['imgz']){
				$data=\QL\QueryList::Query($url,$rules,'','UTF-8','GB2312')->getData(function($item){
				    //图片本地化
				    $item['img'] = \QL\QueryList::run('DImage',[
				            'img' => $item['img'],
				            'image_path' => '/img/'.date('Y-m-d'),
				            'www_root' => dirname(__FILE__)
				        ]);
				    return $item;});
			}elseif($rs['imgz']){
				$data=\QL\QueryList::Query($url,$rules)->getData(function($item){
				    //图片本地化
				    $item['img'] = \QL\QueryList::run('DImage',[
				            'img' => $item['img'],
				            'image_path' => '/img/'.date('Y-m-d'),
				            'www_root' => dirname(__FILE__)
				        ]);
				    return $item;});
			}else{$data=\QL\QueryList::Query($url,$rules)->data;}
			foreach($data as $k=>$v){
				if(strpos($v['url'],$rs['site']) == false){$data[$k]['url']=$rs['site'].$v['url'];}
				$rk=array('cid'=>$rs['id'],'title'=>$v['title'],'url'=>$v['url']);
				if(isset($v['time'])){$rk['time']=$v['time'];}
				if(isset($v['click'])){$rk['click']=$v['click'];}
				if(isset($v['img'])){$rk['img']=$v['img'];}
				if(db('collect_list')->insert($rk)){$zt=1;}else{$zt=0;}
				$this->assign('zt',$zt);
				$this->assign('id',$js);
				$this->assign('title',$v['title']);
				$js++;
			}
			$rs['s']++;
		}
		return $this->fetch();
	}

}
?>