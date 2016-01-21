<?php
if (!isset($_SESSION)) {
    session_start();
};
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$sma = new Smartys;
if ($_SESSION['device'] == 'pc') {
    $sma->assign('device', '手机版');
} else {
    $sma->assign('device', '电脑版');
}
$sma->display('incBottom.htm');
?>
