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
    'title'=>'首页商品滚动列表',
    'id'=>'ir_id',
    'noSearch'=>true,
    'column'=>array(
        array('name'=>'商品名称','key'=>'g_name','width'=>"150"),
        array('name'=>'描述','key'=>'ir_name','width'=>"200"),
        array('name'=>'开始时间','key'=>'ir_start_time','width'=>"150"),
        array('name'=>'结束时间','key'=>'ir_end_time','width'=>"150")
    )
);
$sp = new SearchPage($_GET);
$add = array('label'=>'增加滚动列表','url'=>'/view/goodsIndexAU.php');
$delete="/server/goodsIndexDeleteSer.php";
$update="/view/goodsIndexAU.php";
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($goods,'getIndexRoll'),$sp->getParam());
}else{
    $data = call_user_func_array(array($goods,'getIndexRoll'),$sp->getParam());//  获取列表
}
$sma = new Smartys;
$sma->assign('table',$table);
$sma->assign('add',$add);
$sma->assign('delete',$delete);
$sma->assign('update',$update);
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('data' ,$data['data']);
$sma->ds('winTable.tpl');

