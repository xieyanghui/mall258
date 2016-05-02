<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/26
 * Time: 17:18
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class AdminAuthList extends Model{
    public function __construct()
    {
        $this->columnName = array('aa_id','al_id');
        $this->tableName = 'admin_auth_list';
    }

}