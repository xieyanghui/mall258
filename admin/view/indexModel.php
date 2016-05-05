<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
include_once("header.inc.php");
include_once("winTable.inc-php.php");
$im = new IndexModel();
$view['table'] = array(
    'title'=>'首页模块管理',
    'id'=>'im_id',
    'noSearch'=>true,
    'column'=>array(
        array('name'=>'模块名称','key'=>'im_name','width'=>"150"),
        array('name'=>'模块主题','key'=>'im_class','width'=>"150"),
        array('name'=>'排序','key'=>'im_sort','width'=>"150")
    )
);
$view['delete'] = '/server/indexModelDeleteSer.php';
$im->query($where);
$sma = new Smartys;
$sma->assign('page', getPages($im->limitLingth()));
$sma->assign('data' ,$im->toArray());
$sma->assign('view',$view);
$ss = $sma->fetch('winTable.tpl');
//$sma = new Smartys;
$sma->assign('ss',$ss);
$sma->ds('indexModel.htm');


