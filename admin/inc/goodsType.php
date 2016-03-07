<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
include_once("header.inc.php");
$goods = new Goods();
$columnName = array('gt_number'=>'编号','gt_name'=>'商品类型名称','gt_remark'=>'备注');
$sp = new SearchPage($columnName,$_GET);
$data = array();
if($sp->isSearch()){
    $data = call_user_func_array(array($goods,'searchGoodsType'),$sp->getParam());
}else{
    $data = call_user_func_array(array($goods,'getGoodsType'),$sp->getParam());//  获取全部管理员列表
}

$sma = new Smartys;
$sma->assign('page', $sp->getPages($data['count']));
$sma->assign('row' ,$data['data']);
$sma->display('goodsType.htm');
//if(!empty($_GET['pageRow'])){
//    $pageRow = (int)$_GET['pageRow'];
//    $_SESSION['pageRow'] = $pageRow;
//}elseif(!empty($_SESSION['pageRow'])){
//    $pageRow = (int)$_SESSION['pageRow'];
//}
//
//if(!empty($_GET['search']) || !empty($_SESSION['goodsTypeSearch'])){
//    if(empty($_SESSION['goodsTypeSearch'])){
//        $_SESSION['goodsTypeSearch'] = $_GET['search'];
//       // $_SESSION['goodsTypeSearch']['searchLine'] = tropeKey($_GET['searchLine']);
//    }
//    $search = $_SESSION['goodsTypeSearch'];
//    $row = $goods->searchGoodsType($search,$page*$pageRow,$pageRow,$sortLine,$sort);
//    $count = $row[0]['count'];
//}else{
//    $row = $goods->getGoodsType($page*$pageRow,$pageRow,$sortLine,$sort); //  获取全部管理员列表
//    $count = $row[0]['count'];   //  获取管理员总数
//}
////分页
//$pages['page'] = $page;  //
//$pages['pageRow'] = $pageRow;  //10
//$pages['count'] = (int)$count;  //22
//$pages['pagess'] =  5; //
//$pages['start'] = 0; //
//$pages['search'] = !empty($_SESSION['goodsTypeSearch']) ?$_SESSION['goodsTypeSearch']:$search;
//$pages['countRow'] = ceil($count/$pageRow);
//if($pages['countRow'] < $pages['pagess']){  //
//    $pages['pagess'] = $pages['countRow'];
//}elseif($pages['countRow'] -$page < ceil($pages['pagess']/2) ){
//        $pages['start'] = $pages['countRow'] -$pages['pagess'];
//
//}elseif(($page+1) >= ceil($pages['pagess']/2) ) {
//    $pages['start'] = ($page+1) - ceil($pages['pagess']/2);
//}
//
//$sma = new Smartys;
//$sma->assign("count" ,$count);
//$sma->assign('pages', $pages);
//$sma->assign('row' ,$row);
//$sma->assign('thispath' ,"./inc/goodsType.php");
//$sma->display('goodsType.htm');<?php
//if (!isset($_SESSION)) { session_start();};
//if (empty($_SESSION['adminInfo'])) { exit('登录超时');}
//include_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
//$goods = new Goods();
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
//    $_SESSION['goodsTypeSearch']=null;
//}
//if(!empty($_GET['sort'])){
//    $sort = $_GET['sort'];
//    $sortLine = tropeKey($_GET['sortLine']);
//}
////转义列名
//function tropeKey($key){
//    switch($key){
//        case '编号':
//            return "gt_number";
//            break;
//        case '商品类型名称':
//            return  "gt_name";
//            break;
//        case '备注':
//            return  "gt_remark";
//            break;
//        default:
//            return null;
//            break;
//    }
//}
//
//
//if(!empty($_GET['pageRow'])){
//    $pageRow = (int)$_GET['pageRow'];
//    $_SESSION['pageRow'] = $pageRow;
//}elseif(!empty($_SESSION['pageRow'])){
//    $pageRow = (int)$_SESSION['pageRow'];
//}
//
//if(!empty($_GET['search']) || !empty($_SESSION['goodsTypeSearch'])){
//    if(empty($_SESSION['goodsTypeSearch'])){
//        $_SESSION['goodsTypeSearch'] = $_GET['search'];
//       // $_SESSION['goodsTypeSearch']['searchLine'] = tropeKey($_GET['searchLine']);
//    }
//    $search = $_SESSION['goodsTypeSearch'];
//    $row = $goods->searchGoodsType($search,$page*$pageRow,$pageRow,$sortLine,$sort);
//    $count = $row[0]['count'];
//}else{
//    $row = $goods->getGoodsType($page*$pageRow,$pageRow,$sortLine,$sort); //  获取全部管理员列表
//    $count = $row[0]['count'];   //  获取管理员总数
//}
////分页
//$pages['page'] = $page;  //
//$pages['pageRow'] = $pageRow;  //10
//$pages['count'] = (int)$count;  //22
//$pages['pagess'] =  5; //
//$pages['start'] = 0; //
//$pages['search'] = !empty($_SESSION['goodsTypeSearch']) ?$_SESSION['goodsTypeSearch']:$search;
//$pages['countRow'] = ceil($count/$pageRow);
//if($pages['countRow'] < $pages['pagess']){  //
//    $pages['pagess'] = $pages['countRow'];
//}elseif($pages['countRow'] -$page < ceil($pages['pagess']/2) ){
//        $pages['start'] = $pages['countRow'] -$pages['pagess'];
//
//}elseif(($page+1) >= ceil($pages['pagess']/2) ) {
//    $pages['start'] = ($page+1) - ceil($pages['pagess']/2);
//}
//
//$sma = new Smartys;
//$sma->assign("count" ,$count);
//$sma->assign('pages', $pages);
//$sma->assign('row' ,$row);
//$sma->assign('thispath' ,"./inc/goodsType.php");
//$sma->display('goodsType.htm');