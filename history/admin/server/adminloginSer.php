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
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
        $ip = getenv("REMOTE_ADDR");
    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
        $ip = $_SERVER['REMOTE_ADDR'];
    else
        $ip = "unknown";
    return ($ip);
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
?>