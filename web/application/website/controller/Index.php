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
		if(input('id')==1){
			$rs=db('nav')->field(['id','pid','name'=>'title','ico'=>'icon','url'=>'href','orders'])->where('display',1)->order('orders ASC,id ASC')->select();
			$data=\Datastyle::node_merge($rs);
			//p($data);die;
			return $data;
		}
		if(input('id')==2){
			$rs=db('cate')->field(['id','pid','name'=>'title','model','orders'])->where('isf',1)->where('model','<>','link')->order('orders ASC,id ASC')->select();
			$data=\Datastyle::node_merge($rs);
			return $data;
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