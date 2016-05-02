<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/26
 * Time: 17:19
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class AdminImgSpace extends Model{
    public function __construct()
    {
        $this->columnName = array('ais_id','ais_name','a_id','ais_img_url','ait_id','ais_time');
        $this->tableName = 'admin_img_space';
        $this->modelId ='ais_id';
    }
}