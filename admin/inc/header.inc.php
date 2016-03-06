<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2016/3/6
 * Time: 12:00
 */
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION['adminInfo'])) {exit(json_encode(array('status'=>false,'mage'=>'登录超时')));}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
print_r($_SERVER);
//if(!empty($auth)){
//    if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],$auth)){exit(json_encode(array('status'=>false,'mage'=>'权限不够')));}
//}

