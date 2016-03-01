<?php
if (!isset($_SESSION)) {session_start();};
if (empty($_SESSION['adminInfo'])) {header("location: ./");exit('登录超时');}
header("Content-type:text/html;charset=utf-8");

include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],'goodsAdd')){
    exit(json_encode(array("status" => FALSE, "megs" => "权限不够！！")));
}
$goods = new Goods();
$goods->addGoods();
