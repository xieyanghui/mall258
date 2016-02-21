<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
header("Content-Type:text/json;charset=utf-8");
$value = $_GET['value'];
$name = $_GET['name'];
$sql = null;
switch ($name) {
    case 'regform.reguserName':
        $sql = "select * from `userInfo` where `u_name` ='$value'";
        break;
    case 'regform.email':
        $sql = "select * from userInfo where email ='$value'";
        break;
    case 'addAdminAuthForm.aaNick':
        $sql = "select * from AdminAuth where aa_nick ='$value'";
        break;
    case 'adminAddForm.a_name':
        $sql = "select * from admin where a_name ='$value'";
        break;
    default:
        break;
}
$mysql = new Sql();
$row = $mysql->queryLine($sql);
$arr = array('name' => $name, 'isNull' => false);
if (count($row) > 1) {
    $arr['isNull'] = true;
}
echo json_encode($arr);
