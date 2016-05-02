<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
include_once("header.inc.php");
include_once("winTable.inc-php.php");
$view['table']  = array(
    'title'=>'商品类型列表',
    'id'=>'gt_id',
    'search'=>false,
    'column'=>array(
        array('name'=>'编号','key'=>'gt_number','width'=>"150"),
        array('name'=>'商品类型名称','key'=>'gt_name','width'=>"200"),
        array('name'=>'备注','key'=>'gt_remark','width'=>"150")
    )
);
function setSearch(Where $where,$search){
    $where->setWheres('k','gt_number',$search,'AND','LIKE');
    $where->setWheres('k','gt_name',$search,'OR','LIKE');
    $where->setWheres('k','gt_name',$search,'OR','LIKE');
    return $where;
}
$view['add']  ='/view/goodsTypeAU.php';
$view['delete'] ="/server/goodsTypeDeleteSer.php";
$view['update'] ="/view/goodsTypeAU.php";
$gt = new GoodsType();

$gt->query($where,'gt_id,gt_number,gt_name,gt_remark');
$sma = new Smartys;
$sma->assign('view',$view);
$sma->assign('page', getPages($gt->limitLingth()));
$sma->assign('data' ,$gt->toArray());
$sma->ds('winTable.tpl');

