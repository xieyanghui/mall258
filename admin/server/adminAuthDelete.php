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
$aa_id = $_GET['name'];
//echo $aa_id;
$admin = new AdminInfo();
$b = $admin->deleteAdminAuth($aa_id);
$arr = array("status" => FALSE, "megs" => "删除失败！！");
if($b){
    $arr = array("status" => true, "megs" => "删除成功");
}
echo json_encode($arr);