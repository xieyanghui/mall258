<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/26
 * Time: 16:21
 */
include_once ('./header.inc.php');
$sma = new Smartys();
include_once ('./top.php');
$page = '//'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?';
$showPage = 15;     //每页数量
$startPage = 1;     //开始页面
$startLimit = 1;    //开始分页
$showLimit = 11;    //分页按钮总数

$g = new Goods();

$where = new Where();

if(!empty($_GET['gt_id'])){
    $where->setWhere('gt_id',$_GET['gt_id']);
    $page .='gt_id='.$_GET['gt_id'].'&';
}
if(!empty($_GET['search'])){
    $where->setWhere('search',$_GET['search']);
    $where->setWhere('searchLine',$_GET['searchLine']);
    $page .='search='.$_GET['search'].'&';
    $page .='searchLine='.$_GET['searchLine'].'&';
}
if(!empty($_GET['sort'])){
    $where->setWhere('sort',$_GET['sort']);
    $where->setWhere('sortLine',$_GET['sortLine']);
    $page .='sort='.$_GET['sort'].'&';
    $page .='sortLine='.$_GET['sortLine'].'&';
}
if(!empty($_GET['startPage'])){
    $startPage = (int)$_GET['startPage'];
}
$where->setLimit (($startPage-1)*$showPage,$showPage);



//print_r($g);
$sma->assign('g',$g->query($where,'g_id,g_number,g_name,g_price,g_img')->toArray());
$countPages = ceil($g->limitLingth ()/$showPage);

if($countPages < $showLimit){  //当总页数小于显示的页数
    $showLimit = $countPages;
}elseif($countPages -$startPage < ceil($showLimit/2) ){//当余下来的页数小于需要显示的页数
    $startLimit = $countPages -$showLimit;
}elseif($startPage+1 >= ceil($showLimit/2) ) {
    $startLimit = ($startPage+1) - ceil($showLimit/2);
}
$sma->assign('top',$top);
$sma->assign('page',$page);
$sma->assign ('showLimit',$showLimit);
$sma->assign ('startPage',$startPage);
$sma->assign ('startLimit',$startLimit);
$sma->assign ('countPages',$countPages);
$sma->display('goodsList.htm');