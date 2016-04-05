<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
include_once("header.inc.php");
$goods = new Goods();
$table = array(
    'title'=>'商品类型列表',
    'id'=>'gt_id',
    'column'=>array(
        array('name'=>'编号','key'=>'gt_number','width'=>"150"),
        array('name'=>'商品类型名称','key'=>'gt_name','width'=>"200"),
        array('name'=>'备注','key'=>'gt_remark','width'=>"150")
    )
);
$sp = new SearchPage($_GET);
$add = array('label'=>'增加商品类型','url'=>'/view/goodsTypeAU.php');
$delete="/server/goodsTypeDeleteSer.php";
$update="/view/goodsTypeAU.php";
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($goods,'searchGoodsType'),$sp->getParam());
}else{
    $data = call_user_func_array(array($goods,'getGoodsType'),$sp->getParam());//  获取列表
}
$sma = new Smartys;
$sma->assign('table',$table);
$sma->assign('add',$add);
$sma->assign('delete',$delete);
$sma->assign('update',$update);
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('data' ,$data['data']);
$sma->ds('winTable.tpl');
