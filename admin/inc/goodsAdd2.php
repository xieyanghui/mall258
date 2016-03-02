<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/18
 * Time: 23:02
 */
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION['adminInfo'])) {exit('登录超时');}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsAdd')){exit('权限不够!!');}
$sma = new Smartys;
$goods = new Goods();
$gp = $goods ->queryGoodsPrice($_GET['g_id']);
$sma->assign('gp',$gp);
$sma->display('goodsAdd2.htm');