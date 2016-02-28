<?php
if (!isset($_SESSION)) {session_start();};
if (empty($_SESSION['adminInfo'])) {header("location: ./");exit('登录超时');}
header("Content-type:text/html;charset=utf-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsTypeAdd')){
    exit(json_encode(array("status" => FALSE, "megs" => "权限不够！！")));
}

$gt['gt_id'] = $_POST['gt_id'];
!empty($_POST['gt_name'])?$gt['gt_name'] =$_POST['gt_name']:null;
!empty($_POST['gt_remark'])?$gt['gt_remark'] =$_POST['gt_remark']:null;
!empty($_POST['attr'])?$gt['attr'] =$_POST['attr']:$gt['attr'] =null;
!empty($_POST['price'])?$gt['price'] =$_POST['price']:$gt['price'] =null;
$gt['uAttr'] = array();
$gt['uPrice'] = array();
foreach ($_POST as $key => $value) {
    if (strstr($key, "uAttr") && !empty($value)) {
        $gt['uAttr'][substr($key, 5)] = $value;
    } elseif (strstr($key, "uPrice") && !empty($value)) {
        $gt['uPrice'][substr($key, 6)] = $value;
    }
}
//print_r($gt);
$goods = new Goods;
$b = $goods->updateGoodsType($gt,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 修改了ID为{$_POST['gt_id']}的商品类型");
$arr = array("status" => false, "megs" => "修改失败");

if ($b) {
    $arr = array("status" => true, "megs" => "修改成功！！");
}
echo json_encode($arr);
