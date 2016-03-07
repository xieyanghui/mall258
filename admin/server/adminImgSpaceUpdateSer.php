<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:06
 */
include_once ("../inc/header.inc.php");
$ais_id = $_POST['ais_id'];
!empty($_POST['ais_name'])?$ais_name = $_POST['ais_name']:$ais_name = null;
!empty($_POST['ais_img_url'])?$ais_img_url = $_POST['ais_img_url']:$ais_img_url = null;
!empty($_POST['ait_id'])?$ait_id = $_POST['ait_id']:$ait_id = null;
$img = new ImgSpace();
if($img->updateImgSpace($ais_id,$ais_name,$ais_img_url,$ait_id)){
    exit(json_encode(array("status" => TRUE, "megs" => "添加成功！！")));
}
exit(json_encode(array("status" => FALSE, "megs" => "添加失败！！")));
