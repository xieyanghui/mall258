<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:07
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class GoodsType extends Model{
    public function __construct()
    {
        $this->columnName = array('gt_id','gt_number','gt_name','gt_remark','gt_status');
        $this->tableName = 'goods_type';
        $this->tableId ='gt_id';
    }
}