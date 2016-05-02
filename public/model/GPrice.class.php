<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 16:59
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class GPrice extends Model{

    public function __construct()
    {
        $this->columnName = array('gp_id','g_id','gtp_id','gp_name');
        $this->tableName = 'g_price';
        $this->modelId = 'gp_id';
    }

}