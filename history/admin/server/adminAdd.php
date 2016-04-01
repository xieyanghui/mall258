<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    header("location: ./");
    exit;
}
header("Content-type:text/html;charset=utf-8");

//权限检查
$aauth = true;
foreach((array)$_SESSION['admininfo']['auth'] as $value){
    if($value == 10003){
        $aauth = false;
    }
}
if($aauth){
    $arr = array("status" => FALSE, "megs" => "权限不够");
    exit(json_encode($arr));
}


include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$admins["a_name"] = $_POST['aName'];
$admins["a_nick"] = $_POST['aNick'];
$admins["a_pwd"] = md5($_POST['pwd']);
if(!empty($_POST['img'])){
    $admins["a_img"] = $_POST['img'];
}
$admins["aa_id"] = $_POST['asminAuth'];


$admin = new AdminInfo();
$b = $admin->addAdmin($admins);
$arr = array("status" => FALSE, "megs" => "添加失败！！");
if($b){
    $arr = array("status" => true, "megs" => "添加成功");
}
echo json_encode($arr);