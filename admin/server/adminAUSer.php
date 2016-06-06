<?php
$auth = "adminAdd";
include_once ("./header.inc.php");

!empty($_POST['a_img'])?$admin["a_img"] = $_POST['a_img']:null;
!empty($_POST['a_name'])?$admin["a_name"] = $_POST['a_name']:null;
!empty($_POST['a_nick'])?$admin["a_nick"] = $_POST['a_nick']:null;
!empty($_POST['a_pwd'])?$admin["a_pwd"] = md5($_POST['a_pwd']):null;
!empty($_POST['aa_id'])?$admin["aa_id"] = $_POST['aa_id']:null;
!empty($_POST['a_id'])?$admin["a_id"] = $_POST['a_id']:null;
$a = new Admin();
if(!empty($admin['a_id'])){
    if($a->updateAdmins($admin,$a_id,"{$_SESSION['adminInfo']['a_nick']}修改了 {$admin['a_nick']} 管理员")){
        exit(json_encode(array("status" => true, "megs" => "修改成功")));
    }
    exit(json_encode(array("status" => FALSE, "megs" => "修改失败")));
}else{
    if($a->addAdmin($admin,$a_id,"{$_SESSION['adminInfo']['a_nick']}修改了 {$admin['a_nick']} 管理员")){
        exit(json_encode(array("status" => true, "megs" => "添加成功")));
    }
    exit(json_encode(array("status" => FALSE, "megs" => "添加失败")));
}
