<?php
include_once ("./header.inc.php");
$gtp = new GTPrice();
$gta = new GTAttrType();
$gt=array();
$gtp->query(new Where('gt_id',$_GET['gt_id']),'gtp_id,gtp_name');
$gta->query(new Where('gt_id',$_GET['gt_id']),'gtat_id,gtat_name',array(
    'GTAttr'=>array('columnName'=>'gta_id,gta_name')
));
$gt['attr'] = $gta->toArray();
$gt['price'] = $gtp->toArray();
echo json_encode($gt);