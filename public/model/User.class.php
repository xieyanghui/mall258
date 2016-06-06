<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-12
 * Time: 上午12:23
 */

require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class User extends Model{
    public function __construct()
    {
        $this->columnName = array('u_id','u_name','u_pwd','u_phone','u_nick','u_email','u_address','u_img','u_reg','u_status'=>'int');
        $this->tableName = 'user';
        $this->modelId = 'u_id';
    }
}