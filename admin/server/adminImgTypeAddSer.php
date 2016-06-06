<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:06
 */
include_once ("./header.inc.php");
!empty($_GET['ait_name'])?$ait_name = $_GET['ait_name']:$ait_name = null;

$img = new AdminImgType();
$img->set('ait_name',$_GET['ait_name']);
if($id = $img->save(array('a_id'=>$_SESSION['adminInfo']['a_id']))){
    exit(json_encode(array("status" => TRUE, "megs" => "添加成功！！",'id' =>$id)));
}
exit(json_encode(array("status" => FALSE, "megs" => "添加失败！！")));
