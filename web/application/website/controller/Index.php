<?php
namespace app\website\controller;
use think\Config;

class Index extends Common{
	
	public function index(){
		return $this->fetch();
	}

	public function main(){
		return $this->fetch();
	}

	public function getmenu(){
		vendor ('Nx.Datastyle');
		$id=input('id');
		if($id==1){
			if(session('user.csr')){
				$rs=db('nav')->field(['id','pid','name'=>'title','ico'=>'icon','url'=>'href','orders'])->order('orders ASC,id ASC')->select();
				$data=\Datastyle::node_merge($rs);
			}else{
				$rs=db('nav')->field(['id','pid','name'=>'title','ico'=>'icon','url'=>'href','orders'])->where('display',1)
				->order('orders ASC,id ASC')->select();
				$uid=session('user.id');
				foreach ($rs as $k => $v) {
					if($v['href'] && !in_array($v['href'],session('rule_'.$uid))){
						unset($rs[$k]);
					}
				}
				$data=\Datastyle::node_merge($rs);
				foreach ($data as $key => $va) {
					if(!$va['children'] && !$va['href']){
						unset($data[$key]);
					}
				}
			}
			
			return array_values($data);
		}
		if(input('id')==2){
			$rs=db('cate')->field(['id','pid','name'=>'title','model','orders'])->where('isf',1)
			->where('model','<>','link')->order('orders ASC,id ASC')->select();
			$gz=db('auth_group_access')->alias('a')->join('auth_group g','a.group_id=g.id')->where('uid',session('user.id'))->field('idr,cid')->find();
			if($gz && !session('user.csr')){
				$cid=explode(',',$gz['cid']);
				foreach ($rs as $k => $v) {
					if(!in_array($v['id'],$cid)){
						unset($rs[$k]);
					}
				}
			}
			$data=\Datastyle::node_merge($rs);
			return array_values($data);
		}
	}

	public function upload(){
    	$file = request()->file('file');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $path=ROOT_PATH . 'public' . DS . 'uploads';
	    $info = $file->validate(['size'=>2*1024*1024,'ext'=>'jpg,jpeg,png,gif'])->rule('uniqid')->move($path);
	    if($info){
	        // 成功上传后 获取上传信息
	        $src=$info->getSaveName();
	        $src=config('view_replace_str.__PUBLIC__').'/uploads/'.str_replace('\\','/',$src);
	        $rs=array('code'=>200,'src'=>$src);
	        return $rs;
	    }else{
	        // 上传失败获取错误信息
	        $msg=$file->getError();
	        $rs=array('code'=>0,'msg'=>$msg);
	        return $rs;
	    }
    }

    public function uploads(){
    	$file = request()->file('file');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $path=ROOT_PATH . 'public' . DS . 'uploads';
	    $info = $file->validate(['size'=>2*1024*1024,'ext'=>'jpg,jpeg,png,gif'])->rule('uniqid')->move($path);
	    if($info){
	        // 成功上传后 获取上传信息
	        $src=$info->getSaveName();
	        $src=config('view_replace_str.__PUBLIC__').'/uploads/'.str_replace('\\','/',$src);
	        $pid=db('img')->insertGetId(['imgurl'=>$src]);
	        $rs=array('code'=>200,'src'=>$src,'pid'=>$pid);
	        return $rs;
	    }else{
	        // 上传失败获取错误信息
	        $msg=$file->getError();
	        $rs=array('code'=>0,'msg'=>$msg);
	        return $rs;
	    }
    }

    public function remove(){
    	if(db('img')->delete(input('id'))){
    		return 1;
    	}else{
    		return 0;
    	}
    }

    public function clear(){
    	$dir=ROOT_PATH.'runtime';
    	return delete_dir_file($dir);
    }
	
}

?>