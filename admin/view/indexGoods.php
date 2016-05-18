<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-5-1
 * Time: 上午4:09
 */
include_once("header.inc.php");
include_once("winTable.inc-php.php");
$ig= new IndexGoods();

$view['table'] = array(
    'title'=>$_GET['im_name'],
    'id'=>'ig_id',
    'noSearch'=>true,
    'column'=>array(
        array('name'=>'商品备注','key'=>'ig_name','width'=>"150"),
        array('name'=>'商品名称','key'=>'g_name','width'=>"250" ,'value'=>'g_id'),
        array('name'=>'标签','key'=>'ig_label','width'=>"150"),
        array('name'=>'展示图片','key'=>'ig_img','width'=>"80")
    )
);
$view['delete'] = '/server/indexGoodsDeleteSer.php';
$where->setWhere('im_id',$_GET['im_id']);
$ig->query($where,'*',array(
    'Goods'=>array(
        'columnName'=>'g_name',
        'noSub'=>'g_id',
        'sibling'=>true,
    )
));
$sma = new Smartys;
$sma->assign('page', getPages($ig->limitLingth()));
$sma->assign('data' ,$ig->toArray());
$sma->assign('view',$view);
$sma->display('winTable.tpl');