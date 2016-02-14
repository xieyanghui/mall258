<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/1/30
 * Time: 14:56
 */
class Where{
    private $where =array(); //条件集合
    private $close = false;  //如果get过就不能在set了
    private $end = "";        //条件后面的语句
    /**
     * @param $columnName string 列名
     * @param $value string 值
     * @param $type string 列类型,默认string
     * @param $logic string 逻辑,默认AND
     * @param $mark string 操作符,默认'='
    */
    public function __construct($columnName =null,$value = null,$type = 'string',$logic = 'AND', $mark = '='){
        if($columnName !=null ){
            $this->setWhere($columnName,$value,$type ,$logic , $mark);
        }
    }

    /**
     * 设置条件
     * @param $columnName string 列名
     * @param $value string 值
     * @param $type string 列类型,默认string
     * @param $logic string 逻辑,默认AND
     * @param $mark string 操作符,默认'='
     * @throws Exception
     */
    public function setWhere($columnName =null,$value ,$type = 'string',$logic = 'AND', $mark = '='){
        if($this->close){
            throw new Exception("你已经获取过get过了,不能在set了!");
        }
        if($columnName !=null ){
            $wh = array();
            $wh["columnName"] = $columnName;
            $wh['type'] = $type;
            empty($value)?$wh["value"] ='':$wh["value"] = $value;
            $wh["logic"] = $logic;
            $wh["mark"] = $mark;
            array_push($this->where,$wh);
        }else{
            throw new Exception("缺少参数!");
        }
    }

    /**
     * 设置条件后面句子
     *
     * @param $end string
    */
    public function setWhereEnd($end){
        $this->end .= $end;
    }
    public function getPrepWhere(){
        $wh = "";
        foreach($this->where as $key=>$value){

            $wh .="{$value['logic']}  `{$value['columnName']}` {$value['mark']} ?  ";
        }
        $this->close = true;
        if(strlen($wh) >4){
            return "WHERE ".(substr($wh,4).$this->end);
        }
        return $wh.$this->end;
    }

    public function getPrepType(){
        $type = "";
        foreach($this->where as $value){
            $type .=substr($value['type'],0,1);
        }
        $this->close = true;
        return $type;
    }
    public function getPrepValues(){
        $values = array();
        foreach($this->where as $value){
            if($value['mark'] == "LIKE"){
                array_push($values,"%{$value['value']}%");
            }else{
                array_push($values,$value['value']);
            }
        }
        $this->close = true;
        return $values;
    }
    public function getPrepArges(){
        $this->close = true;
        $vs = $this->getPrepValues();
        array_unshift($vs,$this->getPrepType());
        return $vs;
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
