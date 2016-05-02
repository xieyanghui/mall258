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
$g = $g->query(new Where('g_number',$number),'*',"GAttr,GPrice")->toArray()[0];


if($gt_id = $g['gt_id']){
    $gt = new GoodsType();
    $gt = $gt->query(new Where('gt_id',$gt_id),'*','GTAttr,GTPrice')->toArray()[0];

    $gpi = new GPriceInfo();
    $gpi = $gpi->query(new Where('g_id',$g['g_id']),'*',"GPriceList")->toArray();
    foreach ($gpi as &$gpl){
        $gpl['list'] = array();
        foreach ($gpl['GPriceList'] as $gpls){
            array_push($gpl['list'],$gpls['gp_id']);
        }
        unset($gpl['GPriceList']);
    }
    //print_r($gpi);
    $newAttr = array();
    foreach ($g['GAttr'] as $attr){
        foreach ($gt['GTAttr'] as $gtAttr){
            if($attr['gta_id'] === $gtAttr['gta_id']){
                $newAttr[$gtAttr['gta_type']][] = array('ga_value'=>$attr['ga_value'],'gta_name'=>$gtAttr['gta_name']);
                continue;
            }
        }
    }

    $newPrice = array();
    foreach($g['GPrice'] as $price){
        foreach ($gt['GTPrice'] as $gtPrice){
            if($price['gtp_id'] === $gtPrice['gtp_id']){
                $newPrice[$gtPrice['gtp_name']][] = array('gp_name'=>$price['gp_name'],'gp_id'=>$price['gp_id']);
                continue;
            }
        }
    }
    $g['gt_name'] = $gt['gt_name'];
    $g['GPrice'] =$newPrice;
    $g['GAttr'] = $newAttr;
    $g['gpi'] = $gpi;
   // print_r($g);

    Model::commitTransaction();
    $sma->assign('gpi_s',json_encode($gpi));
    $sma->assign('top',$top);
    $sma->assign('title',$g['g_name']);
    $sma->assign('keywords',$g['g_keywords']);
    $sma->assign('description',$g['g_description']);
    $sma->assign('g',$g);
    $sma->display('goods.htm');

}else{
    
}


//print_r($g->get('g_number'));
//$sma->assign('top',$top);
//$sma->display('goods.htm');