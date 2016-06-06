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
    'title'=>'管理员列表',
    'id'=>'a_id',
    'search'=>true,
    'column'=>array(
        array('name'=>'登录账号','key'=>'a_name','width'=>"150"),
        array('name'=>'姓名','key'=>'a_nick','width'=>"200"),
        array('name'=>'权限级别','key'=>'aa_nick','width'=>"150")
    )
);
$sp = new SearchPage($_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($admin,'searchAdmin'),$sp->getParam());
}else{
    $data = call_user_func_array(array($admin,'getAdmin'),$sp->getParam());//  获取全部
}
$add = array('label'=>'增加管理员','url'=>'/view/adminAU.php');
$delete="/server/adminDeleteSer.php";
$update="/view/adminAU.php";
$sma = new Smartys;
$sma->assign('table',$table);
$sma->assign('add',$add);
$sma->assign('delete',$delete);
$sma->assign('update',$update);
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('data' ,$data['data']);
$sma->ds('winTable.tpl');