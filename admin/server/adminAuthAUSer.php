<?php
$auth = "adminAuthUpdate";
include_once ("./header.inc.php");
!empty($_POST['aa_id'])?$aa['aa_id'] = $_POST['aa_id']:null;
!empty($_POST['aa_nick'])?$aa['aa_nick'] = $_POST['aa_nick']:null;
!empty($_POST['aa_remark'])?$aa['aa_remark'] = $_POST['aa_remark']:null;
!empty($_POST['al_id'])?$aa['auth'] =$_POST['al_id']:$aa['auth'] =array();
$admin = new Admin();
if(!empty($aa['aa_id'])){
   if($admin->updateAdminAuth($aa,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 更新了权限组 {$aa['aa_nick']}")){
       exit(json_encode(array("status" => true, "megs" => "更新成功")));
   }
    exit(json_encode(array("status" => FALSE, "megs" => "更新失败")));
}else{
    if($admin->addAdminAuth($aa,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 更新了权限组 {$aa['aa_nick']}")){
        exit(json_encode(array("status" => true, "megs" => "更新成功")));
    }
    exit(json_encode(array("status" => FALSE, "megs" => "更新失败")));
}
