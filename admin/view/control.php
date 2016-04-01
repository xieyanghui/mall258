<?php
include_once("header.inc.php");
$sma = new Smartys;
$c[] = array('name'=>'安全退出','url'=>"/server/exitSer.php");
$c[] = array('name'=>'系统设置','url'=>"/view/menuSystem.php");
$c[] = array('auth'=>'service','name'=>'在线客服','url'=>"/view/menuService.php");
$c[] = array('auth'=>'report','name'=>'报表统计','url'=>"/view/menuReport.php");
$c[] = array('auth'=>'order','name'=>'订单管理','url'=>"/view/menuOrder.php");
$c[] = array('auth'=>'goods','name'=>'商品管理','url'=>"/view/menuGoods.php");
$a_id = $_SESSION['adminInfo']['a_id'];
$menus = array();
foreach ($c as $value) {
    if (empty($value['auth']) || Auth::inAdmin($a_id, $value['auth'])) {
        array_push($menus, $value);
    }
}
$sma->assign('admin', $_SESSION['adminInfo']);
$sma->assign('c', $c);
$sma->display('control.htm');

