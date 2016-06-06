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
if(!empty($_GET['g_id']) && ($g = $goods ->queryGoodsPrice($_GET['g_id'])) != null ){
    
    $sma->assign('gp',$g['data']);
    $sma->assign('g_id',$_GET['g_id']);
    $sma->assign('g_img',$g['g_img']);
    $sma->assign('g_price',$g['g_price']);
    $sma->assign('g_text',addslashes($g['g_text']));
    $sma->assign('price_info',$g['price_info']);
   // print_r($g);
    $sma->ds('goodsAU2.htm');
}
