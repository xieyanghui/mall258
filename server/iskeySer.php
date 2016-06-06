<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
header("Content-Type:text/json;charset=utf-8");
$value = $_POST['value'];
$name = $_POST['name'];
$table= '';
$where = null;
switch ($name) {
    case 'registerForm.u_name':
        $model = 'User';
        $where = new Where('u_name',$value);
        break;
    case 'registerForm.u_email':
        $model = 'User';
        $where = new Where('u_email',$value);
        break;
    case 'registerForm.u_phone':
        $model = 'User';
        $where = new Where('u_phone',$value);
        break;
    case 'adminAuthAddForm.aa_nick':
        $model = 'AdminAuth';
        $where = new Where('aa_nick',$value);
        break;
    case 'adminAUForm.a_name':
        $model = 'Admin';
        $where = new Where('a_name',$value);
        break;
    case 'goodsTypeAddForm.gt_name':
        $model = 'GoodsType';
        $where = new Where('gt_name',$value);
        break;
    case 'goodsTypeAddForm.gt_number':
        $model = 'GoodsType';
        $where = new Where('gt_number',$value);
        break;
    default:
        break;
}
$arr = array('name' => $name, 'isNull' => false);
if(empty($model)){exit(json_encode($arr));}

$m = new $model;
$m->query($where);
if ($m->length() > 0) {
    $arr['isNull'] = true;
}
echo json_encode($arr);
