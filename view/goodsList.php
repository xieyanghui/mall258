<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/26
 * Time: 16:21
 */
include_once ('./header.inc.php');
$sma = new Smartys();
include_once ('./top.php');
$gt = new GoodsType();
$gt->query(new Where());

$sma->assign('top',$top);
$sma->display('goodsList.htm');