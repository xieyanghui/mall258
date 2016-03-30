<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
$auth ='systemLog';
include_once("header.inc.php");
$log = new SystemLog();
$columnName = array('sl_key'=>'事件','sl_content'=>'详细内容','a_nick'=>'管理员','sl_date'=>'时间');
$sp = new SearchPage($columnName,$_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($log,'searchSystemLog'),$sp->getParam());
}else{
    $data = call_user_func_array(array($log,'getSystemLog'),$sp->getParam());//  获取全部管理员列表
}

$sma = new Smartys;
$sma->assign('myOptions',$columnName);
$sma->assign('mySelect',$sp->getSearchLine());
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('row' ,$data['data']);
$sma->display('systemLog.htm');