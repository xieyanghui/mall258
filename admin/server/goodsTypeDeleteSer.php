<?php
$auth = "goodsTypeDelete";
include_once ("./header.inc.php");
$goods = new Goods;
$b = $goods->deleteGoodsType($_GET['name'],$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 删除了ID为{$_GET['name']}的商品类型");
$arr = array("status" => false, "megs" => "删除失败");

if ($b) {
    $arr = array("status" => true, "megs" => "删除成功！！");
}
echo json_encode($arr);