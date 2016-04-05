<?php
$auth = "adminAuthDelete";
include_once ("./header.inc.php");
$a_id = $_GET['id'];
$admin = new Admin();
$b = $admin->deleteAdminAuth($a_id,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 删除了ID为{$a_id}的管理员");
$arr = array("status" => FALSE, "megs" => "删除失败！！");
if($b){
    $arr = array("status" => true, "megs" => "删除成功");
}
echo json_encode($arr);