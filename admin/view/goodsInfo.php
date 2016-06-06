<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
include_once("header.inc.php");
include_once("winTable.inc-php.php");


$view['table'] = array(
    'title'=>'商品列表',
    'search'=>true,
    'id'=>'g_id',
    'float_args'=>'g_name',
    'column'=>array(
        array('name'=>'商品编号','key'=>'g_number','width'=>"150"),
        array('name'=>'商品名','key'=>'g_name','width'=>"200"),
        array('name'=>'所属类型','key'=>'gt_name','width'=>"150",'value'=>'gt_id'),
        array('name'=>'状态','key'=>'g_status','noSearch'=>true,'width'=>"80"),
        array('name'=>'添加时间','key'=>'g_reg','noSearch'=>true,'width'=>"150")
    )
);
$view['add'] = '/view/goodsAU.php';
$view['delete']="/server/goodsDeleteSer.php";
$view['update']="/view/goodsAU.php";



$g = new Goods();

$g->query($where,array('g_id','g_number','g_name','g_status','g_reg','gt_id'),array(
    'GoodsType'=>array(
        'tableName'=>'gt',
        'noSub'=>'gt_id',
        'columnName'=>array('gt_id','gt_name')
    )));
$goods = $g->toArray();

foreach ($goods as &$gg){
    $gg['gt_name'] = $gg['gt'][0]['gt_name'];
    $gg['gt_id'] = $gg['gt'][0]['gt_id'];
}
$sma = new Smartys;
$sma->assign('view',$view);
$sma->assign('page', getPages($g->limitLingth()));
$sma->assign('data' ,$goods);
$sma->ds('winTable.tpl');

