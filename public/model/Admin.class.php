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
        $this->columnName = array(
            'aId'=>'a_id',
            'aName'=>'a_name',
            'aPwd'=>'a_pwd',
            'aReg'=>'a_reg',
            'aImg'=>'a_img',
            'aNick'=>'a_nick',
            'aStatus'=>array('type'=>'int','columnName'=>'a_status'),
            'AaId'=>'aa_id');
        $this->tableName = 'admin';
        $this->tableId ='a_id';
    }
    public function test(){
        echo parent::$ss;

    }
}