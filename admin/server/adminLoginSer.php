<?php
if (!isset($_SESSION)) {session_start();}
include_once($_SERVER['DOCUMENT_ROOT'].'/public/autoload.php');

//if(strtolower($_SESSION['adminLoginCheck']) != strtolower($_POST['validate'])){exit(json_encode(array("status" => FALSE, "megs" => '验证码错误')));}

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

$a_name = $_POST['a_name'];
$a_pwd = md5($_POST['a_pwd']);
$admin = new Admin();
$where = new Where('a_name',$a_name);
$where->setWhere('a_pwd',$a_pwd);
if ($admin->query($where,array('a_id','a_name','a_img','a_nick'))->length() === 1) {
    $_SESSION['adminInfo'] = $admin->toArray()[0];;
    exit(json_encode(array("status" => true, "megs" => "登录成功")));
}
exit(json_encode(array("status" => FALSE, "megs" => "登录失败")));