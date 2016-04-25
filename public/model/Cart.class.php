<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:11
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class Cart extends Model{
    public function __construct()
    {
        $this->columnName = array('c_id','u_id','gpi_id','c_sum'=>'int');
        $this->tableName = 'cart';
        $this->tableId ='c_id';
    }
}