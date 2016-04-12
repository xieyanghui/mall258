<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
header("Content-Type:text/json;charset=utf-8");
$value = $_POST['value'];
$name = $_POST['name'];
$table= '';
$where = null;
switch ($name) {
    case 'registerForm.u_name':
        $table = 'user';
        $where = new Where('u_name',$value);
        break;
    case 'registerForm.u_email':
        $table = 'user';
        $where = new Where('u_email',$value);
        break;
    case 'adminAuthAddForm.aa_nick':
        $table = 'admin_auth';
        $where = new Where('aa_nick',$value);
        break;
    case 'adminAUForm.a_name':
        $table = 'admin';
        $where = new Where('a_name',$value);
        break;
    case 'goodsTypeAddForm.gt_name':
        $table = 'goods_type';
        $where = new Where('gt_name',$value);
        break;
    case 'goodsTypeAddForm.gt_number':
        $table = 'goods_type';
        $where = new Where('gt_number',$value);
        break;
    default:
        break;
}

$arr = array('name' => $name, 'isNull' => false);
if(empty($table)){exit(json_encode($arr));}
$mysql = new Sql();
$row = $mysql->selectLine($table,"*",$where);
if (count($row) > 1) {
    $arr['isNull'] = true;
}
echo json_encode($arr);
