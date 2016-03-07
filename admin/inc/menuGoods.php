<?php
include_once("header.inc.php");
$auth =array();
    $auth['goodsType'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsType');

    $auth['goodsInfo'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsInfo');

    $auth['goodsRecommend'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsRecommend');
$sma = new Smartys;
$sma->assign("auth",$auth);
$sma->display('menuGoods.htm');
