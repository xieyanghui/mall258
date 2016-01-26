<?php
/**
 * Created by PhpStorm.
 * User: 谢扬辉
 * Date: 2016/1/22
 * Time: 5:06
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
header("Content-Type:text/html;charset=utf-8");
//$sql = new Sql();
//echo $sql->executeid("INSERT INTO `authList`(al_key,al_nick,al_remark) VALUES ('aaaa','aaaa','aaaaa')");
$admin = "xieyanghui' or 'foo' = 'foo' -- ";

$pwd = "";
$sql = new Sql();
print_r($sql->queryLine("SELECT * FROM `adminInfo` WHERE a_name='{$admin}' AND a_pwd = '{$pwd}'"));
//echo mysql_real_escape_string("...\"\"");
