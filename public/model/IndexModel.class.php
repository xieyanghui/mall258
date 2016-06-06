<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 18:52
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class IndexModel extends Model{
    public function __construct()
    {
        $this->columnName = array('im_id','im_name','im_sort');
        $this->tableName = 'index_model';
        $this->modelId = 'im_id';
    }
}