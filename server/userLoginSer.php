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

//头3次不需要验证码
if(isset($_COOKIE['login_verify'])){
    setcookie('login_verify',$_COOKIE['login_verify']+1,time()+12000,'/');
    if($_COOKIE['login_verify'] >1 ){
        if(empty($_SESSION['login_verify'])|| empty($_POST['u_verify']) || strtolower($_POST['u_verify']) !=strtolower($_SESSION['login_verify'])){
            exit(json_encode(array('status'=>false,'megs'=>'验证码错误','verify'=>true)));
        }
    }
}else{
    setcookie('login_verify',0,time()+12000,'/');
}

$where = new Where('u_name',$_POST['u_name']);
$where->setWhere('u_pwd',md5($_POST['u_pwd']));
$user = new User();
$user->query($where);
if($user->length() >0){
   $_SESSION['user'] = $user->current();
   setcookie("login_verify", '', time()-3600,'/');
    exit(json_encode(array('status'=>true,'megs'=>'登录成功')));
}else{
    if(isset($_COOKIE['login_verify']) && $_COOKIE['login_verify'] >=1){
        exit(json_encode(array('status'=>false,'megs'=>'用户名或密码不对','verify'=>true)));
    }
    exit(json_encode(array('status'=>false,'megs'=>'用户名或密码不对')));
}
