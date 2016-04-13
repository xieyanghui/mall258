<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/5
 * Time: 23:25
 */
include_once ('./header.inc.php');
$sma = new Smartys();
include_once ('./top.php');
$sma->assign('top',$top);
$sma->display('index.htm');