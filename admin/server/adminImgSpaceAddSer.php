<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:06
 */
include_once ("../inc/header.inc.php");
!empty($_GET['ais_name'])?$ais_name = $_GET['ais_name']:$ais_name = null;
!empty($_GET['ais_img_url'])?$ais_img_url = $_GET['ais_img_url']:$ais_img_url = null;
!empty($_GET['ait_id'])?$ait_id = $_GET['ait_id']:$ait_id = null;
$img = new ImgSpace();
if($img->addImgSpace($ais_name,$_SESSION['adminInfo']['a_id'],$ais_img_url,$ait_id)){
    exit(json_encode(array("status" => TRUE, "megs" => "添加成功！！")));
}
exit(json_encode(array("status" => FALSE, "megs" => "添加失败！！")));
