<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/22
 * Time: 18:13
 */
include_once ('./header.inc.php');
$sma = new Smartys();
include_once ('./top.php');
$sma->assign('top',$top);
$sma->display('goods.htm');