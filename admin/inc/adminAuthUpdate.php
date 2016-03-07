<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
$auth = 'adminAuthUpdate';
include_once("header.inc.php");
$admin = new Admin;
$aa_id = $_GET['name'];
$row = $admin->queryAdminAuth($aa_id);
$authList = $admin->getAuthList();
foreach((array)$authList as $key=> $value){
    if($aa_id==1){$authList[$key]['checked'] = "checked"; continue;}
    if($aa_id==2 || empty($row['auth'])){$authList[$key]['checked'] = ""; continue;}
    if(in_array($value['al_id'],(array)$row['auth'])){
        $authList[$key]['checked'] = "checked";
    }else{
        $authList[$key]['checked'] = "";
    }
}
$sma = new Smartys;
$sma->assign('row' ,$row);
$sma->assign('authList',$authList);
$sma->display('adminAuthUpdate.htm');