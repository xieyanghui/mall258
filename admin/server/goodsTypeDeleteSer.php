<?php
if (!isset($_SESSION)) {session_start();};
if (empty($_SESSION['adminInfo'])) {header("location: ./");exit('登录超时');}
header("Content-type:text/html;charset=utf-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsTypeDelete')){
    exit(json_encode(array("status" => FALSE, "megs" => "权限不够！！")));
}
$goods = new Goods;
$b = $goods->deleteGoodsType($_GET['name'],$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 删除了ID为{$_GET['name']}的商品类型");
$arr = array("status" => false, "megs" => "删除失败");

if ($b) {
    $arr = array("status" => true, "megs" => "删除成功！！");
}
echo json_encode($arr);