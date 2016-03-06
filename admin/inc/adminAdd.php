<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/18
 * Time: 23:02
 */

$sma = new Smartys;
$admin = new Admin();
$sma->assign('adminAuth',$admin->getAdminAuth(0,100)['data']);
$sma->assign('adminHeadDefault',Config::ADMIN_HEAD_DEFAULT);
$sma->display('adminAdd.htm');