<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:06
 */
include_once ("./header.inc.php");
empty($_GET['ait_id'])?$_GET['ait_id'] =2:null;

$img = new AdminImgSpace();
$img->read($_GET);
if($id  = $img->save(array('a_id'=>$_SESSION['adminInfo']['a_id']))){
    exit(json_encode(array("status" => TRUE, "megs" => "添加成功",'id'=>$id)));
}else{
    exit(json_encode(array("status" => FALSE, "megs" => "添加失败")));
}

