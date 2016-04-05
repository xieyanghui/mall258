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
if(!empty($_GET['id']) && ($gt = $goods ->queryGoodsType($_GET['id'])) != null ){
    $sma->assign('row',$gt);
}
$sma->ds('goodsTypeAU.htm');

