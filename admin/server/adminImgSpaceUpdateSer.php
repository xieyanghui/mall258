<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 22:06
 */
include_once ("./header.inc.php");
$img = new AdminImgSpace();
$img->read($_GET);
if($img->save()){
    exit(json_encode(array("status" => TRUE, "megs" => "修改成功")));
}
exit(json_encode(array("status" => FALSE, "megs" => "修改失败")));
