<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 23:18
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class SystemLog extends Model{
    public function __construct()
    {
        $this->columnName = array('sl_id','a_id','sl_key','sl_content','sl_date');
        $this->tableName = 'system_log';
        $this->tableId = 'sl_id';
    }
}