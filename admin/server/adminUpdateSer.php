<?php
if (!isset($_SESSION)) {session_start();};
if (empty($_SESSION['adminInfo'])) {header("location: ./");exit('登录超时');}
header("Content-type:text/html;charset=utf-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'adminUpdate')){
    exit(json_encode(array("status" => FALSE, "megs" => "权限不够！！")));
}

$a['a_id'] = $_POST['a_id'];
$a['aa_id'] = $_POST['aa_id'];
$a['a_nick'] = $_POST['a_nick'];
//echo $aa_id;
$admin = new Admin();
$b = $admin->updateAdmins($a,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 修改了编号 {$_POST['a_id']}的信息");

$arr = array("status" => FALSE, "megs" => "更新失败！！");
if($b){
    $arr = array("status" => true, "megs" => "更新成功");
}
echo json_encode($arr);