<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:09
 */
include_once ("./header.inc.php");
$img = new AdminImgType();
$where =new Where('a_id',$_SESSION['adminInfo']['a_id']);
$where->setWhere('ait_id',$_GET['ait_id']);
if($img->remove($where) >=1){
    $img =new AdminImgSpace();
    $where =new Where('a_id',$_SESSION['adminInfo']['a_id']);
    $where->setWhere('ait_id',$_GET['ait_id']);
    $img->query($where,'ais_id');
    $img->save('ait_id',1);
    exit(json_encode(array("status" => TRUE, "megs" => "删除成功！！")));
}
exit(json_encode(array("status" => FALSE, "megs" => "删除失败！！")));