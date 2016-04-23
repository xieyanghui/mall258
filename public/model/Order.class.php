<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:49
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class Order extends Model{
    public function __construct()
    {
        $this->columnName = array('o_id','u_id','o_number','o_regtime','o_status'=>'int');
        $this->tableName = 'Order';
        $this->tableId = 'o_id';
    }
}