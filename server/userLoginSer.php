<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/13
 * Time: 0:20
 */
if (!isset($_SESSION)) {session_start();}
include_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
if(!empty($_COOKIE['login_verify'])){
    if($_COOKIE['login_verify'] >2 ){
        if($_POST['login_verify'] !=$_SESSION['login_verify']){
            exit(json_encode(array('status'=>false,'megs'=>'验证码错误','verify'=>true)));
        }
    }
}else{
    $_COOKIE['login_verify'] =1;
}
$_COOKIE['login_verify'] +=1;
$where = new Where('u_name',$_POST);
