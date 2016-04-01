<?php

//#07A1B1 50D1DE 80E5F0 BCEDF2 E0F8FB
include_once($_SERVER['DOCUMENT_ROOT'].'/public/autoload.php');
if (!isset($_SESSION)) {session_start();};

if (!empty($_SESSION['adminInfo'])) {header("location: http://" . $_SERVER['HTTP_HOST'] .Config::ADMIN_DIR."/view/control.php");exit();}
$sma = new Smartys;
$sma->display('index.htm');

