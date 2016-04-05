<?php
$auth = "goodsIndex";
include_once ("./header.inc.php");

!empty($_POST['ir_id'])?$ir['ir_id'] = $_POST['ir_id']:null;
!empty($_POST['ir_name'])?$ir['ir_name'] =$_POST['ir_name']:null;
!empty($_POST['ir_start_time'])?$ir['ir_start_time']=$_POST['ir_start_time']:null;
!empty($_POST['ir_end_time'])?$ir['ir_end_time']=$_POST['ir_end_time']:null;
!empty($_POST['g_id'])?$ir['g_id']=$_POST['g_id']:null;

$goods = new Goods;
if(!empty($ir['ir_id'])){
    if($goods->updateIndexRoll($ir)){
        exit(json_encode(array("status" => true, "megs" => "修改成功")));
    }
    exit(json_encode(array("status" => false, "megs" => "修改失败")));
}else{
    if($goods->addIndexRoll($ir)){
        exit(json_encode(array("status" => true, "megs" => "添加成功")));
    }
    exit(json_encode(array("status" => false, "megs" => "添加失败")));
}
