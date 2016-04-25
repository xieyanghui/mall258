<?php
$auth = "goodsTypeUpdate";
include_once ("./header.inc.php");

!empty($_POST['gt_id'])?$gt['gt_id'] = $_POST['gt_id']:null;
!empty($_POST['gt_name'])?$gt['gt_name'] =$_POST['gt_name']:null;
!empty($_POST['gt_remark'])?$gt['gt_remark']=$_POST['gt_remark']:null;
$gt['attr'] =!empty($_POST['attr'])?$_POST['attr']:null;
$gt['price'] =!empty($_POST['price'])?$_POST['price']:null;
$gt['uAttr'] = array();
$gt['uPrice'] = array();
foreach ($_POST as $key => $value) {
    if (strstr($key, "uAttr") && !empty($value)) {
        $gt['uAttr'][substr($key, 5)] = $value;
    } elseif (strstr($key, "uPrice") && !empty($value)) {
        $gt['uPrice'][substr($key, 6)] = $value;
    }
}
$goods = new Goods;
if(!empty($gt['gt_id'])){
    if($goods->updateGoodsType($gt,$a_id,"{$_SESSION['adminInfo']['a_nick']} 修改了ID为{$_POST['gt_id']}的商品类型")){
        exit(json_encode(array("status" => true, "megs" => "修改成功")));
    }
    exit(json_encode(array("status" => false, "megs" => "修改失败")));
}else{
    if($goods->addGoodsType($gt,$a_id,"{$_SESSION['adminInfo']['a_nick']} 增加了商品类型 编号为{$_POST['gt_number']}")){
        exit(json_encode(array("status" => true, "megs" => "添加成功")));
    }
    exit(json_encode(array("status" => false, "megs" => "添加失败")));
}
