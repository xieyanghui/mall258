<?php
include_once("header.inc.php");
$sma = new Smartys();
$img = new AdminImgType();
$where = new Where('a_id',$_SESSION['adminInfo']['a_id']);
$where->setWhere('a_id', "0" ,'OR');
$img->query($where,'*',array(
    'AdminImgSpace'=>array(
        'where'=>new Where('a_id',$_SESSION['adminInfo']['a_id']),
        'tableName'=>'value'
    )
));
$space = $img->toArray();
$sma->assign('space',$space);
$sma->assign('select',!empty($_GET['select'])?true:false);
$sma->assign('img_link',!empty($_GET['img_link'])?$_GET['img_link']:"");
$sma->assign('space_img',!empty($_GET['space_img'])?$_GET['space_img']:"");
$sma->ds('adminImgSpace.htm');

