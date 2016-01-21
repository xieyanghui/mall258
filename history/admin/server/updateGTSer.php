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
$gt_id = mysql_escape_string($_POST['number']);
$gt_name = mysql_escape_string($_POST['gtname']);
$gt_bz = mysql_escape_string($_POST['gtnamebz']);
$uattr = array();
$uprice = array();
$aattr = array();
$aprice = array();
foreach ($_POST as $key => $value) {
    if (strstr($key, "uattr") && !empty($value)) {
        $uattr[substr($key, 5)] = mysql_escape_string($value);
    } elseif (strstr($key, "uprice") && !empty($value)) {
        $uprice[substr($key, 6)] = mysql_escape_string($value);
    } elseif (strstr($key, "aattr") && !empty($value)) {
        $aattr[substr($key, 5)] = mysql_escape_string($value);
    } elseif (strstr($key, "aprice") && !empty($value)) {
        $aprice[substr($key, 6)] = mysql_escape_string($value);
    }
}
$con = new Sql;
$sqllx = "";
if (!empty($gt_name)) {
    $sqllx .= " `gt_name`='$gt_name' ,";
}
if (!empty($gt_bz)) {
    $sqllx .= " `gt_remark` ='$gt_bz' ,";
}
$arr = array("status" => true, "megs" => "修改成功！！");
$megs = "";
if (!empty($sqllx)) {
    $sql1 = "update `goodsType` set " . substr($sqllx, 0, strlen($sqllx) - 1) . " where `gt_id` =$gt_id;";
    $b = $con->execute($sql1);
    if (!$b) {
        $megs .= "类型名修改失败！";
    }
}
if (!empty($uattr)) {
    $b1 = false;
    foreach ($uattr as $key => $value) {
        $b = $con->execute("update `gtAttr` set `gta_name` = '$value' where `gta_id` = $key and `gt_id` = $gt_id;");
        if (!$b) {
            $b1 = TRUE;
        }
    }
    if ($b1) {
        $megs .= "商品属性修改失败！";
    };
}
if (!empty($aattr)) {
    $asql = "";
    foreach ($aattr as $key => $value) {
        $asql .= "($gt_id,'$value'),";
    }
    $b = $con->execute("insert into gtAttr(`gt_id`,`gta_name`) value" . substr($asql, 0, strlen($asql) - 1));
    if (!$b) {
        $megs .= "商品属性添加失败！";
    }
}
if (!empty($uprice)) {
    $b1 = false;
    foreach ($uprice as $key => $value) {
        $b = $con->execute("update `gtAttrPrice` set `gtap_attrName` = '$value' where `gtap_id` = $key and `gt_id` = $gt_id;");
        if (!$b) {
            $b1 = TRUE;
        }
    }
    if ($b1) {
        $megs .= "价格属性修改失败！";
    };
}
if (!empty($aprice)) {
    $asql = "";
    $count = $con->queryLine("select count(`gtap_id`) as `count` from gtattrprice where `gt_id` = $gt_id ");
    $cou = $count['count'];
    if ($cou < 4) {
        foreach ($aprice as $key => $value) {
            $cou++;
            $asql .= "($gt_id,'$value',$cou),";
        }
        $b = $con->execute("insert into gtAttrPrice(`gt_id`,`gtap_attrName`,`gtap_priceName`) value" . substr($asql, 0, strlen($asql) - 1));
        if (!$b) {
            $megs .= "价格属性添加失败！";
        }
    }
}
if (!empty($megs)) {
    $arr = array("status" => flase, "megs" => $megs);
}
echo json_encode($arr);
?>