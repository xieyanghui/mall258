<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/18
 * Time: 23:02
 */
$auth = "adminAdd";
include_once ("header.inc.php");
$sma = new Smartys;
$admin = new Admin();
$adminAuth = $admin->getAdminAuth(0,100)['data'];
if(!empty($_GET['id'])){
    $row  = $admin->queryAdmin($_GET['id']);
    foreach ($adminAuth as &$value){
        if($value['aa_id'] == $row['aa_id']){
            $value['checked'] = 'checked';
        }
    }
    $sma->assign('row',$row);
}
$sma->assign('adminAuth',$adminAuth);
$sma->assign('ADMIN_HEAD_DEFAULT',Config::ADMIN_HEAD_DEFAULT);
$sma->ds('adminAU.htm');