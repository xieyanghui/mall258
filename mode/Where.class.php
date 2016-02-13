<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/1/30
 * Time: 14:56
 */
class Where{
    private $where =array(),$close = false;
    public function __construct($columnName =null,$value = null,$type = 'string',$logic = 'AND', $mark = '='){
        $this->setWhere($columnName,$value,$type ,$logic , $mark);
    }

    public function setWhere($columnName =null,$value = null,$type = 'string',$logic = 'AND', $mark = '='){
        if($this->close){
            throw new Exception("你已经获取过get过了,不能在set了!");
        }
        if($columnName !=null && $value != null ){
            $wh = array();
            $wh["columnName"] = $columnName;
            $wh['type'] = $type;
            $wh["value"] = $value;
            $wh["logic"] = $logic;
            $wh["mark"] = $mark;
            array_push($this->where,$wh);
        }else{
            throw new Exception("缺少参数!");
        }
    }
    public function getPrepWhere(){
        $wh = "";
        foreach($this->where as $value){
            $wh .="{$value['logic']}  `{$value['columnName']}` {$value['mark']} ?  ";
        }
        $this->close = true;
        return substr($wh,4);
    }

    public function getPrepType(){
        $type = "";
        foreach($this->where as $value){
            $type .=substr($value['type'],0,1);
        }
        $this->close = true;
        return $type;
    }
    public function getPrepValue(){
        $arges = array();
        foreach($this->where as $value){
            array_push($arges,$value['value']);
        }
        $this->close = true;
        array_unshift($arges,$this->getPrepType());
        return $arges;
    }
    public function __toString(){
        $str = "";
        foreach($this->where as $value){
            if(substr($value['type'],0,1) == 'i' || substr($value['type'],0,1) == 'd'){
                $str .="{$value['logic']}  `{$value['columnName']}` {$value['mark']} {$value['value']} ";
            }else{
                $str .="{$value['logic']}  `{$value['columnName']}` {$value['mark']} '{$value['value']}'  ";
            }
        }

        return substr($str,4);
    }
}
