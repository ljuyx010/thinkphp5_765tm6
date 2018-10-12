<?php
namespace app\website\controller;

class Bak extends Common{

	public function index() {
		vendor ('Sqlbak.MySQLReback');
		$DataDir = "databak/";
		if(!is_dir($DataDir)){mkdir($DataDir);}
        $lists = $this->MyScandir($DataDir);
    	$request = input('Action');
        if (!empty($request)) {
            $config = array(
                'host' => config('database.hostname'),
                'port' => config('database.hostport'),
                'userName' => config('database.username'),
                'userPassword' => config('database.password'),
                'dbprefix' => config('database.prefix'),
                'charset' => 'UTF8',
                'path' => $DataDir,
                'isCompress' => 0, //是否开启gzip压缩
                'isDownload' => 0
            );
            $mr = new \Sqlbak\MySQLReback($config);
            $mr->setDBName(config('database.database'));
            if ($request == 'backup') {
                $mr->backup();
				// $this->success( '数据库备份成功！');
            } elseif ($request == 'RL') {
                $mr->recover(input('File'));
                //$this->success( '数据库还原成功！');
            } elseif ($request == 'Del') {
                if (@unlink($DataDir . input('File'))) {
                    // $this->success('删除成功！');
                    return 1;
                } else {
                	return 0;
                    //$this->error('删除失败！');
                }
            }

            if ($request == 'download') {

                function DownloadFile($fileName) {
                    ob_end_clean();
                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Length: ' . filesize($fileName));
                    header('Content-Disposition: attachment; filename=' . basename($fileName));
                    readfile($fileName);
                }
                DownloadFile($DataDir . input('File'));
                exit();
            }
        }
        $data=array();
    	foreach ($lists as $k => $v) {
    		if($k-1>0){
    			$data[$k]['id']=$k-1;
    			$data[$k]['name']=$v;
    			$data[$k]['time']=getfiletime($v, $DataDir);
    			$data[$k]['size']=getfilesize($v, $DataDir);
    		}
    		
    	}
    	$this->assign("lists", $data);
        return $this->fetch();
    }


    private function MyScandir($FilePath = './', $Order = 0) {
        $FilePath = opendir($FilePath);
        while (false !== ($filename = readdir($FilePath))) {
            $FileAndFolderAyy[] = $filename;
        }
        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }

}
?>