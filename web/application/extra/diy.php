<?php
use think\Db;

$db=Db::name('sets');
$mail=$db->where('name','mail')->value('content');
$mail=json_decode(stripslashes($mail),true);
$wechat=$db->where('name','wechat')->value('content');
$wechat=json_decode(stripslashes($wechat),true);

return [
    'smtp' => $mail['smtp'],
    'smtp_port' => $mail['port'],
    'smtp_secure' => $mail['secure'],
    'username' => $mail['username'],
    'password' => $mail['password'],
    'formname' => $mail['formname']
];