<?php
$auth = "goodsIndex";
include_once ("./header.inc.php");
if(!empty($_GET['id'])){
    $ig = new IndexGoods();

    if($ig->remove(new Where('ig_id',$_GET['id']))){
        exit(json_encode(array("status" => true, "megs" => "成功")));
    }else{
        exit(json_encode(array("status" => false, "megs" => "失败")));
    }
}
