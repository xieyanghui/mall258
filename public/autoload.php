<?php
spl_autoload_register(function ($classname) {
    $model = substr($_SERVER['PHP_SELF'],0,strpos($_SERVER['PHP_SELF'],'/',1))."";
    if (is_file($_SERVER['DOCUMENT_ROOT'].$model.'/config/' . $classname . '.class.php')) {
        require_once($_SERVER['DOCUMENT_ROOT'].$model.'/config/' . $classname . '.class.php');
    }elseif (is_file($_SERVER['DOCUMENT_ROOT'].$model. '/lib/' . $classname . '.class.php')) {
        require_once( $_SERVER['DOCUMENT_ROOT'].$model.'/lib/' . $classname . '.class.php');
    } elseif (is_file($_SERVER['DOCUMENT_ROOT'].$model.'/model/' . $classname . '.class.php')) {
        require_once($_SERVER['DOCUMENT_ROOT'] .$model. '/model/' . $classname . '.class.php');
    }elseif (is_file($_SERVER['DOCUMENT_ROOT'].'/public/config/' . $classname . '.class.php')) {
        require_once($_SERVER['DOCUMENT_ROOT'].'/public/config/' . $classname . '.class.php');
    }elseif (is_file($_SERVER['DOCUMENT_ROOT'].'/public/lib/' . $classname . '.class.php')) {
        require_once( $_SERVER['DOCUMENT_ROOT'].'/public/lib/' . $classname . '.class.php');
    } elseif (is_file($_SERVER['DOCUMENT_ROOT'] .'/public/model/' . $classname . '.class.php')) {
        require_once($_SERVER['DOCUMENT_ROOT'] .'/public/model/' . $classname . '.class.php');
    }
});
