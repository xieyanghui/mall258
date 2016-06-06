<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-5-9
 * Time: 上午11:50
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/public/autoload.php');
if (!isset($_SESSION)) {session_start();}
header("Content-type:text/html;charset=utf-8");

if(!empty($_GET['g_id']) && !empty($_SESSION['user'])){
    $c = new Collect();
    $where = new Where('g_id',$_GET['g_id']);
    $where->setWhere ('u_id', $_SESSION['user']['u_id']);
    if($c->remove($where) !== false){
        exit(json_encode(array('status'=>true,'megs'=>'删除成功')));
    }else{
        exit(json_encode(array('status'=>false,'megs'=>'删除失败')));
    }
}

