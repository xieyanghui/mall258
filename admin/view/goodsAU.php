<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/2
 * Time: 20:13
 */
$auth = 'goodsAdd';
include_once("header.inc.php");
$sma = new Smartys;
$goods = new Goods();
$sma->assign('GOODS_IMG_DEFAULT',Config::GOODS_IMG_DEFAULT);
$sma->assign('goodsType',$goods->getGoodsType(0,10000)['data']);
$sma->display('goodsAdd.htm');