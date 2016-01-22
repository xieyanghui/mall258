<?php
if (!isset($_SESSION)) {
    session_start();
};
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$sma = new Smartys;
$sma->assign('name', (isset($_SESSION['user']['u_nick']) ? $_SESSION['user']['u_nick'] : ''));
$sma->display('topreglogin.htm');
?>