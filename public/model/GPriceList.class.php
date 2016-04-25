<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:05
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class GPriceList extends Model{
    public function __construct()
    {
        $this->columnName = array('gpi_id','gp_id');
        $this->tableName = 'g_price_list';
    }
}