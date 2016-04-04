<?php

include_once ("./header.inc.php");
$a_id = $_POST['a_id'];
$oldPwd = md5($_POST['oldPwd']);
$newPwd = md5($_POST['newPwd']);
$admin = new Admin();
$imgb = true;
$pwdb = true;
if(!empty($_POST['a_img'])){
    $imgb = $admin->updateAdminImg($a_id,$_POST['a_img']);
}
if(!empty($_POST['oldPwd']) && !empty($_POST['newPwd'])){
    $pwdb=  $admin->updateAdminPwd($a_id,$oldPwd,$newPwd);
}
$arr = array("status" => FALSE, "megs" => "更新失败！！");
if($imgb && $pwdb){
    $arr = array("status" => true, "megs" => "更新成功");
}
echo json_encode($arr);