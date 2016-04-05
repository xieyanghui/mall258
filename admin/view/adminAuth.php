<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */

include_once("header.inc.php");
$admin = new Admin();
$table = array(
    'title'=>'管理员权限组',
    'id'=>'aa_id',
    'column'=>array(
        array('name'=>'权限级别','key'=>'aa_nick','width'=>"150"),
        array('name'=>'备注','key'=>'aa_remark','width'=>"200")
    )
);
$sp = new SearchPage($_GET);
$add = array('label'=>'增加权限组','url'=>'/view/adminAuthAU.php');
$delete="/server/adminAuthDeleteSer.php";
$update="/view/adminAuthAU.php";
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($admin,'searchAdminAuth'),$sp->getParam());
}else{
    $data = call_user_func_array(array($admin,'getAdminAuth'),$sp->getParam());//  获取列表
}
$sma = new Smartys;
$sma->assign('table',$table);
$sma->assign('add',$add);
$sma->assign('delete',$delete);
$sma->assign('update',$update);
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('data' ,$data['data']);
$sma->ds('winTable.tpl');

//include_once("header.inc.php");
//$admin = new Admin();
//$columnName = array('aa_remark'=>'备注','aa_nick'=>'权限级别');
//$sp = new SearchPage($columnName,$_GET);
//$data = array();
//if($sp->isSearch()){
//    $data = call_user_func_array(array($admin,'searchAdminAuth'),$sp->getParam());
//}else{
//    $data = call_user_func_array(array($admin,'getAdminAuth'),$sp->getParam());//  获取全部管理员列表
//}
//
//$sma = new Smartys;
//$sma->assign('page', $sp->getPages($data['count']));
//$sma->assign('row' ,$data['data']);
//$sma->display('adminAuth.htm');