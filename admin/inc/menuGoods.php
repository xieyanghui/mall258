<?php
if (!isset($_SESSION)) { session_start();}
if (empty($_SESSION['adminInfo'])) {exit('登录超时');}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
$auth =array();
    $auth['goodsType'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsType');
//系统日志
    $auth['goodsInfo'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsInfo');
//权限管理
    $auth['goodsRecommend'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsRecommend');
$sma = new Smartys;
$sma->assign("auth",$auth);
$sma->display('menuGoods.htm');
