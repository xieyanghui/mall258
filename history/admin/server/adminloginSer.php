<?php
if (!isset($_SESSION)) {
    session_start();
};
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
header("Content-Type:text/html;charset=utf-8");
header("refresh:2;url=http://" . $_SERVER['HTTP_HOST'] . "/admin/");
//if($_SESSION['adminimg'] != $_POST['validate']){exit('验证码错误');}


function getIp()
{
    $ip = null;
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif(!empty($_SERVER["REMOTE_ADDR"])){
        $ip = $_SERVER["REMOTE_ADDR"];
    }
    else{
        $ip = "unknown";
    }
    if (strstr($ip,",")!= null){
       $ip =  strstr($ip,",",true);
    }
    return $ip;
}

$a_name = $_POST['adminName'];
$a_pwd = md5($_POST['pwd']);
$admin = new AdminInfo;
$b = $admin->login($a_name, $a_pwd, getIp());
if (!empty($b)) {
    $_SESSION['admininfo'] = $b;
    print_r($b['auth']);
    echo "登录成功";
} else {
    echo "登录失败";
}