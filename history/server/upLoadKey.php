<?php
if (!isset($_SESSION)) {
session_start();
};
$name = null;
if (!empty($_SESSION['admininfo'])) {
    $name = $_SESSION['admininfo']['a_name'];
}elseif(!empty($_SESSION['userinfo'])){
    $name = $_SESSION['userinfo']['u_name'];
}else{
    header("location: ./");exit;
}
header("Content-type:text/html;charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT'] .'/plugin/Qiniu.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$putPolicy['scope'] = Config::QINIU_SCOPE;
$putPolicy['deadline'] =time()+3600;
$put = json_encode($putPolicy);
$data =   base64_urlSafeEncode($put);
$hmac = hash_hmac("sha1", $data, Config::QINIU_SK, TRUE);
$signature = base64_urlSafeEncode($hmac);
$uploadToken = Config::QINIU_AK.':'.$signature .':'.$data;
echo '{"uptoken":"'.$uploadToken.'"}';

