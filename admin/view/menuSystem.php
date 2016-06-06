<?php
include_once("header.inc.php");
$sma = new Smartys;
$goods = array();
array_push($goods,array('name'=>'管理员管理','url'=>"/view/adminInfo.php",'auth'=>'adminInfo'));
array_push($goods,array('name'=>'系统日记','url'=>"/view/systemLog.php",'auth'=>'systemLog'));
array_push($goods,array('name'=>'权限管理','url'=>"/view/adminAuth.php",'auth'=>'adminAuth'));
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
$sma->ds('leftMenu.tpl');
