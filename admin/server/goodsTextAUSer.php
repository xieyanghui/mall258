<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/28
 * Time: 23:58
 */
$auth = "goodsAdd";
include_once ("../inc/header.inc.php");
$g['g_id'] = $_POST['g_id'];
$g['g_text'] = $_POST['g_text'];
$goods = new Goods();
$arr = array("status" => FALSE, "megs" => "失败！！");
if($goods->updateGoods($g,$_SESSION['adminInfo']['a_id'],"aaaaaaaaaa")){
    $arr = array("status" => true, "megs" => "成功");
}
echo json_encode($arr);