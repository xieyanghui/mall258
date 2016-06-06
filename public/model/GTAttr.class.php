<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:06
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class GTAttr extends Model{
    public function __construct()
    {
        $this->columnName = array('gta_id','gt_id','gtat_id','gta_name');
        $this->tableName = 'gt_attr';
        $this->modelId = 'gta_id';
    }
}