<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    header("location: ./");
    exit;
}
header("Content-type:text/html;charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');


$gt['gt_number'] = $_POST['typeNumber'];
$gt['gt_name'] = $_POST['typeName'];
$gt['gt_remark'] = $_POST['typeRemark'];
$gt_attr = !empty($_POST['typeProp'])?explode(",", $_POST['typeProp']): null;
$gt_price = !empty($_POST['typePrice'])? explode(",", $_POST['typePrice']):null;
$arr = array("status" => FALSE, "megs" => "添加失败！！");
$goods = new Goods;
if($goods->addGoodsType($gt,$gt_attr,$gt_price)){
    $arr = array("status" => TRUE, "megs" => "添加成功");
}
echo json_encode($arr);
