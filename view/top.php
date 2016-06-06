<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/6
 * Time: 17:36
 */
include_once ('header.inc.php');
$sma = new Smartys();
if(!empty($_SESSION['user'])){
    $sma->assign('user',$_SESSION['user']);

}
$top = "";
if($sma->tpl_vars['HTTP_FILE'] == 'top'){
    $sma->display('top.htm');
}else{
    $top = $sma->fetch('top.htm');
}
