<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 22:55
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class GPriceInfo extends Model{
    public function __construct()
    {
        $this->columnName = array('gpi_id','g_id','gpi_img','gpi_sum'=>'int','gpi_price'=>'double');
        $this->tableName = 'g_price_info';
        $this->modelId = 'gpi_id';
    }
}