<?php
header("Content-Type:text/html;charset=utf-8");
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
//$sql = new Sql(true);
//$sql->execute("insert into collect (u_id, g_id) VALUE (1,2)");
//$sql->execute("insert into web_info (`wi_key`,wi_title,wi_keywords,wi_description) VALUE ('aaa','asdasd','sdfsdf','sdfsf')");
//$sql->commit();
//
//$g = new Goods();
//$w = new Where('g_id',20,'AND','<=');
//$w->setLimit(10,10)->setOrder('g_number');
//$g->query($w,'*',array('GAttr'=>array('where'=>new Where('gta_id','5'),'columnName'=>array('ga_value','gta_id','g_id'))));
//print_r($g->toArray());
//Auth::inAdmin(3,'report');
$x = ',gt_number,gt_name,';
echo preg_replace('/(^,)|(,','',$x);

//print trim($x,',');
//echo $x;
