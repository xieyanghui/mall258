<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2016/3/2
 * Time: 21:22
 */
$auth = "goodsAdd";
include_once ("./header.inc.php");
$gpi_id = !empty($_POST['gpi_id'])?$_POST['gpi_id']:null;
$goods = new Goods();
$arr = array("status" => FALSE, "megs" => "删除失败！！");
if($goods->deleteGoodsPrice($gpi_id)){
    $arr = array("status" => true, "megs" => "删除成功");
}
echo json_encode($arr);