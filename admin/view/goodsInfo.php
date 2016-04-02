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
    'search'=>true,
    'id'=>'g_id',
    'column'=>array(
        array('name'=>'商品编号','key'=>'g_number','width'=>"150"),
        array('name'=>'商品名','key'=>'g_name','width'=>"200"),
        array('name'=>'所属类型','key'=>'gt_name','width'=>"150"),
        array('name'=>'状态','key'=>'g_status','noSearch'=>true,'width'=>"80"),
        array('name'=>'添加时间','key'=>'g_reg','noSearch'=>true,'width'=>"150")
    )
);
$sp = new SearchPage($_GET);
$add = array('label'=>'增加商品','url'=>'/view/goodsAU.php');
$delete="/server/goodsDeleteSer.php";
$update="/server/goodsAU.php";
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($goods,'searchGoods'),$sp->getParam());
}else{
    $data = call_user_func_array(array($goods,'getGoods'),$sp->getParam());//  获取列表
}
$sma = new Smartys;
$sma->assign('table',$table);
$sma->assign('add',$add);
$sma->assign('delete',$delete);
$sma->assign('update',$update);
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('data' ,$data['data']);
$sma->display('winTable.tpl');
