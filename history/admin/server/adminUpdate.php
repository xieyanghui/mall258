<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    header("location: ./");
    exit;
}
header("Content-type:text/html;charset=utf-8");
$aauth = true;
foreach((array)$_SESSION['admininfo']['auth'] as $value){
    if($value == 10003){
        $aauth = false;
    }}

if($aauth){exit("权限不够");}
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$a_id = $_POST['aId'];
$aa_id = $_POST['adminAuth'];
$a_nick = $_POST['aNick'];
//echo $aa_id;
$admin = new AdminInfo();
$b = $admin->updateAdmins($a_id,$a_nick,$aa_id);

$arr = array("status" => FALSE, "megs" => "更新失败！！");
if($b){
    $arr = array("status" => true, "megs" => "更新成功");
}
//if(empty($auths)){
//    $arr = array("status" => true, "megs" => "更新成功");
//}
echo json_encode($arr);