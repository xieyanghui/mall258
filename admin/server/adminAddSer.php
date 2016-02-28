<?php
if (!isset($_SESSION)) {session_start();};
if (empty($_SESSION['adminInfo'])) {header("location: ./");exit('登录超时');}
header("Content-type:text/html;charset=utf-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'adminAdd')){
    exit(json_encode(array("status" => FALSE, "megs" => "权限不够！！")));
}


$admin["a_name"] = $_POST['a_name'];
$admin["a_nick"] = $_POST['a_nick'];
$admin["a_pwd"] = md5($_POST['a_pwd']);
if(!empty($_POST['a_img'])){
    $admin["a_img"] = $_POST['a_img'];
}
$admin["aa_id"] = $_POST['aa_id'];


$a = new Admin();
$b = $a->addAdmin($admin,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']}增加了 {$admin['a_nick']} 管理员");
$arr = array("status" => FALSE, "megs" => "添加失败！！");
if($b){
    $arr = array("status" => true, "megs" => "添加成功");
}
echo json_encode($arr);