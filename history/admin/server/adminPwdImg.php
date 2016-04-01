<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    header("location: ./");
    exit;
}
header("Content-type:text/html;charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$a_id = $_POST['aId'];

$oldPwd = md5($_POST['oldPwd']);
$newPwd = md5($_POST['newPwd']);
//echo $aa_id;
$admin = new AdminInfo();
$imgb = true;
$pwdb = true;
if(!empty($_POST['img'])){
    $imgb = $admin->updateAdminImg($a_id,$_POST['img']);
}
if(!empty($_POST['oldPwd']) && !empty($_POST['newPwd'])){
    $pwdb=  $admin->updateAdminPwd($a_id,$oldPwd,$newPwd);
}
$arr = array("status" => FALSE, "megs" => "更新失败！！");
if($imgb && $pwdb){
    $arr = array("status" => true, "megs" => "更新成功");
}
echo json_encode($arr);