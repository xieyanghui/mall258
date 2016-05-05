<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/18
 * Time: 23:02
 */
$auth = 'goodsAdd';
include_once("header.inc.php");
$sma = new Smartys;
$goods = new Goods();
if(!empty($_GET['g_id'])){
    $goods->query(new Where('g_id',$_GET['g_id']),'gt_id,g_id,g_price,g_img',array(
        'GTPrice'=>array(
            'noSub'=>'gt_id',
            'subModel'=>array(
                'GPrice'=>array(
                    'where'=>new Where('g_id',$_GET['g_id'])
                )
            )
        ),
        'GPriceInfo'=>array(
            'subModel'=>array('GPriceList'=>array(
                'tableName'=>'gpl',
                'oneLine'=>'gp_id'
            ))
        )
    ));
    $gpi = $goods->get('GPriceInfo')->toJson();
    $sma->assign('g',$goods->toArray()[0]);
    $sma->assign('gpi',$gpi);

    $sma->ds('goodsPriceAU.htm');
}else{
    
}
