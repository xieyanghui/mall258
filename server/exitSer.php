<?php
// 退出服务
if (!isset($_SESSION)) {session_start();};
session_unset();
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
header("Content-Type:text/html;charset=utf-8");
$local = $_SERVER['HTTP_HOST'];

if(preg_match("/^\/\/{$_SERVER['HTTP_HOST']}\\".Config::ADMIN_DIR."/",$_SERVER['HTTP_REFERER'])){
    $local = $_SERVER['HTTP_HOST'].Config::ADMIN_DIR;
}else{
    $local = $_SERVER['HTTP_HOST'].'/view';
}
?>
<script type="text/javascript">
    (function () {
        window.location.href = "http://<?=$local ?>";
    })();
</script>

