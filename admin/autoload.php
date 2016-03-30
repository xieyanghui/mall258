<?php
include_once('Config.class.php');
spl_autoload_register(function ($classname) {
    if (is_file(dirname($_SERVER['DOCUMENT_ROOT']).'/config/' . $classname . '.class.php')) {
        require_once(dirname($_SERVER['DOCUMENT_ROOT']).'/config/' . $classname . '.class.php');
    }elseif (is_file($_SERVER['DOCUMENT_ROOT']."/".Config::ADMIN_DIR. '/lib/' . $classname . '.class.php')) {
        require_once( $_SERVER['DOCUMENT_ROOT'].'/'.Config::ADMIN_DIR.'/lib/' . $classname . '.class.php');
    } elseif (is_file($_SERVER['DOCUMENT_ROOT'] .'/'. Config::ADMIN_DIR.'/model/' . $classname . '.class.php')) {
        require_once($_SERVER['DOCUMENT_ROOT'] .'/'.Config::ADMIN_DIR. '/model/' . $classname . '.class.php');
    }
});
