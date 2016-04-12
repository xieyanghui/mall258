<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/13
 * Time: 0:20
 */
if (!isset($_SESSION)) {session_start();}
header("Content-type:text/html;charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
if(!empty($_COOKIE['login_verify'])){
    if($_COOKIE['login_verify'] >2 ){
        if($_POST['login_verify'] !=$_SESSION['login_verify']){
            exit(json_encode(array('status'=>false,'megs'=>'验证码错误','verify'=>true)));
        }
    }
}else{
    $_COOKIE['login_verify'] =0;
}
$_COOKIE['login_verify'] +=1;
$where = new Where('u_name',$_POST['u_name']);
$where->setWhere('u_pwd',md5($_POST['u_pwd']));
$user = new User();
$user->query($where);
if($user->length() >0){
    $_SESSION['userInfo'] = $user->current();
    exit(json_encode(array('status'=>true,'megs'=>'登录成功')));
}else{
    exit(json_encode(array('status'=>false,'megs'=>'用户名或密码不对')));
}
