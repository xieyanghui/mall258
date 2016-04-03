<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/2
 * Time: 17:19
 */
if (!isset($_SESSION)) {session_start();}
header("Content-type:text/html;charset=utf-8");
if (empty($_SESSION['adminInfo'])) {exit(json_encode(array('status'=>false,'megs'=>'登录超时')));}
include_once($_SERVER['DOCUMENT_ROOT'].'/public/autoload.php');
if(!empty($auth)){
    if(!AdminAuth::inAdmin($_SESSION['adminInfo']['a_id'],$auth)){exit(json_encode(array('status'=>false,'megs'=>'权限不够')));}
}
new Filter(true);