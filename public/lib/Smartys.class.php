<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/public/plugin/smarty/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/plugin/Mobile_Detect.php");
date_default_timezone_set("Asia/Shanghai");

class Smartys extends Smarty
{
    function __construct($local = "")
    {
        parent::__construct();
        $this->config_dir = $_SERVER['DOCUMENT_ROOT'] . '/public/plugin/smarty/configs/';
        $this->template_dir = $_SERVER['DOCUMENT_ROOT'] .'/tplPc/';
        $this->compile_dir = $_SERVER['DOCUMENT_ROOT'] . '/public/plugin/smarty/templates_c/';
        $this->cache_dir = $_SERVER['DOCUMENT_ROOT'] . '/public/plugin/smarty/cache/';
        $this->compile_locking = false;
        $this->left_delimiter = '<{';
        $this->right_delimiter = '}>';
        //$this->assign('sub_page',!empty($GLOBALS['sub_page'])?$GLOBALS['sub_page']:false);
        //$this->assign('sub_args',!empty($GLOBALS['sub_args']) && $GLOBALS['sub_args'] !='?'?$GLOBALS['sub_args']:false);
        $this->assign("HTTP_HOST", 'http://' . $_SERVER['HTTP_HOST']);
        $this->assign("HTTP_MODEL", 'http://' . $_SERVER['HTTP_HOST'].Config::ADMIN_DIR);
        $this->assign("HTTP_FILE", substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],"/")+1,strrpos($_SERVER['PHP_SELF'],".")-strrpos($_SERVER['PHP_SELF'],"/")-1));
    }
}