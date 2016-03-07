<?php
$auth = 'goodsTypeUpdate';
include_once("header.inc.php");
$goods = new Goods;
$row = $goods->queryGoodsType($_GET['name']);
$sma = new Smartys;
$sma->assign('row', $row);
$sma->assign('attr', $row['attr']);
$sma->assign('price', $row['price']);

$sma->display('goodsTypeUpdate.htm');
?>
