<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

class Gbook extends Controller{

    public function index(){
    	$id=input('id','','intval');
    	$rs=db('cate')->alias('c')->join('gtype g','c.gid = g.id')->field('c.id,c.name,c.keyword,c.description,c.gid,c.model,g.field,g.notnull')->where('c.id',$id)->find();
    	if($rs['model']=='gbook'){
    		$field=json_decode(stripslashes($rs['field']),true);
			$no=explode("|", $rs['notnull']);
			$this->assign('title',$rs['name']);
			$this->assign('keyword',$rs['keyword']);
			$this->assign('description',$rs['description']);
			$this->assign('cid',$rs['id']);
			$this->assign('field',$field);
			$this->assign('no',$no);
    	}else{
    		$this->error('系统未找到此页面');
    	}
        return $this->fetch();
    }
	
	public function submit(){
		$rs=db('cate')->alias('c')->join('gtype g','c.gid = g.id')->field('c.id,g.field,g.notnull')->where('c.id',input('cid'))->find();
		$field=json_decode(stripslashes($rs['field']),true);
		$no=explode("|", $rs['notnull']);
		foreach ($no as $k => $v) {
			if(!input($v)){
				$i=array_search($v,$field);
				$name=$field[$i]['title'];
				return array('code'=>0,'msg'=>$name."不能为空");
				$this->error($name.'不能为空');
			}
		}
		$data['cid']=input('cid','','intval');
		$content=Request::instance()->except(['cid','code'],'post');
		$data['content']=addslashes(json_encode($content));
		$data['ip']=request()->ip();
		$data['time']=time();
		$rst=db('gbook')->insert($data);
		if($rst){
			return array('code'=>1,'msg'=>'提交成功，我们会尽快与您联系');
		}else{
			return array('code'=>0,'msg'=>'提交失败，请重试！');
		}		
	}
}
