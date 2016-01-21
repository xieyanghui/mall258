<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    exit('登录超时');
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$sma = new SmartysAdmin;
$sql = "select `gt_id`,`gt_number`,`gt_name`,`gt_remark` from `goodsType`";
$con = new Sql;
$row = $con->queryData($sql);
$sma->assign('row', $row);
$sma->assign('count', count($row));
$sma->display("shoptypecontrol.htm");
?>