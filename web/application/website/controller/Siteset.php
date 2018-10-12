<?php
namespace app\website\controller;
use think\Request;

class Siteset extends Common{

	public function index(){
		$rs=db('sets')->where('name','sets')->value('content');
		$set=json_decode(stripslashes($rs),true);
		$this->assign('v',$set);
		return $this->fetch();
		
	}

	public function save(){
		$db=db('sets');
		$name=input('post.name');
		$content=Request::instance()->except('name','post');
		$content=addslashes(json_encode($content));
		if($db->where('name',$name)->find()){
			$rs=$db->where('name', $name)->update(['content' => $content]);
		}else{
			$data=array('name'=>$name,'content'=>$content);
			$rs=$db->insert($data);
		}
		return $rs;
	}

	public function mail(){
		$rs=db('sets')->where('name','mail')->value('content');
		$set=json_decode(stripslashes($rs),true);
		$this->assign('v',$set);
		return $this->fetch();
	}

	public function mailtest(){
		$address=input('mail');
		$content=input('message');
		$subject="这是一封测试邮件";
		return send_email($address,$subject,$content);
	}

	public function wechat(){
		$rs=db('sets')->where('name','wechat')->value('content');
		$set=json_decode(stripslashes($rs),true);
		$this->assign('v',$set);
		return $this->fetch();
	}
}
?>