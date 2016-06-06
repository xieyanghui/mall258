<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/2
 * Time: 20:13
 */
$auth = 'goodsAdd';
include_once("header.inc.php");
$sma = new Smartys;
$goods = new Goods();
if(!empty($_GET['id'])){
    $g = $goods->query(new Where('g_id',$_GET['id']),
        array('g_id','g_number','g_name','gt_id','g_price','g_keywords','g_description','g_img'),
        array('GoodsType'=>array(
            'columnName'=>'gt_id,gt_name',
            'sibling'=>true,
            'noSub'=>'gt_id'))
    )->toArray()[0];
    $gtp = new GTPrice();
    $gta = new GTAttrType();
    $gtp->query(new Where('gt_id',$g['gt_id']),'*',
        array('GPrice'=>array(
            'where'=>new Where('g_id',$g['g_id']),
            'tableName'=>'val'
            )));
    $g['price'] = $gtp->toArray();

    $gta->query(new Where('gt_id',$g['gt_id']),'*',
        array('GTAttr'=>array(
            'columnName'=>'gta_id,gta_name,gtat_id',
            'subModel'=>array(
                'GAttr'=>array(
                    'sibling'=>true,'where'=>new Where('g_id',$g['g_id'])))
    )));
    $g['attr'] =$gta->toArray();
    $sma->assign('goods',$g);
}
$sma->assign('GOODS_IMG_DEFAULT',Config::GOODS_IMG_DEFAULT);
$gt= new GoodsType();
$sma->assign('goodsType',$gt->query(new Where('gt_status',1),'gt_id,gt_name')->toArray());
$sma->ds('goodsAU.htm');