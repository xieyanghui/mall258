<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    exit('登录超时');
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$sma = new SmartysAdmin;
$sma->display('shopcontrol.htm');
?>