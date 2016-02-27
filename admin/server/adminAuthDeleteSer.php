<?php
if (!isset($_SESSION)) { session_start();}
if (empty($_SESSION['adminInfo'])) {header("location: ./");exit;}
header("Content-type:text/html;charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
//权限检查
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'adminAuthDelete')){
    exit(json_encode(array("status" => FALSE, "megs" => "权限不够！！")));
}

$a_id = $_GET['name'];
$admin = new Admin();
$b = $admin->deleteAdminAuth($a_id,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 删除了ID为{$a_id}的管理员");
$arr = array("status" => FALSE, "megs" => "删除失败！！");
if($b){
    $arr = array("status" => true, "megs" => "删除成功");
}
echo json_encode($arr);