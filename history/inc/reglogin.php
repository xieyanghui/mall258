<?php
if (!isset($_SESSION)) {
    session_start();
};
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$sma = new Smartys;
$sma->assign('name', $_GET['name']);
$sma->display('reglogin.htm');
?>