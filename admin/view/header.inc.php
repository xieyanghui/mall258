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
include_once($_SERVER['DOCUMENT_ROOT'].'/public/autoload.php');
if(!empty($auth)){
    if(!Auth::inAdmin($_SESSION['adminInfo']['a_id'],$auth)){exit(json_encode(array('status'=>false,'megs'=>'权限不够')));}
}
new Filter(true);
function gui($s,$arr = null,$ss = ""){
    $arr = !empty($arr)?$arr:Config::$tree;
    while(list($key,$value)= each($arr)) {
        if((!is_array($value) && $s ==$value) || $s == (string)$key){
            return $ss;
        }elseif(is_array($value)){
            if(!empty( $sss = gui($s,$value,$key))){
                return $sss;
            }
        }
    }
}



