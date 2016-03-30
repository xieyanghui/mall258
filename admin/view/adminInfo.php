<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */

include_once("header.inc.php");
$admin = new Admin();
$columnName = array('a_name'=>'登录账号','a_nick'=>'姓名','aa_nick'=>'权限级别');
$sp = new SearchPage($columnName,$_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($admin,'searchAdmin'),$sp->getParam());
}else{
    $data = call_user_func_array(array($admin,'getAdmin'),$sp->getParam());//  获取全部
}
$sma = new Smartys;
$sma->assign('myOptions',$columnName);
$sma->assign('mySelect',$sp->getSearchLine());
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('row' ,$data['data']);
$sma->display('adminInfo.htm');