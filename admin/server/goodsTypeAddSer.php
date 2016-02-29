<?php
if (!isset($_SESSION)) {session_start();};
if (empty($_SESSION['adminInfo'])) {header("location: ./");exit('登录超时');}
header("Content-type:text/html;charset=utf-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsTypeAdd')){
    exit(json_encode(array("status" => FALSE, "megs" => "权限不够！！")));
}
$gt['gt_number'] = $_POST['gt_number'];
$gt['gt_name'] = $_POST['gt_name'];
$gt['gt_remark'] = $_POST['gt_remark'];
!empty($_POST['attr'])?$gt['attr'] = $_POST['attr']:$gt['attr'] = null;
!empty($_POST['price'])?$gt['price'] = $_POST['price']:$gt['price'] = null;
$arr = array("status" => FALSE, "megs" => "添加失败！！");
$goods = new Goods;
if($goods->addGoodsType($gt,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 增加了商品类型 编号为{$_POST['gt_number']}")){
    $arr = array("status" => TRUE, "megs" => "添加成功");
}
echo json_encode($arr);
