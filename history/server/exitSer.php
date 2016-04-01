<?php
if (!isset($_SESSION)) {session_start();};
session_unset();
header("Content-Type:text/html;charset=utf-8");
?>
<script type="text/javascript">
    (function () {
        window.location.href = "http://<?=$_SERVER['HTTP_HOST'] ?>";
    })();
</script>