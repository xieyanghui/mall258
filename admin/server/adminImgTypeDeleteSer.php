<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:09
 */
include_once ("./header.inc.php");
$img = new ImgSpace();
if($img->deleteImgType($_GET['ait_id'],$_SESSION['adminInfo']['a_id'])){
    exit(json_encode(array("status" => TRUE, "megs" => "删除成功！！")));
}
exit(json_encode(array("status" => FALSE, "megs" => "删除失败！！")));