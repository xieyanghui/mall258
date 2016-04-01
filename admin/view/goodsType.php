<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
include_once("header.inc.php");
$goods = new Goods();
$columnName = array('gt_number'=>'编号','gt_name'=>'商品类型名称','gt_remark'=>'备注');
$sp = new SearchPage($columnName,$_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($goods,'searchGoodsType'),$sp->getParam());
}else{
    $data = call_user_func_array(array($goods,'getGoodsType'),$sp->getParam());//  获取全部管理员列表
}

$sma = new Smartys;
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('row' ,$data['data']);
$sma->display('goodsType.htm');