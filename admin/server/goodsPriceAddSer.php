<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2016/3/2
 * Time: 21:22
 */
$auth = "goodsAdd";
include_once ("./header.inc.php");
$gpi['g_id'] = !empty($_POST['g_id'])?$_POST['g_id']:null;
$gpi['gpi_img'] = !empty($_POST['gpi_img'])?$_POST['gpi_img']:null;
$gpi['gpi_sum'] = !empty($_POST['gpi_sum'])?$_POST['gpi_sum']:null;
$gpi['gpi_price'] = !empty($_POST['gpi_price'])?$_POST['gpi_price']:null;
$gp_ids = !empty($_POST['gp_ids'])?$_POST['gp_ids']:null;
$goods = new Goods();
$arr = array("status" => FALSE, "megs" => "更新失败！！");
if( $gpi_id = $goods->addGoodsPrice($gpi,$gp_ids)){
    $arr = array("status" => true, "megs" => "更新成功",'gpi_id'=>$gpi_id);
}
echo json_encode($arr);