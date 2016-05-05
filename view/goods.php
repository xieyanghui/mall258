<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/22
 * Time: 18:13
 */
include_once ('./header.inc.php');
$sma = new Smartys();
$number = $_GET['id'];
include_once ('./top.php');
Model::startTransaction();
$g = new Goods();
$g = $g->query(new Where('g_number',$number),'*',array(
    "GoodsType"=>array(
        'sibling'=>true,
        'noSub'=>'gt_id',
        'columnName'=>'gt_number,gt_name,'
        )
    ))->toArray()[0];

if($gt_id = $g['gt_id']) {

    //获取商品属性
    $ga = new GTAttrType();
    $ga = $ga->query (new Where('gt_id', $gt_id), '*', array(
        'GTAttr' => array(
            'subModel'=>array(
                'GAttr' => array(
                    'sibling' => true,
                    'where' => new Where('g_id', $g['g_id']),
                    'columnName' => 'ga_value'
                )
            )

        )
    ))->toArray ();
    foreach ($ga as &$value){
        foreach ($value['GTAttr'] as $k =>$v){
            if(is_array($v['GAttr'])){
                unset($value['GTAttr'][$k]);
            }
        }
    }
    $gp = new GTPrice();
    $gp =$gp->query(new Where('gt_id',$gt_id),'*',array(
        'GPrice'=>array(
            'where'=>new Where('g_id',$g['g_id']),
            'columnName'=>'gp_id,gp_name'
        )
    ))->toArray();

    $gpi = new GPriceInfo();
    $gpi = $gpi->query(new Where('g_id',$g['g_id']),'*',
        array(
            "GPriceList"=>array(
                'tableName'=>'list',
                'oneLine'=>'gp_id'
            )
        ))->toArray();

    $g['gpi'] = $gpi;
    $g['gp'] = $gp;
    $g['ga'] = $ga;
    Model::commitTransaction();
    $sma->assign('gpi_s',json_encode($gpi));
    $sma->assign('title',$g['g_name']);
    $sma->assign('keywords',$g['g_keywords']);
    $sma->assign('description',$g['g_description']);
    $sma->assign('top',$top);
    $sma->assign('g',$g);
    $sma->display('goods.htm');


}