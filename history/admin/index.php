<?php

//#07A1B1 50D1DE 80E5F0 BCEDF2 E0F8FB
if (!isset($_SESSION)) {
    session_start();
};
if (!empty($_SESSION['admininfo'])) {
    header("location: http://" . $_SERVER['HTTP_HOST'] . "/admin/control.php");
    exit();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$sma = new SmartysAdmin;
$sma->display('index.htm');
?>

