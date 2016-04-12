<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/16
 * Time: 21:22
 */
if (!isset($_SESSION)) {session_start();}
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
if(empty($_GET['name'])){exit();}
$vali = new ValidateCode();
$vali->doimg();
$_SESSION[$_GET['name']] = $vali->getCode();

