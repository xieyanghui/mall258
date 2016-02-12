<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/1/30
 * Time: 14:56
 */
class Where{
    private $where =array();
    public function __construct($column =null,$value = null,$logic = 'AND', $mark = '='){
        if($column !=null && $value != null ){
            $wh = array();
            $wh["column"] = $column;
            $wh["value"] = $value;
            $wh["logic"] = $logic;
            $wh["mark"] = $mark;
            array_push($this->where,$wh);
        }
    }
    public function setWhere($column =null,$value = null,$logic = 'AND', $mark = '='){
        if($column !=null && $value != null ){
            $wh = array();
            $wh["column"] = $column;
            $wh["value"] = $value;
            $wh["logic"] = $logic;
            $wh["mark"] = $mark;
            array_push($this->where,$wh);
        }
    }
    public function toString(){
        $str = "";
        foreach($this->where as $value){

        }
    }
}
