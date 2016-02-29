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
$goods = new Goods();
$columnName = array('g_number'=>'商品编号','g_name'=>'商品名','gt_name'=>'所属类型','g_status'=>'状态','g_reg'=>'添加时间');
$sp = new SearchPage($columnName,$_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($goods,'searchGoods'),$sp->getParam());
}else{
    $data = call_user_func_array(array($goods,'getGoods'),$sp->getParam());//  获取列表
}

$sma = new Smartys;
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('row' ,$data['data']);
$sma->display('goodsInfo.htm');
//function tropeKey($key){
//    switch($key){
//        case '商品编号':
//            return "g_number";
//            break;
//        case '商品名':
//            return  "g_name";
//            break;
//        case '所属类型':
//            return  "gt_name";
//            break;
//        case '状态':
//            return  "g_status";
//            break;
//        case '添加时间':
//            return  "g_reg";
//            break;
//        default:
//            return null;
//            break;
//    }
///**
// * Created by PhpStorm.
// * User: PC-SHITING
// * Date: 2015/11/14
// * Time: 19:10
// */
//if (!isset($_SESSION)) {
//    session_start();
//};
//if (empty($_SESSION['admininfo'])) {
//    exit('登录超时');
//}
//include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
//$mode = new goods();
//$searchSess = "goodsSearch";
//$page = 0;   //当前第几页
//$pageRow = 10; //  每页几行
//$search = "";  //搜索关键字
//$row =null;    //数据表
//$count =null;   //总行数
//$sort = null;  //排序方法
//$sortLine = null;//排序的列
//$searchLine = null;//搜索关键列
//if(!empty($_GET['page'])){
//    $page = (int)$_GET['page'];
//}
//if(!empty($_GET['searchDelete'])){
//    $_SESSION[$searchSess]=null;
//}
//if(!empty($_GET['sort'])){
//    $sort = $_GET['sort'];
//    $sortLine = tropeKey($_GET['sortLine']);
//}
////转义列名
//function tropeKey($key){
//    switch($key){
//        case '商品编号':
//            return "g_number";
//            break;
//        case '商品名':
//            return  "g_name";
//            break;
//        case '所属类型':
//            return  "gt_name";
//            break;
//        case '状态':
//            return  "g_status";
//            break;
//        case '添加时间':
//            return  "g_reg";
//            break;
//        default:
//            return null;
//            break;
//    }
//}
//
//if(!empty($_GET['pageRow'])){
//    $pageRow = (int)$_GET['pageRow'];
//    $_SESSION['pageRow'] = $pageRow;
//}elseif(!empty($_SESSION['pageRow'])){
//    $pageRow = (int)$_SESSION['pageRow'];
//}
//
//if(!empty($_GET['search']) || !empty($_SESSION[$searchSess])){
//    if(empty($_SESSION[$searchSess])){
//        $_SESSION[$searchSess]['key'] = $_GET['search'];
//        $_SESSION[$searchSess]['searchLine'] = tropeKey($_GET['searchLine']);
//    }
//    $search = $_SESSION[$searchSess];
//    $row = $mode->searchGoods($search,$page*$pageRow,$pageRow,$sortLine,$sort);
//    $count = $row[0]['count'];
//}else{
//    $row = $mode->getGoods($page*$pageRow,$pageRow,$sortLine,$sort);
//    $count = $row[0]['count'];
//}
//$goodsTypeList = $mode->getGoodsTypeAll();
////分页
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
//$sma->assign('goodsTypeList',$goodsTypeList);
//$sma->assign('thispath' ,"./inc/goodsInfo.php");
//$sma->display('goodsInfo.htm');