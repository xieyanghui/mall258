<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/17
 * Time: 23:02
 */



$page = !empty($_GET['page'])?(int)$_GET['page']:0;          //开始页面数
if(empty($pageRow)){
    $pageRow =!empty($_GET['pageRow'])?(int)$_GET['pageRow']:10;//每页多少行
}
$sort = !empty($_GET['sort'])?$_GET['sort']:null;            // 排序方式
$sortLine = !empty($_GET['sort'])?$_GET['sortLine']:null;    //排序列名
$search = !empty($_GET['search'])?$_GET['search']:null;      //搜索关键字

$searchLine =!empty($_GET['searchLine'])?$_GET['searchLine']: null ;



$where = new Where();
$where->setLimit($page*$pageRow,$pageRow);
if($search !== null){
    if($searchLine !== null){
        $where->setWhere($searchLine,$search,'AND','LIKE');
    }elseif(function_exists('setSearch')){
        $where = setSearch($where,$search);
    }
}
if($sort !== null ){
    if($sort ==='DESC'){
        $where->setOrder(array($sortLine =>'DESC'));
    }else{
        $where->setOrder(array($sortLine));
    }
}

function getPages($count){
    $page['float'] = '';
    $page['page'] = $GLOBALS['page'];//当前第几页
    $page['pageRow'] = $GLOBALS['pageRow'];  //每页几行
    $page['count'] = (int)$count;  //总行数
    $page['pages'] =  5; //需要显示的页数
    $page['start'] = 0; //开始显示的页数
    $page['countPages'] = ceil($count/$GLOBALS['pageRow']);//总页面数
    $page['search'] = array('searchLine'=>"",'key'=>"");// 搜索
    $page['sort'] = array('sortLine'=>"",'key'=>""); //排序
    if(!empty($_GET['float'])){
        $page['float'] = $_GET['float'];
        $page['url'] = $_SERVER['PHP_SELF'];
    }
    if($GLOBALS['search'] != null){
        $page['search']  = array('searchLine'=>$GLOBALS['searchLine'],'key'=>$GLOBALS['search']);
    }
    if($GLOBALS['sort'] != null){
        $page['sort']  = array('sortLine'=>$GLOBALS['sortLine'],'key'=>$GLOBALS['sort']);
    }
    if($page['countPages'] < $page['pages']){  //当总页数小于显示的页数
        $page['pages'] = $page['countPages'];
    }elseif($page['countPages'] -$GLOBALS['page'] < ceil($page['pages']/2) ){
        $page['start'] = $page['countPages'] -$page['pages'];
    }elseif(($GLOBALS['page']+1) >= ceil($page['pages']/2) ) {
        $page['start'] = ($GLOBALS['page']+1) - ceil($page['pages']/2);
    }
    return $page;
}

