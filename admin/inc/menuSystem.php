<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 17:45
 */
include_once("header.inc.php");
//管理员管理
$auth['admin'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'admin');
//系统日志
$auth['log'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'log');
//权限管理
$auth['adminAuth'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'adminAuth');
$sma = new Smartys();

$sma->assign('auth', $auth);
$sma->display('menuSystem.htm');

