<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-6
 * Time: 上午4:39
 */
include_once ('header.inc.php');
new Filter(true);
if(!empty($_SESSION['userInfo'])){
    exit('您已经登录啦');
}else{
    $sma = new Smartys;
    $sma->display('login.htm');
}
