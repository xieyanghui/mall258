<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/26
 * Time: 17:20
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class AuthList extends Model{
    public function __construct()
    {
        $this->columnName = array('al_id','al_key','al_nick','al_remark');
        $this->tableName = 'auth_list';
        $this->modelId ='al_id';
    }
}