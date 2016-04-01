<?php
if (!isset($_SESSION)) {
    session_start();
};
spl_autoload_register(function ($classname) {
    if (is_file($_SERVER['DOCUMENT_ROOT'] . '/tool/' . $classname . '.class.php')) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/tool/' . $classname . '.class.php');
    }
});
header("Content-Type:text/json;charset=utf-8");
if ($_POST['validate'] != $_SESSION['regimg']) {
    exit("验证码错误！");
}
$u_name = mysql_escape_string($_POST['reguserName']);
$u_pwd = md5($_POST['regpwd']);
$u_nick = mysql_escape_string($_POST['nick']);
$u_phone = mysql_escape_string($_POST['phone']);
$u_email = mysql_escape_string($_POST['email']);
$sql = new Sql;
$b = $sql->execute("insert into `userInfo`(`u_name`,`u_pwd`,`u_nick`,`u_phone`,`u_email`) values('$u_name','$u_pwd','$u_nick','$u_phone','$u_email')");
$json = array("status" => false, "meg" => "注册失败");
if ($b) {
    $json = array("status" => false, "meg" => "注册成功");
}
echo json_encode($json);
?>