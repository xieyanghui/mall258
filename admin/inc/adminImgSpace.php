<?php
include_once("header.inc.php");
$sma = new Smartys();
$img = new ImgSpace();
$space = $img->getImgSpace($_SESSION['adminInfo']['a_id']);
$sma->assign('space',$space);
$sma->display('adminImgSpace.htm');

