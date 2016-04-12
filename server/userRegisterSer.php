<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/13
 * Time: 0:19
 */
include_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
header("Content-type:text/html;charset=utf-8");
$user = new User();
$user->read($_POST);
if($user->save()){
   exit(json_encode(array('status'=>true,'megs'=>'注册成功')));
}else{
    exit(json_encode(array('status'=>false,'megs'=>'注册失败')));
}