<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/2
 * Time: 20:13
 */
$auth = 'goodsIndex';
include_once("header.inc.php");
$sma = new Smartys;
$goods = new Goods();
if(!empty($_GET['id'])){
    $sma->assign('ir',$goods->queryIndexRoll($_GET['id']));
}
$sma->assign('GOODS_IMG_DEFAULT',Config::GOODS_IMG_DEFAULT);
$sma->ds('goodsIndexAU.htm');