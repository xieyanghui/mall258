<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:08
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class GTPrice extends Model{
    public function __construct()
    {
        $this->columnName = array('gtp_id','gt_id','gtp_name');
        $this->tableName = 'gt_price';
        $this->tableId = 'gtp_id';
    }
}