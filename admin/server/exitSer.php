<?php
// 退出服务
session_unset();
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
header("Content-Type:text/html;charset=utf-8");
$local = $_SERVER['HTTP_HOST'].Config::ADMIN_DIR;
?>
<script type="text/javascript">
    (function () {
        window.location.href = "http://<?=$local ?>";
    })();
</script>

