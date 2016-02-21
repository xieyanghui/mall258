<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    exit('登录超时');
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$admin = new AdminInfo();
$a_id = $_GET['name'];
$row = $admin->queryAdmin($a_id);
$row['a_id'] = $a_id;
$adminAuth = $admin->getAdminAuth();
foreach((array)$adminAuth as $key=> $value){

    if($value['aa_id'] == $row['aa_id']){
        $adminAuth[$key]['checked'] = "checked";
    }else{
        $adminAuth[$key]['checked'] = "";
    }
}
$sma = new Smartys;
$sma->assign('row' ,$row);
$sma->assign('adminAuth',$adminAuth);
$sma->display('adminUpdate.htm');