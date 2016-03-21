<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/18
 * Time: 23:02
 */
$auth = 'goodsAdd';
include_once("header.inc.php");
$sma = new Smartys;
$goods = new Goods();
$gp = $goods ->queryGoodsPrice($_POST['g_id']);
print_r($gp);
$sma->assign('gp',$gp);
$sma->assign('g_id',$_POST['g_id']);
$sma->assign('g_img',$_POST['g_img']);
$sma->assign('g_price',$_POST['g_price']);
$sma->display('goodsAdd2.htm');