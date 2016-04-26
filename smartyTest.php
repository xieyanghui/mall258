<?php
header("Content-Type:text/html;charset=utf-8");
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
$sql = new Sql(true);
$sql->execute("insert into collect (u_id, g_id) VALUE (1,2)");
//$sql->execute("insert into web_info (`wi_key`,wi_title,wi_keywords,wi_description) VALUE ('aaa','asdasd','sdfsdf','sdfsf')");
$sql->commit();