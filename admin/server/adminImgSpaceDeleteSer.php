<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:08
 */
include_once ("./header.inc.php");
$img = new AdminImgSpace();

$img->query(new Where('ais_id',$_GET['ais_id']),'ais_img_url,ais_id');

if($_GET['ait_id'] === 1){
    $where =new Where('a_id',$_SESSION['adminInfo']['a_id']);
    $where->setWhere('ais_id',$_GET['ais_id']);
    if($img->remove($where)){
        foreach ($img as $value){
            Qiniu::deleteImg($value['ais_img_url']);
        }
        exit(json_encode(array("status" => TRUE, "megs" => "删除成功！！")));
    }
}else{
    if($img->save('ait_id',1)){
        exit(json_encode(array("status" => TRUE, "megs" => "删除成功！！")));
    }
}
exit(json_encode(array("status" => FALSE, "megs" => "删除失败！！")));