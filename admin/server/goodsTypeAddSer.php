<?php
$auth = "goodsTypeAdd";
include_once ("../inc/header.inc.php");
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
