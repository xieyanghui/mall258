<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/18
 * Time: 23:02
 */
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION['adminInfo'])) {exit('登录超时');}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'adminAdd')){exit('权限不够!!');}
$sma = new Smartys;
$admin = new Admin();
$sma->assign('authList',$admin->getAuthList());
$sma->assign('adminHeadDefault',Config::ADMIN_HEAD_DEFAULT);
$sma->display('adminAdd.htm');