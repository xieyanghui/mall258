<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-5-9
 * Time: 上午11:48
 */

include_once($_SERVER['DOCUMENT_ROOT'].'/public/autoload.php');
if (!isset($_SESSION)) {session_start();}
header("Content-type:text/html;charset=utf-8");

if(!empty($_GET['g_id'])){
    $goods = new Goods();
    $goods->query(new Where('g_id',$_GET['g_id']),'g_id,g_name,g_img');
    if($goods->length() >0){
        if (!empty($_SESSION['user'])) {
            $c = new Collect();
            $c->set('g_id',$_GET['g_id']);
            $c->set('u_id',$_SESSION['user']['u_id']);
            if($c->save());
        }else{
            if(isset($_COOKIE['collect'])){
                setcookie('collect',$_COOKIE['collect'].','.$_GET['g_id'],time()+12000*100,'/');
            }else{
                setcookie('collect',$_GET['g_id'],time()+12000*100,'/');
            }
        }
        exit(json_encode(array('status'=>true,'megs'=>'收藏成功','goods'=>$goods->toArray()[0])));
    }
}

