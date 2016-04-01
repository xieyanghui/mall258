<?php
//与Smarty配合pc与移动设备切换
if (!isset($_SESSION)) {session_start();};
if ($_SESSION['device'] == 'mobile') {
    $_SESSION['device'] = 'pc';
} else {
    $_SESSION['device'] = 'mobile';
}
header('Location:'.$_SERVER['HTTP_REFERER']);