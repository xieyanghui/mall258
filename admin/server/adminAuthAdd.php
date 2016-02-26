<?php
if (!isset($_SESSION)) {session_start();};
if (empty($_SESSION['adminInfo'])) {header("location: ./");exit('登录超时');}
header("Content-type:text/html;charset=utf-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'adminAuthAdd')){
    exit(json_encode(array("status" => FALSE, "megs" => "权限不够！！")));
}

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