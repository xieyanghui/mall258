<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:03
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class GAttr extends Model{
    public function __construct()
    {
        $this->columnName = array('ga_id','g_id','gta_id','ga_value');
        $this->tableName = 'g_attr';
        $this->tableId ='ga_id';
    }
}