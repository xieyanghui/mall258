<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:11
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class Collect extends Model{
    public function __construct()
    {
        $this->columnName = array('g_id','u_id');
        $this->tableName = 'collect';
    }
}