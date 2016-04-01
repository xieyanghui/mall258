<?php
include_once("header.inc.php");
$sma = new Smartys;

$goods[] = array('auth'=>'goodsType','name'=>'商品类型管理','url'=>"/view/goodsType.php");
$goods[] = array('auth'=>'goodsInfo','name'=>'商品管理','url'=>"/view/goodsInfo.php");
$goods[] = array('auth'=>'goodsRecommend','name'=>'商品类型管理','url'=>"/view/goodsRecommend.php");
    $a_id = $_SESSION['adminInfo']['a_id'];
    $menus = array();
    foreach ($goods as $value){
        if(empty($value['auth'])|| Auth::inAdmin($a_id,$value['auth'] )){
            array_push($menus,$value);
        }
    }
$sma->assign("menus",$menus);
$sma->display('leftMenu.tpl');
