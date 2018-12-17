<?php
namespace app\website\controller;
use think\Config;

class Admin extends Common{

	public function modfiy(){
		return $this->fetch();
	}

	public function runedit(){
		$data=array();
		if(input('logo')) $data['pic']=input('logo');
		$data['password']= MD5(MD5(input('pwd')));
		$rs=db('admin')->where('id',session('user.id'))->update($data);
		return $rs;
	}
}