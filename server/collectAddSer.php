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
    $_GET['g_id'] = explode(',',$_GET['g_id']);
    $goods->query(new Where('g_id',$_GET['g_id']),'g_id,g_name,g_img,g_number');
    if($goods->length() >0){
        if (!empty($_SESSION['user'])) {
            $c = new Collect();
            $where = new Where('g_id',$_GET['g_id']);
            $where->setWhere ('u_id', $_SESSION['user']['u_id']);
            $c->query($where,'g_id');
            $g_id =array();
            foreach ($c as $cs){
                array_push ($g_id,$cs['g_id'] );
            }
            $c = new Collect();
            if(is_array ($_GET['g_id'])){
                $_GET['g_id'] = array_unique($_GET['g_id']);
                $g_ids = array();
                foreach ($_GET['g_id'] as $g_id_n){
                    if(!in_array ($g_id_n, $g_id)){
                        array_push ($g_ids, array('g_id'=>$g_id_n));
                    }
                }
                $c->readArr ($g_ids);
            }elseif(!in_array ($_GET['g_id'], $g_id)){
                $c->set ('g_id',$_GET['g_id']);
            }
            if($c->save('u_id',$_SESSION['user']['u_id']) !== false && !empty($_GET['login'])){
                $c = new Collect();
                $c->query (new Where('u_id',$_SESSION['user']['u_id']),'g_id',array(
                    'Goods'=>array(
                        'noSub'=>'g_id',
                        'columnName'=>'g_name,g_img,g_number',
                        'sibling'=>true
                    )
                ));
                exit(json_encode(array('status'=>true,'megs'=>'收藏成功','goods'=>$c->toArray())));
            }
        }
        exit(json_encode(array('status'=>true,'megs'=>'收藏成功','goods'=>$goods->toArray())));
    }
}elseif(!empty($_SESSION['user']) && !empty($_GET['login'])){
    $c = new Collect();
    $c->query (new Where('u_id',$_SESSION['user']['u_id']),'g_id',array(
        'Goods'=>array(
            'noSub'=>'g_id',
            'columnName'=>'g_name,g_img,g_number',
            'sibling'=>true
        )
    ));
    exit(json_encode(array('status'=>true,'megs'=>'收藏成功','goods'=>$c->toArray())));
}

