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
    if(empty($value['auth'])|| AdminAuth::inAdmin($a_id,$value['auth'] )){
        array_push($menus,$value);
    }
}
$sma->assign("menus",$menus);
if(!empty($content)){
    $sma->assign('contents',!empty($content)?$content:null);
    $content = $sma->fetch('leftMenu.tpl');
    $parent = gui($parent);
    include_once($parent.'.php');
}else{
    $sma->display('leftMenu.tpl');
}

