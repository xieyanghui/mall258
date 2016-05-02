<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/26
 * Time: 17:19
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class AdminImgType extends Model{
    public function __construct()
    {
        $this->columnName = array('ait_id','ait_name','a_id');
        $this->tableName = 'admin_img_type';
        $this->modelId ='ait_id';
    }
}