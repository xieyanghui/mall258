<?php
include_once("header.inc.php");
$sma = new Smartys();
$img = new ImgSpace();
$space = $img->getImgSpace($_SESSION['adminInfo']['a_id']);
$sma->assign('space',$space);
$sma->assign('select',!empty($_GET['select'])?true:false);
$sma->assign('img_link',!empty($_GET['img_link'])?$_GET['img_link']:"");
$sma->assign('space_img',!empty($_GET['space_img'])?$_GET['space_img']:"");
$sma->display('adminImgSpace.htm');

