<?php
spl_autoload_register(function ($classname) {
    if (is_file(dirname($_SERVER['DOCUMENT_ROOT']).'/config/' . $classname . '.class.php')) {
        require_once(dirname($_SERVER['DOCUMENT_ROOT']).'/config/' . $classname . '.class.php');
    }elseif (is_file($_SERVER['DOCUMENT_ROOT'] . '/util/' . $classname . '.class.php')) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/util/' . $classname . '.class.php');
    } elseif (is_file($_SERVER['DOCUMENT_ROOT'] . '/mode/' . $classname . '.class.php')) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/mode/' . $classname . '.class.php');
    }
});
