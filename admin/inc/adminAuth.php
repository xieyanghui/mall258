<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION['adminInfo'])) {exit('登录超时');}
include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
$admin = new Admin();
$columnName = array('aa_remark'=>'备注','aa_nick'=>'权限级别');
$sp = new SearchPage($columnName,$_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($admin,'searchAdminAuth'),$sp->getParam());
}else{
    $data = call_user_func_array(array($admin,'getAdminAuth'),$sp->getParam());//  获取全部管理员列表
}

$sma = new Smartys;
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('row' ,$data['data']);
$sma->display('adminAuth.htm');
//$admin = new Admin();
//$page = 0;   //当前第几页
//$pageRow = 10; //  每页几行
//$search = "";  //搜索关键字
//$row =null;    //数据表
//$count =null;   //总行数
//$sort = null;  //排序方法
//$sortLine = null;//排序的列
//if(!empty($_GET['page'])){
//    $page = (int)$_GET['page'];
//}
//if(!empty($_GET['searchDelete'])){
//    $_SESSION['adminAuthSearch']=null;
//}
//if(!empty($_GET['sort'])){
//    $sort = $_GET['sort'];
//    switch($_GET['sortLine']){
//        case '备注':
//            $sortLine = "aa_remark";
//            break;
//        case '权限名':
//            $sortLine = "aa_nick";
//            break;
//        default:
//            $sort = null;
//            break;
//    }
//}
//if(!empty($_GET['pageRow'])){
//    $pageRow = (int)$_GET['pageRow'];
//    $_SESSION['pageRow'] = $pageRow;
//}elseif(!empty($_SESSION['pageRow'])){
//    $pageRow = (int)$_SESSION['pageRow'];
//}
//
//if(!empty($_GET['search']) || !empty($_SESSION['adminAuthSearch'])){
//    if(empty($_SESSION['adminAuthSearch'])){
//        $_SESSION['adminAuthSearch'] = $_GET['search'];
//    }
//    $search = $_SESSION['adminAuthSearch'];
//    $row = $admin->searchAdminAuth($search,$page*$pageRow,$pageRow,$sortLine,$sort);
//    $count = $row[0]['count'];
//}else{
//    $row = $admin->getAdminAuth($page*$pageRow,$pageRow,$sortLine,$sort); //  获取全部权限组列表
//    $count = $admin->adminAuthCounts();   //  获取权限组总数
//}
//$authList = $admin->getAuthList();    //  获取权限列表
//$pages['page'] = $page;  //
//$pages['pageRow'] = $pageRow;  //10
//$pages['count'] = (int)$count;  //22
//$pages['pagess'] =  5; //
//$pages['start'] = 0; //
//$pages['search'] = $search;
//$pages['countRow'] = ceil($count/$pageRow);
//if($pages['countRow'] < $pages['pagess']){  //
//    $pages['pagess'] = $pages['countRow'];
//}elseif($pages['countRow'] -$page < ceil($pages['pagess']/2) ){
//    $pages['start'] = $pages['countRow'] -$pages['pagess'];
//
//}elseif(($page+1) >= ceil($pages['pagess']/2) ) {
//    $pages['start'] = ($page+1) - ceil($pages['pagess']/2);
//}
//$sma = new Smartys;
//$sma->assign('pages', $pages);
//$sma->assign('row' ,$row);
//$sma->assign('authList',$authList);
//$sma->display('adminAuth.htm');