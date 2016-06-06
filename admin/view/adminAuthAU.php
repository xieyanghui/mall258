<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/18
 * Time: 23:02
 */
$auth = "adminAuthAdd";
include_once("header.inc.php");
$sma = new Smartys;
$admin = new Admin();
$authList = $admin->getAuthList();
if(!empty($_GET['id'])){
    $aa = $admin->queryAdminAuth($_GET['id']);
    foreach ($authList as &$value){
        if(empty($aa['auth']) &&  $_GET['id'] !='1'){break;}
        if($_GET['id'] =='1' ||in_array($value['al_id'],$aa['auth']) ){
            $value['checked'] = 'checked';
        }
    }
    $sma->assign('row',$aa);
}
$sma->assign('authList',$authList);
$sma->ds('adminAuthAU.htm');