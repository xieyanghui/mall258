<?php
if (!isset($_SESSION)) { session_start();};
if (empty($_SESSION['adminInfo'])) { header("location: ./");exit('登录超时');}
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


include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
$aa_id = $_POST['aaId'];
$aa_nick = $_POST['aaNick'];
$aa_remark = $_POST['aaRemark'];
$auths = $_POST['auths'];
//echo $aa_id;
$admin = new AdminInfo();
$b = $admin->updateAdminAuth($aa_id,$aa_nick,$aa_remark,$auths);

$arr = array("status" => FALSE, "megs" => "更新失败！！");
if($b){
    $arr = array("status" => true, "megs" => "更新成功");
}
//if(empty($auths)){
//    $arr = array("status" => true, "megs" => "更新成功");
//}
echo json_encode($arr);