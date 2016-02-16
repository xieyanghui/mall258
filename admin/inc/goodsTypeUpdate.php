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
$sma = new Smartys;
$goods = new Goods;
$row = $goods->queryGoodsType($_GET['name']);

$sma->assign('row', $row);
$sma->assign('attr', $row['gt_attr']);
$sma->assign('attrPrice', $row['gt_attrPrice']);
$sma->assign('attrPriceCount', count($row['gt_attrPrice']));

$sma->display('goodsTypeUpdate.htm');
?>
