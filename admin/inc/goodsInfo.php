<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
include_once("header.inc.php");
$goods = new Goods();
$columnName = array('g_number'=>'商品编号','g_name'=>'商品名','gt_name'=>'所属类型','g_status'=>'状态','g_reg'=>'添加时间');
$sp = new SearchPage($columnName,$_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($goods,'searchGoods'),$sp->getParam());
}else{
    $data = call_user_func_array(array($goods,'getGoods'),$sp->getParam());//  获取列表
}

$sma = new Smartys;
$sma->assign('myOptions',$columnName);
$sma->assign('mySelect',$sp->getSearchLine());
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('row' ,$data['data']);
$sma->display('goodsInfo.htm');
