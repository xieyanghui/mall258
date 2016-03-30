<?php
include_once("header.inc.php");
$sma = new Smartys;
$auth =array();
$goods['goodsType'] = array('name'=>'goodsType','label'=>'商品类型管理','url'=>$sma->tpl_vars['HTTP_MODEL']."/view/goodsType.php");
$goods['goodsInfo'] = array('name'=>'goodsInfo','label'=>'商品管理','url'=>$sma->tpl_vars['HTTP_MODEL']."/view/goodsInfo.php");
$goods['goodsRecommend'] = array('name'=>'goodsRecommend','label'=>'商品类型管理','url'=>$sma->tpl_vars['HTTP_MODEL']."/view/goodsRecommend.php");
    $a_id = $_SESSION['adminInfo']['a_id'];
    $menus = array();
    foreach ($goods as $value){
        if(empty($value['name'])|| Auth::inAdmin($a_id,$value['name'] )){
            array_push($menus,$value);
        }
    }


$sma->assign("menus",$menus);
$sma->display('leftMenu.tpl');
