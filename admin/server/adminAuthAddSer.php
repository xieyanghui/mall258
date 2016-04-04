<?php
$auth = "adminAuthAdd";
include_once ("./header.inc.php");
$aa_nick = $_POST['aa_nick'];
$aa_remark = $_POST['aa_remark'];
$al_ids = $_POST['al_id'];

$admin = new Admin();
$b = $admin->addAdminAuth($aa_nick,$aa_remark,$al_ids,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 增加了权限组 {$aa_nick}");
$arr = array("status" => FALSE, "megs" => "添加失败！！");
if($b){
    $arr = array("status" => true, "megs" => "添加成功");
}
echo json_encode($arr);