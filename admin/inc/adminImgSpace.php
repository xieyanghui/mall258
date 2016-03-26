<?php
include_once("header.inc.php");
$sma = new Smartys();
$img = new ImgSpace();
$space = $img->getImgSpace($_SESSION['adminInfo']['a_id']);
$sma->assign('space',$space);
$sma->assign('select',!empty($_GET['select'])?true:false);
$sma->display('adminImgSpace.htm');

