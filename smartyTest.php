<?php
header("Content-Type:text/html;charset=utf-8");
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
$gp = new GPrice();
$gp->query(new Where('g_id',1,'int'),"*");
//$gp->query(new Where('g_id',1,'int'),"*",'GAttr');
print_r($gp);