<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-29
 * Time: 上午4:16
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class GTAttrType extends Model{
    public function __construct()
    {
        $this->columnName = array('gtat_id','gtat_name','gt_id');
        $this->tableName = 'gt_attr_type';
        $this->modelId = 'gtat_id';
    }
}