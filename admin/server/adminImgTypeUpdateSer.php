<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:09
 */
include_once ("./header.inc.php");
$ait_id = $_GET['ait_id'];
!empty($_GET['ait_name'])?$ait_name = $_GET['ait_name']:$ait_name = null;
$img = new ImgSpace();
if($img->updateImgType($ait_name,$ait_id,$_SESSION['adminInfo'])){
    exit(json_encode(array("status" => TRUE, "megs" => "更新成功！！")));
}
exit(json_encode(array("status" => FALSE, "megs" => "更新失败！！")));