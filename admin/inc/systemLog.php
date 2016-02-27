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
$log = new SystemLog();
$columnName = array('alog_key'=>'事件','alog_content'=>'详细内容','a_name'=>'管理员','date'=>'时间');
$sp = new SearchPage($columnName,$_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($log,'searchSystemLog'),$sp->getParam());
}else{
    $data = call_user_func_array(array($log,'getSystemLog'),$sp->getParam());//  获取全部管理员列表
}

$sma = new Smartys;
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('row' ,$data['data']);
$sma->display('systemLog.htm');