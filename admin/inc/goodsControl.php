<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    exit('登录超时');
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$auth =array();
foreach ($_SESSION['admininfo']['auth'] as $value) {
    if ($value == 14001) {//商品类型管理
        $auth['goodsType'] = true;
    } elseif ($value == 14002) {  //商品管理
        $auth['goods'] = true;
    } elseif ($value == 14003) {  //推荐商品
        $auth['goodsRoom'] = true;
    }
}
$sma = new Smartys;
$sma->assign("auth",$auth);
$sma->display('goodsControl.htm');
