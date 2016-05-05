<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-30
 * Time: 下午2:34
 */
$auth = 'goodsAdd';
include_once("header.inc.php");
$sma = new Smartys;
$goods = new Goods();
if(!empty($_GET['g_id'])){

    $goods->query(new Where('g_id',$_GET['g_id']),'g_id,g_text');
    // print_r($g);
    $sma->assign('g',$goods->toArray()[0]);
    $sma->ds('goodsTextAU.htm');
}
