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
$gp = $goods ->queryGoodsPrice($_GET['g_id']);
$sma->assign('gp',$gp);
$sma->assign('g_id',$_GET['g_id']);
$sma->display('goodsAdd2.htm');