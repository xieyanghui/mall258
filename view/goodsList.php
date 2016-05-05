<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/26
 * Time: 16:21
 */
include_once ('./header.inc.php');
$sma = new Smartys();
include_once ('./winTable.inc.php');
include_once ('./top.php');

$g = new Goods();
$g = $g->query($where,'g_id,g_number,g_name,g_price,g_img')->toArray();
//print_r($g);
$sma->assign('g',$g);
$sma->assign('top',$top);
$sma->display('goodsList.htm');