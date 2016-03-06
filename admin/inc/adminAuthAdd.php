<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/18
 * Time: 23:02
 */
$auth = "adminAuthAdd";
include_once("header.inc.php");
$sma = new Smartys;
$admin = new Admin();
$sma->assign('authList',$admin->getAuthList());
$sma->display('adminAuthAdd.htm');