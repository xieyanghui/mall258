<?php
include_once("header.inc.php");
$sma = new Smartys;
$goods = array();
array_push($goods,array('auth'=>'adminInfo','name'=>'管理员管理','url'=>"/view/adminInfo.php"));
array_push($goods,array('auth'=>'systemLog','name'=>'系统日记','url'=>"/view/systemLog.php"));
array_push($goods,array('auth'=>'adminAuth','name'=>'权限管理','url'=>"/view/adminAuth.php"));
array_push($goods,array('name'=>'我的资料','url'=>"/view/adminPwdImg.php"));
array_push($goods,array('name'=>'图片空间','url'=>"/view/adminImgSpace.php"));
$a_id = $_SESSION['adminInfo']['a_id'];
$menus = array();
foreach ($goods as $value){
    if(empty($value['auth'])|| Auth::inAdmin($a_id,$value['auth'] )){
        array_push($menus,$value);
    }
}


$sma->assign("menus",$menus);
$sma->display('leftMenu.tpl');

//<?php
///**
// * Created by PhpStorm.
// * User: PC-SHITING
// * Date: 2015/11/14
// * Time: 17:45
// */
//include_once("header.inc.php");
////管理员管理
//$auth['admin'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'admin');
////系统日志
//$auth['log'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'log');
////权限管理
//$auth['adminAuth'] = Auth::inAdmin($_SESSION['adminInfo']['a_id'],'adminAuth');
//$sma = new Smartys();
//
//$sma->assign('auth', $auth);
//$sma->display('menuSystem.htm');

