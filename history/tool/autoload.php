<?php
spl_autoload_register(function ($classname) {
    if (is_file($_SERVER['DOCUMENT_ROOT'] . '/tool/' . $classname . '.class.php')) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/tool/' . $classname . '.class.php');
    } elseif (is_file($_SERVER['DOCUMENT_ROOT'] . '/mode/' . $classname . '.class.php')) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/mode/' . $classname . '.class.php');
    }
});
?>