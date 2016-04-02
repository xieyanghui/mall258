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
    if(!AdminAuth::inAdmin($_SESSION['adminInfo']['a_id'],$auth)){exit(json_encode(array('status'=>false,'megs'=>'权限不够')));}
}
new Filter(true);
$self = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],"/")+1,strrpos($_SERVER['PHP_SELF'],".")-strrpos($_SERVER['PHP_SELF'],"/")-1);
if(!isset($_SERVER['HTTP_REFERER'])){
    if (!empty($f = gui($self,Config::$tree))){
        $f = substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],"/"))."/".$f.".php";
        header("location: //" . $_SERVER['HTTP_HOST'] .$f."?sub_page[]=".$self."&".$_SERVER['QUERY_STRING']);exit();
    }
}
$sub_page = "";
$sub_args="";
if(!empty($_GET['sub_page'])){
    $sub_page =count($_GET['sub_page']) ==1?$_GET['sub_page'][0] :iug($self,$_GET['sub_page'],Config::$tree);
    $start = stripos($_SERVER['QUERY_STRING'],"sub_page[]=".$sub_page."&");
    $sub_args = '?'.substr($_SERVER['QUERY_STRING'],0,$start);
    $sub_args .= substr($_SERVER['QUERY_STRING'],$start+strlen("sub_page[]=".$sub_page."&"));
}
function iug($parent,$sub,$tree){
    foreach ($tree as $key=>$value){
        if((string)$key ==$parent && is_array($value)){
            foreach ($sub as $s){
              if(in_array($s,$value) || array_key_exists($s,$value)){
                    return $s;
              }
            }
        }elseif(is_array($value)){
            if(!empty( $s = iug($parent,$sub,$value))){
                return $s;
            }
        }
    }
}
function gui($s,$arr,$ss = ""){
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
//    foreach ($arr as $key=>&$value){
//        echo "\n".$s.'   key  '.$key ."\n";
//        print_r($value);
//        if((!is_array($value) && $s ==$value) || $s == (string)$key){
//            echo "return  ".$key."\n";
//            return $ss;
//        }elseif(is_array($value)){
//            return gui($s,$value,$key);
//        }
//    }



