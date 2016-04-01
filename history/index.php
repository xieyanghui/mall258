<?php
	if(!isset($_SESSION)){session_start();};
	include_once($_SERVER['DOCUMENT_ROOT'].'/tool/autoload.php');
//define("ZHIJIE",true);
	include_once($_SERVER['DOCUMENT_ROOT'].'/inc/head.php');
	include_once($_SERVER['DOCUMENT_ROOT'].'/inc/top.php');
	$sma = new Smartys;
	$sma->display('index.htm');
	include_once($_SERVER['DOCUMENT_ROOT'].'/inc/bottom.php');

	
//	$title = "星星火上传";
//	$keywords = "haoba";
//	$description = "aaaaaaa";
//	include_once($_SERVER['DOCUMENT_ROOT'].'/inc/head.php');
//	include_once($_SERVER['DOCUMENT_ROOT'].'/inc/top.php');
//	include_once($_SERVER['DOCUMENT_ROOT'].'/inc/bottom.php');
//	
?>
