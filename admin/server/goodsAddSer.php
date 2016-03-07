<?php
$auth = "goodsAdd";
include_once ("../inc/header.inc.php");
$goods = new Goods();
$g['g_number'] = $_POST['g_number'];
$g['gt_id'] = $_POST['gt_id'];
$g['g_name'] = $_POST['g_name'];
$g['g_price'] = $_POST['g_price'];
$g['g_img'] = $_POST['img'];
$g['g_keywords'] = $_POST['g_keywords'];
$g['g_description'] = $_POST['g_description'];
foreach ($_POST as $key => $value) {
    if (strstr($key, "attr") && !empty($value)) {
        $g['attr'][$value] = substr($key, 4);
    } elseif (strstr($key, "price") && !empty($value) && is_array($value)) {
        foreach($value as $v){
            $g['price'][$v] = substr($key, 5);
        }
    }
}
if($g_id = $goods->addGoods($g,$_SESSION['adminInfo']['a_id'],"{$_SESSION['adminInfo']['a_nick']} 添加了商品 {$_POST['g_number']}")){
    exit(json_encode(array("status" => true, "megs" => "添加成功","g_id"=>$g_id)));
}
exit(json_encode(array("status" => false, "megs" => "添加失败")));
