<?php

//#07A1B1 50D1DE 80E5F0 BCEDF2 E0F8FB

include_once('./autoload.php');
if (!isset($_SESSION)) {session_start();};

if(!empty($_SERVER['PATH_INFO']) && is_file('./view'.$_SERVER['PATH_INFO'].'.php')){
    $str = !empty($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:"";
    header("location: http://" . $_SERVER['HTTP_HOST'] .Config::ADMIN_DIR.'/view'.$_SERVER['PATH_INFO'].'.php'.$str);exit();
}
if (!empty($_SESSION['adminInfo'])) {header("location: http://" . $_SERVER['HTTP_HOST'] .Config::ADMIN_DIR."/control.php");exit();}
$sma = new Smartys;
$sma->display('index.htm');

