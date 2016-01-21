<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    header("location: ./");
    exit;
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$sma = new SmartysAdmin;
$sma->assign('admin', $_SESSION['admininfo']);
$auth['system'] = false;
$auth['baobian'] = false;

foreach ($_SESSION['admininfo']['auth'] as $value) {
    if ($value == 1) {
        $auth['system'] = true;
    } elseif ($value == 2) {
        $auth['baobian'] = true;
    }
}
$sma->assign('auth', $auth);
$sma->display('control.htm');

?>
