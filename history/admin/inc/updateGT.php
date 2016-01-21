<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    header("location: ./");
    exit;
}
header("Content-type:text/html;charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$sma = new SmartysAdmin;
$number = mysql_escape_string($_GET['name']);
$con = new Sql;
$sql = "select `gt_id`,`gt_number`,`gt_name` ,`gt_remark` from goodsType where `gt_number` ='$number'";
$row = $con->queryLine($sql);
$attr = $con->queryData("select `gta_id`,`gta_name` from gtAttr where `gt_id` = " . $row['gt_id']);
$sqlprice = "select `gtap_id`,`gtap_attrName` from gtAttrPrice where `gt_id` =" . $row['gt_id'];
$price = $con->queryData($sqlprice);
$sma->assign('row', $row);
$sma->assign('attr', $attr);
$sma->assign('price', $price);
$sma->display('updateGT.htm');
?>
