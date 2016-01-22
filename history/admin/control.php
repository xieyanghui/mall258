<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    header("location: ./");
    exit;
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$sma = new Smartys;
$sma->assign('admin', $_SESSION['admininfo']);
//权限辨认
$auth['report'] = Auth::inAdmin($_SESSION['admininfo']['aa_id'],'report');  //报表统计
$auth['order'] =  Auth::inAdmin($_SESSION['admininfo']['aa_id'],'order');  //订单管理
$auth['goods'] = Auth::inAdmin($_SESSION['admininfo']['aa_id'],'goods');   // 商品管理
$auth['service'] = Auth::inAdmin($_SESSION['admininfo']['aa_id'],'service');  // 在线客服
$sma->assign('auth', $auth);
$sma->display('control.htm');

