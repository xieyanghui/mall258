<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/public/autoload.php');
$goods = new Goods();
$goods->queryGoods(1);