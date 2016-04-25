<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:07
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class Goods extends Model{
    public function __construct()
    {
        $this->columnName = array('g_id','g_number','g_name','gt_id','g_price'=>'double','g_keywords','g_description','g_img','g_reg','g_status'=>'int','g_text');
        $this->tableName = 'goods';
        $this->tableId = 'g_id';
    }
}