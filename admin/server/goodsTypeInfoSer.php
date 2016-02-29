<?php
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION['adminInfo'])) {exit('登录超时');}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
$goods = new Goods();
echo json_encode($goods->queryGoodsTypeInfo($_GET['gt_id']));