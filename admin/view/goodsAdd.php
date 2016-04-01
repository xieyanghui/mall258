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
$sma->assign('GOODS_IMG_DEFAULT',Config::GOODS_IMG_DEFAULT);
$sma->assign('goodsType',$goods->getGoodsType(0,10000)['data']);
$sma->display('goodsAdd.htm');