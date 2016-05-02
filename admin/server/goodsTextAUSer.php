<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/28
 * Time: 23:58
 */
$auth = "goodsAdd";
include_once ("./header.inc.php");
$goods = new Goods();
$goods->read($_POST);
if($goods->save()){
    exit(json_encode(array("status" => true, "megs" => "成功")));
}
exit(json_encode(array("status" => false, "megs" => "失败")));

//$arr = array("status" => FALSE, "megs" => "失败！！");
//if($goods->updateGoods($g,$_SESSION['adminInfo']['a_id'],"aaaaaaaaaa")){
//    $arr = array("status" => true, "megs" => "成功");
//}
//echo json_encode($arr);