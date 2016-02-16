<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . "/plugin/Mobile_Detect.php");
date_default_timezone_set("Asia/Shanghai");

class Smartys extends Smarty
{
    function __construct($local = "")
    {
        parent::__construct();
        $this->config_dir = $_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/configs/';
        //判断设备模板
        if (empty($_SESSION['device'])) {
            $detect = new Mobile_Detect;
            $_SESSION['device'] = $detect->isMobile() ? "mobile" : "pc";
        }
        // 设置页面目录，前后台，PC移动端分开
        if ($_SESSION['device'] == 'pc') {
            if(preg_match("/^\\".Config::ADMIN_DIR."/",$_SERVER['PHP_SELF'])){
                $this->template_dir = $_SERVER['DOCUMENT_ROOT'] .Config::ADMIN_DIR. '/htmPc/';
            }else{
                $this->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/htmPc/';
            }
        } elseif ($_SESSION['device'] == 'mobile') {
            if(preg_match("/^\\".Config::ADMINDIR."/",$_SERVER['PHP_SELF'])){
                $this->template_dir = $_SERVER['DOCUMENT_ROOT'] .Config::ADMINDIR. '/htmMobile/';
            }else{
                $this->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/htmMobile/';
            }
        }

        $this->compile_dir = $_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/templates_c/';
        $this->cache_dir = $_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/cache/';
        if ($local != "") {
            $this->template_dir = $_SERVER['DOCUMENT_ROOT'] . $local;
        }
        $this->compile_locking = false;
        $this->left_delimiter = '<{';
        $this->right_delimiter = '}>';
        $this->assign("HTTP_HOST", 'http://' . $_SERVER['HTTP_HOST']);
    }
}