<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/29
 * Time: 20:54
 */
$auth = "goodsDelete";
include_once ("./header.inc.php");
$goods = new Goods();
if ($goods->deleteGoods($_GET['id'])){
    exit(json_encode(array("status" => true, "megs" => "删除成功")));
}
exit(json_encode(array("status" => false, "megs" => "删除失败")));