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
		$site=array('base'=>$rs['site'],'img'=>$rs['imgsite']);
		if(!input('u')){
			$rules=array(
				'title'=>array($rs['titlegz'],'text'),
				'url'=>array($rs['urlgz'],'href','',function($url) use($site){if(strpos($url,$site['base'])===false) $url=$site['base'].$url; return $url;})			
			);
			if($rs['timegz']) $rules['time']=array($rs['timegz'],'text');
			if($rs['imgz']) $rules['img']=array($rs['imgz'],'src','',function($img) use($site){$s=$site['img'] ?:$site['base'];if(strpos($img,$s)===false) $img=$s.$img; return $img;});
			if($rs['clickgz']) $rules['click']=array($rs['clickgz'],'text');
			$url=str_replace("{p}",$rs['s'],$rs['url']);
			if($rs['bm']){$html = iconv('GBK','UTF-8',file_get_contents($url));}else{$html=file_get_contents($url);}			
			$data=\QL\QueryList::Query($html,$rules)->data;
			
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
			if($rs['bm']){$html = iconv('GBK','UTF-8',file_get_contents($url));}else{$html=file_get_contents($url);}
			$data=\QL\QueryList::Query($html,$rules)->data;
			$this->assign('v',$data);
			return $this->fetch('nei');
		}
		
	}

	public function yunx(){	
		vendor("QL.QueryList");
		$rs=db('collect')->where('id',input('id'))->find();
		db('collect')->where('id',input('id'))->setField('time',time());
		$site=array('base'=>$rs['site'],'img'=>$rs['imgsite']);
		$rules=array(
			'title'=>array($rs['titlegz'],'text'),
			'url'=>array($rs['urlgz'],'href','',function($url) use($site){if(strpos($url,$site['base'])===false) $url=$site['base'].$url; return $url;})	
		);
		if($rs['timegz']) $rules['time']=array($rs['timegz'],'text','',function($time){return strtotime($time);});
		if($rs['imgz']) $rules['img']=array($rs['imgz'],'src','',function($img) use($site){$s=$site['img'] ?:$site['base'];if(strpos($img,$s)===false) $img=$s.$img; return $img;});
		if($rs['clickgz']) $rules['click']=array($rs['clickgz'],'text');
		$js=0;$jg=array();
		while ($rs['s'] <= $rs['d']) {
		 	$url=str_replace("{p}",$rs['s'],$rs['url']);
			if($rs['bm']){$html = iconv('GBK','UTF-8',file_get_contents($url));}else{$html=file_get_contents($url);}
			if($rs['imgz']){				
				$data=\QL\QueryList::Query($html,$rules)->getData(function($item){
				    //图片本地化				    
				    $item['img'] = \QL\QueryList::run('Dimage',[
				            'content' => "<img src='".$item['img']."' />",
				            'image_path' => '/img/'.date('Y-m-d'),
				            'www_root' => ROOT_PATH,
				        ]);
				    return $item;
				});				
			}else{
				$data=\QL\QueryList::Query($html,$rules)->data;
			}

			foreach($data as $k=>$v){				
				$rk=array('cid'=>$rs['id'],'title'=>$v['title'],'url'=>$v['url']);
				if(isset($v['time'])){$rk['time']=$v['time'];}
				if(isset($v['click'])){$rk['click']=$v['click'];}
				if(isset($v['img'])){$rk['img']=substr($v['img'],10,-2);}
				if(db('collect_list')->where('title',$v['title'])->where('url',$v['url'])->find()){
					$jg[]=array('zt'=>2,'id'=>$js,'title'=>$v['title']);
				}else{
					if(db('collect_list')->insert($rk)){$zt=1;}else{$zt=0;}
					$jg[]=array('zt'=>$zt,'id'=>$js,'title'=>$v['title']);	
				}
				$js++;
			}
			$rs['s']++;
		}
		$this->assign('jg',$jg);
		return $this->fetch();
	}

	public function note(){
		if(input('t')){
			$p=input('page');
			$l=input('limit');
			$c=db('collect_list')->count();
			$rs=db('collect_list')->alias('l')->join('collect c','l.cid = c.id')
			->join('cate a','c.cid = a.id')
			->field('l.*,c.cid,a.name,FROM_UNIXTIME(l.time,"%Y-%m-%d") as times')->where('stuts',0)->order('time desc')->page($p,$l)->select();
			if(!$rs){$msg="暂无数据";}else{$msg='数据正常';} 
			$data=array('code'=>0,'msg'=>$msg,'count'=>$c,'data'=>$rs);
			return $data;
		}else{
			return $this->fetch();
		}
	}

	public function putin(){
		vendor("QL.QueryList");
		$where['l.id']=input('id') ? input('id') : array('in',input('ids/a'));
		$rs=db('collect_list')->alias('l')->join('collect c','l.cid = c.id')
		->field('l.*,c.cid as cateid,c.imgsite,c.bm,c.site,c.ntgz,c.keywordgz,c.descgz,c.contgz,c.authorgz,c.fromgz,c.ntime,c.hitgz')
		->where($where)->select();
		foreach ($rs as $k => $v) {
			$site['img']=$v['imgsite']?:$v['site'];
			$rules=array(
				'title'=>array($v['ntgz'],'text'),
				'content'=>array($v['contgz'],'html','-script div'),
			);
			if($v['descgz']) $rules['description']=array($v['descgz'],'content');
			if($v['keywordgz']) $rules['keyword']=array($v['keywordgz'],'content');
			if($v['authorgz']) $rules['author']=array($v['authorgz'],'text');
			if($v['fromgz']) $rules['from']=array($v['fromgz'],'text');
			if($v['ntime']) $rules['time']=array($v['ntime'],'text');
			if($v['hitgz']) $rules['click']=array($v['hitgz'],'text');
			if($v['bm']){$html = iconv('GBK','UTF-8',file_get_contents($v['url']));}else{$html=file_get_contents($v['url']);}		
				
			$data=\QL\QueryList::Query($html,$rules)->getData(function($item) use($site){
			    //图片本地化
			    $item['content'] = \QL\QueryList::run('Dimage',[
			            'content' => $item['content'],
			            'image_path' => '/img/'.date('Y-m-d'),
			            'www_root' => ROOT_PATH,
			            'base_url' => $site['img'],
			        ]);
			    return $item;
			});

			$a=array('pic'=>$v['img'],'cid'=>$v['cateid'],'content'=>htmlspecialchars($data[0]['content']),'uid'=>session('user.id')?:0);
			if($data[0]['title']){$a['title']=$data[0]['title']?$data[0]['title']:$v['title'];}
			if(isset($data[0]['keyword'])) $a['keyword']=$data[0]['keyword'];
			if(isset($data[0]['description'])) $a['description']=$data[0]['description'];
			if(isset($data[0]['author'])) $a['author']=$data[0]['author'];
			if(isset($data[0]['from'])) $a['from']=$data[0]['from'];
			if($v['time']) {$a['time']=$v['time'];}elseif(isset($data[0]['time'])){$a['time']=strtotime($data[0]['time']);}else{$a['time']=time();};
			if(isset($data[0]['click'])) $a['click']=$data[0]['click'];	
					
			if(db('article')->insert($a)){
				db('collect_list')->where('id',$v['id'])->setField('stuts',1);
			}
		}
		return 1;
	}

	public function delcj(){
		$where['id']=array('in',input('ids/a'));
		$rs=db('collect_list')->where($where)->delete();			
		return $rs;
	}

}
?>