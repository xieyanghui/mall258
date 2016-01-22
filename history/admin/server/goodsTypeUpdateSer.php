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
$gt['gt_id'] = $_POST['number'];
$gt['goodsType']['gt_name'] = !empty($_POST['gtName'])?$_POST['gtName']:null;
$gt['goodsType']['gt_remark'] = $_POST['gtRemark'];
$gt['agtAttr'] = !empty($_POST['aattr'])?$_POST['aattr']:null;
$gt['agtAttrPrice'] = !empty($_POST['aattrPrice'])?$_POST['aattrPrice']:null;
foreach ($_POST as $key => $value) {
    if (strstr($key, "uattr") && !empty($value)) {
        $gt['ugtAttr'][substr($key, 5)] = $value;
    } elseif (strstr($key, "uprice") && !empty($value)) {
        $gt['ugtAttrPrice'][substr($key, 6)] = $value;
    }
}
$goods = new Goods;
$b = $goods->updateGoodsType($gt);
$arr = array("status" => false, "megs" => "修改失败");

if ($b) {
    $arr = array("status" => true, "megs" => "修改成功！！");
}
echo json_encode($arr);
