<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
$auth='adminAdd';
include_once("header.inc.php");
$admin = new Admin;
$a_id = $_GET['name'];
$row = $admin->queryAdmin($a_id);
$adminAuth = $admin->getAdminAuth()['data'];
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