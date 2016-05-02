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
    public function read($arr)
    {
        $row = array();
        foreach($arr as $key=>$value){
            $value =Xss::RemoveXSS($value);
            if($key ==='u_id'){
                $row['u_id'] = intval($value);
            }
            if($key ==='u_name'){
                $row['u_name'] = $value;
            }
            if($key ==='u_pwd'){
                $row['u_pwd'] = md5($value);
            }
            if($key ==='u_nick'){
                $row['u_nick'] =$value;
            }
            if($key ==='u_phone'){
                $row['u_phone'] = $value;
            }
            if($key ==='u_email'){
                $row['u_email'] = $value;
            }
            if($key ==='u_address'){
                $row['u_address'] = $value;
            }
            if($key ==='u_status'){
                $row['u_status'] = intval($value);
            }
            if($key ==='u_img'){
                $row['u_img'] = $value;
            }
        }
        $this->model[] = $row;
    }
}