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
$gt = new GoodsType();

if(!empty($_GET['id']) ){
    $where = new Where('gt_id',$_GET['id']);
    $where->setWhere('gt_status',0,'<>');
    $gt->query($where,'gt_id,gt_name,gt_number,gt_remark',
        array('GTAttrType'=>array(
            'columnName'=>'gtat_id,gtat_name',
            'tableName'=>'attr',
            'subModel'=>'GTAttr'
            ),
            'GTPrice'=>array(
                'tableName'=>'price'
            )
        ));
   // print_r($gt->toArray());
    $sma->assign('row',$gt->toArray()[0]);
}
$sma->ds('goodsTypeAU.htm');

