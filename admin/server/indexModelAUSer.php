<?php
$auth = "goodsIndex";
include_once ("./header.inc.php");

$im = new IndexModel();
$im->read($_POST);
if($id = $im->save()){
    if(is_int($id)){
        exit(json_encode(array("status" => true, "megs" => "成功",'id'=>$id)));
    }else{
        exit(json_encode(array("status" => true, "megs" => "成功")));
    }
}else{
    exit(json_encode(array("status" => false, "megs" => "失败")));
}

//if(!empty($ir['ir_id'])){
//    if($goods->updateIndexRoll($ir)){
//        exit(json_encode(array("status" => true, "megs" => "修改成功")));
//    }
//    exit(json_encode(array("status" => false, "megs" => "修改失败")));
//}else{
//    if($goods->addIndexRoll($ir)){
//        exit(json_encode(array("status" => true, "megs" => "添加成功")));
//    }
//    exit(json_encode(array("status" => false, "megs" => "添加失败")));
//}
