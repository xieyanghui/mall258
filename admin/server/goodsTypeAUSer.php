<?php
$auth = "goodsTypeUpdate";
include_once ("./header.inc.php");

$gt = new GoodsType();
$gt->read($_POST);
$gta = new GTAttr();
$gtp = new GTPrice();
foreach ($_POST as $key => $value) {
    if (preg_match("/^attr/",$key) && !empty($value)) {
        $gta->read(array('gta_id'=>substr($key, 4),'gta_name'=>$value));
    }elseif(preg_match("/^a_attr/",$key) && !empty($value)){
        foreach ($value as $v){
            $gta->read(array('gtat_id'=>substr($key, 6),'gta_name'=>$v));
        }
    }elseif(preg_match("/^price/",$key) && !empty($value)){
        $gtp->read(array('gtp_id'=>substr($key, 5),'gtp_name'=>$value));
    }elseif(preg_match("/^a_price/",$key) && !empty($value)){
        foreach ($value as $v){
            $gtp->read(array('gtp_name'=>$v));
        }
    }
}
$gt->set('gta',$gta);
$gt->set('gtp',$gtp);
Model::startTransaction();
$id = $gt->save();
echo Model::commitTransaction();

//!empty($_POST['gt_id'])?$gt['gt_id'] = $_POST['gt_id']:null;
//!empty($_POST['gt_name'])?$gt['gt_name'] =$_POST['gt_name']:null;
//!empty($_POST['gt_remark'])?$gt['gt_remark']=$_POST['gt_remark']:null;
//$gt['attr'] =!empty($_POST['attr'])?$_POST['attr']:null;
//$gt['price'] =!empty($_POST['price'])?$_POST['price']:null;
//$gt['uAttr'] = array();
//$gt['uPrice'] = array();

//$goods = new Goods;
//if(!empty($gt['gt_id'])){
//    if($goods->updateGoodsType($gt,$a_id,"{$_SESSION['adminInfo']['a_nick']} 修改了ID为{$_POST['gt_id']}的商品类型")){
//        exit(json_encode(array("status" => true, "megs" => "修改成功")));
//    }
//    exit(json_encode(array("status" => false, "megs" => "修改失败")));
//}else{
//    if($goods->addGoodsType($gt,$a_id,"{$_SESSION['adminInfo']['a_nick']} 增加了商品类型 编号为{$_POST['gt_number']}")){
//        exit(json_encode(array("status" => true, "megs" => "添加成功")));
//    }
//    exit(json_encode(array("status" => false, "megs" => "添加失败")));
//}
