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
$aa_id = $_GET['name'];
$row = $admin->queryAdminAuth($aa_id);
$authList = $admin->getAuthList();
foreach($authList as $key=> $value){
    if(in_array($value['al_id'] ,$row['auth'])){
        $authList[$key]['checked'] = "checked";
    }else{
        $authList[$key]['checked'] = "";
    }
}
$sma = new Smartys;
$sma->assign('row' ,$row);
$sma->assign('authList',$authList);
$sma->display('sysAuthUpdate.htm');