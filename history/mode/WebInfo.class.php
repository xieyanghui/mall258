<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');

class WebInfo
{
    function getWebInfo($key)
    {
        $con = new Sql;
        $sql = "select `title` ,`keywords` ,`description` from webInfo where `key` = '" . $key . "'";
        $row = $con->queryLine($sql);
        return $row;
    }

    function setWebInfo($arry)
    {

    }

    function updateWebInfo($arry)
    {

    }
}

?>