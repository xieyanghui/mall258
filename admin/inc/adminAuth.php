<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
include_once("header.inc.php");
$admin = new Admin();
$columnName = array('aa_remark'=>'备注','aa_nick'=>'权限级别');
$sp = new SearchPage($columnName,$_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($admin,'searchAdminAuth'),$sp->getParam());
}else{
    $data = call_user_func_array(array($admin,'getAdminAuth'),$sp->getParam());//  获取全部管理员列表
}

$sma = new Smartys;
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('row' ,$data['data']);
$sma->display('adminAuth.htm');