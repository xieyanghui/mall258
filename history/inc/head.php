<?php
if (!isset($_SESSION)) {
    session_start();
};
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$sma = new Smartys;
if ($_SESSION['device'] == 'pc') {
} else {
}
$webinfo = new WebInfo;
$info = $webinfo->getWebInfo('index');
$sma->assign('title', $info['title']);
$sma->assign('keywords', $info['keywords']);
$sma->assign('description', $info['description']);
$sma->display('incHead.htm');
?>
