<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:08
 */
include_once ("./header.inc.php");
$img = new ImgSpace();

if($_GET['ait_id'] ==1){
    if($img->deleteImgSpace($_GET['ais_id'],$_SESSION['adminInfo']['a_id'])){
        exit(json_encode(array("status" => TRUE, "megs" => "删除成功！！")));
    }
}else{
    if($img->moveImgSpace($_GET['ais_id'],1)){
        exit(json_encode(array("status" => TRUE, "megs" => "删除成功！！")));
    }
}

exit(json_encode(array("status" => FALSE, "megs" => "删除失败！！")));