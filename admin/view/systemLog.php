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
$table = array(
    'title'=>'系统日记',
    'id'=>'sl_id',
    'search'=>true,
    'column'=>array(
        array('name'=>'事件','key'=>'sl_key','width'=>"150"),
        array('name'=>'详细内容','key'=>'sl_content','width'=>"200"),
        array('name'=>'管理员','key'=>'a_nick','width'=>"200"),
        array('name'=>'时间','key'=>'sl_date','width'=>"150")
    )
);
$sp = new SearchPage($_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($log,'searchSystemLog'),$sp->getParam());
}else{
    $data = call_user_func_array(array($log,'getSystemLog'),$sp->getParam());//  获取全部管理员列表
}

$sma = new Smartys;
$sma->assign('table',$table);
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('data' ,$data['data']);
$sma->ds('winTable.tpl');