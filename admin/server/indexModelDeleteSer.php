<?php
$auth = "goodsIndex";
include_once ("./header.inc.php");
if(!empty($_GET['id'])){
    Model::startTransaction();
    $im = new IndexModel();
    $ig = new IndexGoods();
    $ig->remove(new Where('im_id',$_GET['id']));
    $im->remove(new Where('im_id',$_GET['id']));
    if(Model::commitTransaction() == 1){
        exit(json_encode(array("status" => true, "megs" => "成功")));
    }else{
        exit(json_encode(array("status" => false, "megs" => "失败")));
    }
}
