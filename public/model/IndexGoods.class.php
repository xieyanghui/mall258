<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:53
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class IndexGoods extends Model{
    public function __construct()
    {
        $this->columnName = array('ig_id','ig_name','ig_img','ig_label','ig_status'=>'int','g_id','im_id');
        $this->tableName = 'index_goods';
        $this->tableId = 'ig_id';
    }
}