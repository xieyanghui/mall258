<?php
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION['adminInfo'])) {
    header("location: ./");
    exit;
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
$sma = new Smartys;
//权限辨认
$auth['report'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'report');  //报表统计
$auth['order'] =  Auth::inAdmin($_SESSION['adminInfo']['a_id'],'order');  //订单管理
$auth['goods'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goods');   // 商品管理
$auth['service'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'service');  // 在线客服
$sma->assign('auth', $auth);
$sma->assign('admin', $_SESSION['adminInfo']);
$sma->display('control.htm');

