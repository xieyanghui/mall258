<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/26
 * Time: 17:18
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class Admin extends Model{
    public function __construct()
    {
        $this->columnName = array('a_id','a_name','a_pwd',  'a_reg', 'a_img', 'a_nick', 'a_status'=>'int',  'aa_id');
        $this->tableName = 'admin';
        $this->modelId ='a_id';
    }
    
    protected function queryFilter($model)
    {
        if( empty($model['a_img'])){
            $model['a_img'] = Config::ADMIN_HEAD_DEFAULT;
        }
        return $model;

    }

}