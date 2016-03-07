<?php
include_once ("../inc/header.inc.php");
$goods = new Goods();
echo json_encode($goods->queryGoodsTypeInfo($_GET['gt_id']));