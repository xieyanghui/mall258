<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-5-21
 * Time: 下午4:07
 */
include_once ('./header.inc.php');
if(empty($_SESSION['user'])){exit('请登录！！');}
$sma = new Smartys;
include_once ('./top.php');
$sma->assign('top',$top);
if(!empty($_SERVER['QUERY_STRING'])){
    $_SERVER['QUERY_STRING']
}

$sma->display ('user.htm');
