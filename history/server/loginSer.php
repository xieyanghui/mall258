<?php
if (!isset($_SESSION)) {
    session_start();
};
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
header("Content-Type:text/json;charset=utf-8");
$u_name = mysql_escape_string($_POST['loginuserName']);
$u_pwd = md5($_POST['loginpwd']);
//echo $u_name ."  ".$u_pwd;

$sql = new Sql;
$row = $sql->queryLine("select `u_id` ,`u_nick` ,`u_img` from `userInfo` where `u_name` = '$u_name' and `u_pwd` ='$u_pwd'");
$json = array("status" => false, "meg" => "用户名密码错误");
if (count($row) > 1) {
    $_SESSION['user'] = $row;
    $json = array("status" => true, "meg" => "登录成功");
}
echo json_encode($json);
?>