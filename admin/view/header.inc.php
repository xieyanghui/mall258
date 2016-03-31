<?php
/**
 * Created by PhpStorm.
 * User: hhh
 * Date: 2016/3/6
 * Time: 12:00
 */
if (!isset($_SESSION)) {session_start();}
header("Content-type:text/html;charset=utf-8");
if (empty($_SESSION['adminInfo'])) {exit(json_encode(array('status'=>false,'megs'=>'登录超时')));}
include_once('../autoload.php');
if(!empty($auth)){
    if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],$auth)){exit(json_encode(array('status'=>false,'megs'=>'权限不够')));}
}
//new Filter(true);
if(!isset($_SERVER['HTTP_REFERER'])){
    $s = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],"/")+1,strrpos($_SERVER['PHP_SELF'],".")-strrpos($_SERVER['PHP_SELF'],"/")-1);
    $f = gui($s,Config::$tree,null);
    exit($f);

}
function gui($s,$arr,$ss){
    foreach ($arr as $key=>$value){
        echo $s.'   key  '.$key ."----value  ".$value."<br>";
        if( $s ==$value){
            return $ss;
        }
        if(is_array($value)){
            return gui($s,$value,$key);
        }
    }
}


