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
    
    protected function filter($model)
    {
        if(!empty($model[0])){//查询时调用
            foreach ($model as &$value){
                if(empty($value['a_img'])){
                    $value['a_img'] = Config::ADMIN_HEAD_DEFAULT;
                }
            }
        }else{ //入库时调用
            if($model['a_img'] === Config::ADMIN_HEAD_DEFAULT){
                unset($model['a_img']);
            }
        }
        return $model;

    }

}