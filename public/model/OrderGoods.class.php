<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:54
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class OrderGoods extends Model{
    public function __construct()
    {
        $this->columnName = array('og_id','o_id','gpi_id');
        $this->tableName = 'Order_Goods';
        $this->modelId = 'og_id';
    }
}