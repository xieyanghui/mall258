<?php
include_once("header.inc.php");
$sma = new Smartys;
$goods = array();
array_push($goods,array('name'=>'adminInfo','label'=>'管理员管理','url'=>$sma->tpl_vars['HTTP_MODEL']."/view/adminInfo.php"));
array_push($goods,array('name'=>'systemLog','label'=>'系统日记','url'=>$sma->tpl_vars['HTTP_MODEL']."/view/systemLog.php"));
array_push($goods,array('name'=>'adminAuth','label'=>'权限管理','url'=>$sma->tpl_vars['HTTP_MODEL']."/view/adminAuth.php"));
array_push($goods,array('label'=>'我的资料','url'=>$sma->tpl_vars['HTTP_MODEL']."/view/adminPwdImg.php"));
array_push($goods,array('label'=>'图片空间','url'=>$sma->tpl_vars['HTTP_MODEL']."/view/adminImgSpace.php"));
$a_id = $_SESSION['adminInfo']['a_id'];
$menus = array();
foreach ($goods as $value){
    if(empty($value['name'])|| Auth::inAdmin($a_id,$value['name'] )){
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

