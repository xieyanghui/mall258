<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
if (!isset($_SESSION)) {
    session_start();
};
if (empty($_SESSION['admininfo'])) {
    exit('登录超时');
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
$admin = new AdminInfo();
$page = 0;   //当前第几页
$pageRow = 10; //  每页几行
$search = "";  //搜索关键字
$row =null;    //数据表
$count =null;   //总行数
$sort = null;  //排序方法
$sortLine = null;//排序的列
$searchLine = null;//搜索关键列
if(!empty($_GET['page'])){
    $page = (int)$_GET['page'];
}
if(!empty($_GET['searchDelete'])){
    $_SESSION['adminSearch']=null;
}
if(!empty($_GET['sort'])){
    $sort = $_GET['sort'];
    $sortLine = tropeKey($_GET['sortLine']);
}
//转义列名
function tropeKey($key){
    switch($key){
        case '登录账号':
            return "a_name";
            break;
        case '姓名':
            return  "a_nick";
            break;
        case '权限级别':
            return  "aa_nick";
            break;
        default:
            return null;
            break;
    }
}

if(!empty($_GET['pageRow'])){
    $pageRow = (int)$_GET['pageRow'];
    $_SESSION['pageRow'] = $pageRow;
}elseif(!empty($_SESSION['pageRow'])){
    $pageRow = (int)$_SESSION['pageRow'];
}

if(!empty($_GET['search']) || !empty($_SESSION['adminSearch'])){
    if(empty($_SESSION['adminSearch'])){
        $_SESSION['adminSearch']['key'] = $_GET['search'];
        $_SESSION['adminSearch']['searchLine'] = tropeKey($_GET['searchLine']);
    }
    $search = $_SESSION['adminSearch'];
    $row = $admin->searchAdmin($search,$page*$pageRow,$pageRow,$sortLine,$sort);
    $count = $row[0]['count'];
}else{
    $row = $admin->getAdmin($page*$pageRow,$pageRow,$sortLine,$sort); //  获取全部管理员列表
    $count = $admin->adminCounts();   //  获取管理员总数
}
$adminAuth = $admin->getAdminAuth();    //  获取权限组列表


//分页
$pages['page'] = $page;  //
$pages['pageRow'] = $pageRow;  //10
$pages['count'] = (int)$count;  //22
$pages['pagess'] =  5; //
$pages['start'] = 0; //
$pages['search'] = !empty($_SESSION['adminSearch']) ?$_SESSION['adminSearch']['key']:$search;
$pages['countRow'] = ceil($count/$pageRow);
if($pages['countRow'] < $pages['pagess']){  //
    $pages['pagess'] = $pages['countRow'];
}elseif($pages['countRow'] -$page < ceil($pages['pagess']/2) ){
    $pages['start'] = $pages['countRow'] -$pages['pagess'];

}elseif(($page+1) >= ceil($pages['pagess']/2) ) {
    $pages['start'] = ($page+1) - ceil($pages['pagess']/2);
}
$sma = new Smartys;
$sma->assign('pages', $pages);
$sma->assign('row' ,$row);
$sma->assign('defaultImg',Config::ADMIN_HEAD_DEFAULT);
$sma->assign('adminAuth',$adminAuth);
$sma->display('adminInfo.htm');