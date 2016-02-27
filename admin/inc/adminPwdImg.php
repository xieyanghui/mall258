<?php
/**
 *
 * 管理员修改密码头像
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 *
 */
if (!isset($_SESSION)) { session_start();};
if (empty($_SESSION['adminInfo'])) {exit('登录超时');}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
$admin = new Admin();
$a_id = $_SESSION['adminInfo']['a_id'];
$row = $admin->queryAdmin($a_id);
if(count($row) == 0){exit('查无此人');}
if(empty($row['a_img'])){
    $row['a_img'] = Config::ADMIN_HEAD_DEFAULT;
}

$sma = new Smartys;
$sma->assign('row' ,$row);
$sma->display('adminPwdImg.htm');