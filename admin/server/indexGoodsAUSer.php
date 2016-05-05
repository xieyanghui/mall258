<?php
$auth = "goodsIndex";
include_once ("./header.inc.php");

$ig = new IndexGoods();
$ig->read($_POST);
if(empty($ig->get('ig_img'))){
    $g = new Goods();
    $g->query(new Where('g_id',$ig->get('g_id')),'g_img');
    $ig->set('ig_img',$g->get('g_img'));
}
if($id = $ig->save()){
    if(is_int($id)){
        exit(json_encode(array("status" => true, "megs" => "成功",'id'=>$id)));
    }else{
        exit(json_encode(array("status" => true, "megs" => "成功")));
    }
}else{
    exit(json_encode(array("status" => false, "megs" => "失败")));
}
