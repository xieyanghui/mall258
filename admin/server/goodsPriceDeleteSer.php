<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2016/3/2
 * Time: 21:22
 */
$auth = "goodsAdd";
include_once ("../inc/header.inc.php");
$gpi_id = !empty($_POST['g_id'])?$_POST['g_id']:null;
$goods = new Goods();
$arr = array("status" => FALSE, "megs" => "删除失败！！");
if($goods->deleteGoodsPrice($gpi_id)){
    $arr = array("status" => true, "megs" => "删除成功");
}
echo json_encode($arr);