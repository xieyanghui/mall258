<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 17:45
 */
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION['adminInfo'])) {header("location: ./");exit;}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
//管理员管理
$auth['admin'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'admin');
//系统日志
$auth['log'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'log');
//权限管理
$auth['adminAuth'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'adminAuth');
$sma = new Smartys();

$sma->assign('auth', $auth);
$sma->display('menuSystem.htm');

