<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:06
 */
include_once ("../inc/header.inc.php");
!empty($_GET['ait_name'])?$ait_name = $_GET['ait_name']:$ait_name = null;

$img = new ImgSpace();
if($id = $img->addImgType($ait_name,$_SESSION['adminInfo']['a_id'])){
    exit(json_encode(array("status" => TRUE, "megs" => "添加成功！！",'id' =>$id)));
}
exit(json_encode(array("status" => FALSE, "megs" => "添加失败！！")));