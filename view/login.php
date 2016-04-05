<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-6
 * Time: 上午4:39
 */
include_once ('header.inc.php');
if(!empty($_SESSION['userInfo'])){
    exit(json_encode(array()));
}