<?php
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    header("location: ./");
    exit;
}
header("Content-type:text/html;charset=utf-8");
//$aauth = true;
//foreach((array)$_SESSION['admininfo']['auth'] as $value){
//    if($value == 10003){
//        $aauth = false;
//    }}
//
//if($aauth){exit("权限不够");}
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$gt_id = $_GET['gtId'];
//echo $aa_id;
$mode = new goods();
$data = $mode->queryGoodsTypeAttr($gt_id);
echo json_encode($data);