<?php
$auth = "adminAuthUpdate";
include_once ("./header.inc.php");
$aa_id = $_POST['aa_id'];
$aa_nick = $_POST['aa_nick'];
$aa_remark = $_POST['aa_remark'];
empty($_POST['al_id'])?$al_ids =array():$al_ids =$_POST['al_id'];
$admin = new Admin();
$b = $admin->updateAdminAuth($aa_id,$aa_nick,$aa_remark,$al_ids,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 更新了权限组 {$aa_nick}");
$arr = array("status" => FALSE, "megs" => "更新失败！！");
if($b){
    $arr = array("status" => true, "megs" => "更新成功");
}
echo json_encode($arr);