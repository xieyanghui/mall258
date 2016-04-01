<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/Smarty.class.php');

date_default_timezone_set("Asia/Shanghai");
class Smartys extends Smarty
{
    function __construct($local = "")
    {
        parent::__construct();
        $this->config_dir = $_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/configs/';
//        //判断设备模板
//        if (empty($_SESSION['device'])) {
//            $detect = new Mobile_Detect;
//            $_SESSION['device'] = $detect->isMobile() ? "mobile" : "pc";
//        }
//        // 设置页面目录，前后台，PC移动端分开
//        if ($_SESSION['device'] == 'pc') {
//            if(preg_match("/^\\".Config::ADMIN_DIR."/",$_SERVER['PHP_SELF'])){
//                $this->template_dir = $_SERVER['DOCUMENT_ROOT'] .Config::ADMIN_DIR. '/htmPc/';
//            }else{
//                $this->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/htmPc/';
//            }
//        } elseif ($_SESSION['device'] == 'mobile') {
//            if(preg_match("/^\\".Config::ADMIN_DIR."/",$_SERVER['PHP_SELF'])){
//                $this->template_dir = $_SERVER['DOCUMENT_ROOT'] .Config::ADMIN_DIR. '/htmMobile/';
//            }else{
//                $this->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/htmMobile/';
//            }
//        }
        $this->template_dir = $_SERVER['DOCUMENT_ROOT'] .Config::ADMIN_DIR.'/tplPc/';
        $this->compile_dir = $_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/templates_c/';
        $this->cache_dir = $_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/cache/';
        $this->compile_locking = false;
        $this->left_delimiter = '<{';
        $this->right_delimiter = '}>';
        $this->assign('sub_page',!empty($GLOBALS['sub_page'])?$GLOBALS['sub_page']:false);
        $this->assign('sub_args',!empty($GLOBALS['sub_args']) && $GLOBALS['sub_args'] !='?'?$GLOBALS['sub_args']:false);
        $this->assign("HTTP_HOST", 'http://' . $_SERVER['HTTP_HOST']);
        $this->assign("HTTP_MODEL", 'http://' . $_SERVER['HTTP_HOST'].Config::ADMIN_DIR);
        $this->assign("HTTP_FILE", substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],"/")+1,strrpos($_SERVER['PHP_SELF'],".")-1));
    }
}