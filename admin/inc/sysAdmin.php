<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
if (!isset($_SESSION)) { session_start();}
if (empty($_SESSION['adminInfo'])) { exit('登录超时');}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
$admin = new Admin();
$columnName = array('a_name'=>'登录账号','a_nick'=>'姓名','aa_nick'=>'权限级别');
$sp = new SearchPage($columnName,$_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($admin,'searchAdmin'),$sp->getParam());
}else{
    $data = call_user_func_array(array($admin,'getAdmin'),$sp->getParam());//  获取全部管理员列表
}
$adminAuth = $admin->getAdminAuth();    //  获取权限组列表
$sp->getPages($data['count']);

$sma = new Smartys;
$sma->assign('pages', $sp->getPages($data['count']));
$sma->assign('row' ,$data['data']);
$sma->assign('defaultImg',Config::ADMIN_HEAD_DEFAULT);
$sma->assign('adminAuth',$adminAuth);
$sma->display('sysAdmin.htm');