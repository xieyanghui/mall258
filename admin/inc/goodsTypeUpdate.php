<?php
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION['adminInfo'])) {exit('登录超时');}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsTypeUpdate')){exit('权限不够!!');}

$goods = new Goods;
$row = $goods->queryGoodsType($_GET['name']);
$sma = new Smartys;
$sma->assign('row', $row);
$sma->assign('attr', $row['attr']);
$sma->assign('price', $row['price']);

$sma->display('goodsTypeUpdate.htm');
?>
