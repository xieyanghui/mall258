<?php
if (!isset($_SESSION)) {session_start();};
header("Content-type:text/html;charset=utf-8");
if (empty($_SESSION['adminInfo']) && empty($_SESSION['userInfo'])) { exit("未登录");}
include_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
$putPolicy['scope'] = Config::QINIU_SCOPE;
$putPolicy['deadline'] =time()+3600;
$put = json_encode($putPolicy);
$data =   Qiniu::base64_urlSafeEncode($put);
$hmac = hash_hmac("sha1", $data, Config::QINIU_SK, TRUE);
$signature = Qiniu::base64_urlSafeEncode($hmac);
$uploadToken = Config::QINIU_AK.':'.$signature .':'.$data;
echo '{"uptoken":"'.$uploadToken.'"}';

