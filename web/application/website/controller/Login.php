<?
namespace app\website\controller;
use think\Controller;
use think\db;

class Login extends Controller{
	
	/**
     * @return array 浏览器版本
     */
    private function getBrowser()
    {
        $flag = $_SERVER['HTTP_USER_AGENT'];
        $para = array();

        // 检查操作系统
        if (preg_match('/Windows[\d\. \w]*/', $flag, $match)) $para['os'] = $match[0];

        if (preg_match('/Chrome\/[\d\.\w]*/', $flag, $match)) {
            // 检查Chrome
            $para['browser'] = $match[0];
        } elseif (preg_match('/Safari\/[\d\.\w]*/', $flag, $match)) {
            // 检查Safari
            $para['browser'] = $match[0];
        } elseif (preg_match('/MSIE [\d\.\w]*/', $flag, $match)) {
            // IE
            $para['browser'] = $match[0];
        } elseif (preg_match('/Opera\/[\d\.\w]*/', $flag, $match)) {
            // opera
            $para['browser'] = $match[0];
        } elseif (preg_match('/Firefox\/[\d\.\w]*/', $flag, $match)) {
            // Firefox
            $para['browser'] = $match[0];
        } elseif (preg_match('/OmniWeb\/(v*)([^\s|;]+)/i', $flag, $match)) {
            //OmniWeb
            $para['browser'] = $match[2];
        } elseif (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $flag, $match)) {
            //Netscape
            $para['browser'] = $match[2];
        } elseif (preg_match('/Lynx\/([^\s]+)/i', $flag, $match)) {
            //Lynx
            $para['browser'] = $match[1];
        } elseif (preg_match('/360SE/i', $flag, $match)) {
            //360SE
            $para['browser'] = '360安全浏览器';
        } elseif (preg_match('/SE 2.x/i', $flag, $match)) {
            //搜狗
            $para['browser'] = '搜狗浏览器';
        } else {
            $para['browser'] = 'unkown';
        }
        return $para;
    }

	public function index(){
		return $this->fetch();
	}
	
	public function check(){
		$code=input('post.code');
		$zh=input('post.username');
		$pass=input('post.password');
    	if(!captcha_check($code)){
    		return 1;
    	}else{
    		$rs=db('admin')
	    		->where('username',$zh)
	    		->where('password',MD5($pass))
	    		->find();
	    	if($rs){
	    		session('user',$rs);
	    		$osinfo = $this->getBrowser();
	    		$request = request();
		        $logData = array(
		            'aid' => $rs['id'],
		            'ip' => $request->ip(),
		            'logintime' => time(),
		            'browser' => $osinfo['browser'],
		            'os' => $osinfo['os'],
		        );
		        db('login')->insert($logData);
		        return 0;
	    	}else{
	    		return 2;
	    	}
    	}

	}
}

?>