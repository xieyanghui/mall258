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


$gt_number = mysql_escape_string($_POST['typeNumber']);
$gt_name = mysql_escape_string($_POST['typeName']);
$gt_remark = mysql_escape_string($_POST['typeRemark']);
$gt_attr = explode(",", mysql_escape_string($_POST['typeProp']));
$gt_price = explode(",", mysql_escape_string($_POST['typePrice']));
$con = new Sql;
$b = $con->execute("insert into `goodsType`(`gt_number`,`gt_name`,`gt_remark`) values('$gt_number','$gt_name','$gt_remark')");
$arr = array("status" => FALSE, "megs" => "添加失败！！");
if ($b) {
    $row = $con->queryLine("select `gt_id` from goodsType where `gt_number` = '$gt_number'");
    $id = $row['gt_id'];
    $sql = "insert into `gtAttr`(`gt_id` ,`gta_name`)values";
    foreach ($gt_attr as $attr) {
        $sql .= "($id,'$attr'),";
    }
    $sql = substr($sql, 0, strlen($sql) - 1) . ";";
    $b1 = $con->execute($sql);
    if ($b1) {
        $sql1 = "insert into `gtAttrPrice`(`gt_id` ,`gtap_attrName` ,`gtap_priceName`)values";
        $iss = 0;
        foreach ($gt_price as $attr) {
            $iss++;
            $sql1 .= "($id,'$attr',$iss),";
        }
        $sql1 = substr($sql1, 0, strlen($sql1) - 1) . ";";
        $b2 = $con->execute($sql1);
        if ($b2) {
            $arr = array("status" => TRUE, "megs" => "添加成功");
        }
    }
}
echo json_encode($arr);
?>