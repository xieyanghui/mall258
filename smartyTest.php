<?php
header("Content-Type:text/html;charset=utf-8");
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
$gp = new GPriceInfo();
$gp->query(new Where(),"gpi_id,gpi_img");
//$gp->query(new Where('g_id',1,'int'),"*",'GAttr');

foreach ($gp as $g){
    $gp->set('gpi_img',str_replace('_430x430q90.jpg','',$g['gpi_img']));
}
$gp->save();
$gp = new Goods();
$gp->query(new Where(),"g_id,g_img");
//$gp->query(new Where('g_id',1,'int'),"*",'GAttr');

foreach ($gp as $g){
    $gp->set('g_img',str_replace('_430x430q90.jpg','',$g['g_img']));
}
$gp->save();


