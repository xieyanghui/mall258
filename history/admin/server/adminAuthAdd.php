<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    header("location: ./");
    exit;
}
header("Content-type:text/html;charset=utf-8");
//权限检查
$aauth = true;
foreach((array)$_SESSION['admininfo']['auth'] as $value){
    if($value == 10003){
        $aauth = false;
    }
}
if($aauth){
    $arr = array("status" => FALSE, "megs" => "权限不够");
    exit(json_encode($arr));
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$aa_nick = $_POST['aaNick'];
$aa_remark = $_POST['aaRemark'];
$auths = $_POST['auths'];



$admin = new AdminInfo();
$b = $admin->addAdminAuth($aa_nick,$aa_remark,$auths);
$arr = array("status" => FALSE, "megs" => "添加失败！！");
if($b){
    $arr = array("status" => true, "megs" => "添加成功");
}
echo json_encode($arr);