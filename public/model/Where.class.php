<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/1/30
 * Time: 14:56
 */
class Where{
    private $where =array(); //条件集合
    private $end = "";        //条件后面的语句
    private $prepWhere = "";
    private $prepType ="";
    private $prepValues = array();
    private $isRun = false;//如果run过就不能在set了
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
        if($this->isRun){
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
     *
     * 设置子条件
     * @param $key string  组key
     * @param $columnName string 列名
     * @param $value string 值
     * @param $type string 列类型,默认string
     * @param $logic string 逻辑,默认AND
     * @param $mark string 操作符,默认'='
     * @throws Exception
 */
    public function setWheres($key,$columnName =null,$value ,$type = 'string',$logic = 'AND', $mark = '='){
        if($this->isRun){
            throw new Exception("你已经获取过get过了,不能在set了!");
        }
        if($columnName !=null ){
            $wh = array();
            $wh["columnName"] = $columnName;
            $wh['type'] = $type;
            empty($value)?$wh["value"] ='':$wh["value"] = $value;
            $wh["logic"] = $logic;
            $wh["mark"] = $mark;
            if(array_key_exists($key,$wh)){
                throw new Exception("不能使用关键字做为KEY!");
            }
            if(empty($this->where[$key])){
                $this->where[$key][] =$wh;
            }else{
                array_push($this->where[$key],$wh);
            }

        }else{
            throw new Exception("缺少参数!");
        }
    }


    public function setWheresLogic($key,$logic){
        if(!empty($this->where[$key][0] )){
            $this->where[$key]['logic'] = $logic;
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

    private function run(){
        $where = "";
        $type = "";
        $values = array();
        foreach($this->where as $key=>$value){
            if(!empty($value[0]) && is_array($value[0]) ){
                $whs = "";
                foreach($value as $k =>$v){
                    if($k ==='logic'){continue;}
                    $whs .="{$v['logic']}  `{$v['columnName']}` {$v['mark']} ?  ";
                    $type .=substr($v['type'],0,1);
                    if($v['mark'] == "LIKE"){
                        array_push($values,"%{$v['value']}%");
                    }else{
                        array_push($values,$v['value']);
                    }
                }
                $whs = substr($whs,4);
                if(!empty($value['logic'])){
                    $where.= "{$value['logic']} ( {$whs} ) ";
                }else{
                    $where.= "{$value[0]['logic']} ( {$whs} ) ";
                }
            }else{
                if($value['mark'] == "LIKE"){
                    array_push($values,"%{$value['value']}%");
                }else{
                    array_push($values,$value['value']);
                }
                $type .=substr($value['type'],0,1);
                $where .="{$value['logic']}  `{$value['columnName']}` {$value['mark']} ?  ";
            }

        }
        if(strlen($where) >4){
            $this->isRun = true;
            $this->prepWhere =  "WHERE ".(substr($where,4));
            $this->prepType = $type;
            $this->prepValues = $values;
        }
    }
    public function getPrepWhere(){
        if(!$this->isRun){$this->run();}
        return $this->prepWhere.$this->end;
    }

    public function getPrepType(){
        if(!$this->isRun){$this->run();}
        return $this->prepType;
    }
    public function getPrepValues(){
        if(!$this->isRun){$this->run();}
        return $this->prepValues;
    }
    public function getPrepArges(){
        if(!$this->isRun){$this->run();}
        $vs = $this->prepValues;
        array_unshift($vs,$this->prepType);
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
