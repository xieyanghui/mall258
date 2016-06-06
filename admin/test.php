<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/public/autoload.php');
//$goods = new Goods();
//$goods->queryGoods(1);
$a = array('aa'=>'aaa','bb'=>'bbb');
unset($a['aa']);
print_r(count($a));