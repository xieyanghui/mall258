<?php
include_once("header.inc.php");
$sma = new Smartys();
$img = new ImgSpace();
$space = $img->getImgSpace($_SESSION['adminInfo']['a_id']);
$type = $img->getImgType($_SESSION['adminInfo']['a_id']);
print_r($space);
foreach((array)$space as $value){
    if($type['ait_id'] == $value['ait_id']){
        $type['value'][] = $value;
    }
}
$sma->assign('space',$type);
$sma->display('adminImgSpace.htm');

