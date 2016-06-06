<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/23
 * Time: 23:22
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class UserShipAddress extends Model{
    public function __construct()
    {
        $this->columnName = array('usa_id','u_id','usa_number','usa_consignee','usa_phone');
        $this->tableName = 'user_ship_address';
        $this->modelId = 'usa_id';
    }
}