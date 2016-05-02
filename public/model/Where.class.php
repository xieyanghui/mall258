<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/1/30
 * Time: 14:56
 */
class Where{
    private $where =array(); //条件集合d
    private $end = "";        //条件后面的语句
    private $prepWhere = "";
    private $prepType ="";
    private $prepValues = array();
    private $isRun = false;//如果run过就不能在set了
    private $columnType = array('int','string','double');
    private $limit = array(); //分页
    private $order = array();//排序
    /**
     * @param $columnName string 列名
     * @param $value string 值
     * @param $type string 列类型,默认string
     * @param $logic string 逻辑,默认AND
     * @param $mark string 操作符,默认'='
    */
    public function __construct($columnName =null,$value = null,$logic = 'AND', $mark = '='){
        if($columnName !=null ){
            $this->setWhere($columnName,$value,$logic , $mark);
        }
    }
    
    /**
     * 设置条件
     * @param $columnName string 列名
     * @param $value string 值
     * @param $type string 列类型,默认string
     * @param $logic string 逻辑,默认AND
     * @param $mark string 操作符,默认'='
     * @return Where 链式
     * @throws Exception
     *
     */
    public function setWhere($columnName =null,$value ,$logic = 'AND', $mark = '='){
        if($this->isRun){
            throw new ModelException("你已经获取过get过了,不能在set了!");
        }
        if($columnName !==null ){
            $wh = array();
            $wh["columnName"] = $columnName;
            $wh["value"]  =empty($value)?'':$value;
            $wh["logic"] = $logic;
            $wh["mark"] = $mark;
            array_push($this->where,$wh);
        }else{
            throw new ModelException("缺少参数!");
        }
        return $this;
    }

    /**
     * 设置子条件
     * @param $key string  组key
     * @param $columnName string 列名
     * @param $value string 值
     * @param $type string 列类型,默认string
     * @param $logic string 逻辑,默认AND
     * @param $mark string 操作符,默认'=-
     * @return Where 链式
     * @throws Exception
 */
    public function setWheres($key,$columnName =null,$value ,$logic = 'AND', $mark = '='){
        if($this->isRun){
            throw new ModelException("你已经获取过get过了,不能在set了!");
        }
        if($columnName !=null ){
            $wh = array();
            $wh["columnName"] = $columnName;
            $wh["value"]  =empty($value)?'':$value;
            $wh["logic"] = $logic;
            $wh["mark"] = $mark;
            if(array_key_exists($key,$wh)){
                throw new ModelException("不能使用关键字做为KEY!");
            }
            if(empty($this->where[$key])){
                $this->where[$key][] =$wh;
            }else{
                array_push($this->where[$key],$wh);
            }

        }else{
            throw new ModelException("缺少参数!");
        }

        return $this;
    }

    /**
     * 设置子条件的逻辑符
     * @param $key string 组key
     * @param $logic string 逻辑,默认AND
     * @return Where 链式
     */
    public function setWheresLogic($key,$logic){
        if(!empty($this->where[$key][0] )){
            $this->where[$key]['logic'] = $logic;
        }
        return $this;
    }

    /**
     * 设置条件后面句子
     *
     * @param $end string
     * @return Where 链式
    */
    public function setWhereEnd($end){
        $this->end .= $end;
        return $this;
    }

    public function setLimit($start,$length =10){
        if(is_array($start)){
            $this->limit = $start;
        }else{
            $this->limit['start']= $start;
            $this->limit['length']= $length;
        }
        return $this;
    }

    public function setOrder($order){
        $this->order = $order;
        return $this;
    }

    //执行转换
    private function run(){
        $where = "";
        $type = "";
        $values = array();
        foreach($this->where as $key=>$value){
            if(!empty($value[0]) && is_array($value[0]) ){//where组
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

                if(is_array($value['value'])){  //如果是数组就In
                    $vs ='(';
                    foreach ($value['value'] as $v){
                        $type .=substr($value['type'],0,1);
                        array_push($values,$v);
                        $vs .='? ,';
                    }
                    $vs = substr($vs,0,strlen($vs)-1).')';
                    $where .="{$value['logic']}  `{$value['columnName']}` IN {$vs} ";
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

        }
        if(strlen($where) >4){
            $this->isRun = true;
            $this->prepWhere =  "WHERE ".(substr($where,4));
            $this->prepType = $type;
            $this->prepValues = $values;
        }
    }
    private function getEnd(){
        $end ='';
        if(!empty($this->order) && is_array($this->order)){
            $ord = ' ORDER BY ';
            foreach ($this->order as $key =>$value){
                if(!is_int($key)){
                    $ord .= "{$key} DESC ,";
                }else{
                    $ord .= "{$value} ,";
                }
            }
            $end .=substr($ord,0,strlen($ord)-1);
        }
        if(!empty($this->limit) && is_array($this->limit)){
            $end .= " limit {$this->limit['start']},{$this->limit['length']}";
        }
        if(!empty($this->end)){
            $end .=$this->end;
        }
        return $end;
    }

    //获取sql语句
    public function getPrepWhere(){
        if(!$this->isRun){$this->run();}
        return $this->prepWhere.$this->getEnd();
    }
    //获取sql语句的类型
    public function getPrepType(){
        if(!$this->isRun){$this->run();}
        return $this->prepType;
    }
    //获取sql语句的值
    public function getPrepValues(){
        if(!$this->isRun){$this->run();}
        return $this->prepValues;
    }
    //获取语句的值参数
    public function getPrepArges(){
        if(!$this->isRun){$this->run();}
        $vs = $this->prepValues;
        array_unshift($vs,$this->prepType);
        return $vs;
    }

    public function getLimit(){
        return $this->limit;
    }
    
    public function convertColumn($arr){
        foreach ($this->where as &$wh){
                if(empty($wh['columnName']) && is_array($wh)){
                    foreach ($wh as &$ws){
                        if(!empty($arr[$ws['columnName']])){
                            if(in_array($arr[$ws['columnName']],$this->columnType)){
                                $ws['type'] = $arr[$ws['columnName']];
                                continue;
                            }elseif(is_array($arr[$ws['columnName']])){
                                $ws['type'] = $arr[$ws['columnName']]['type'];
                                $ws['columnName'] = $arr[$ws['columnName']]['columnName'];
                                continue;
                            }else{

                                if(preg_match('/_id$/',$arr[$ws['columnName']])){
                                    $ws['type'] = 'int';
                                }else{
                                    $ws['type'] = 'string';
                                }
                                $ws['columnName'] = $arr[$ws['columnName']];
                                continue;
                            }
                        }elseif(in_array($ws['columnName'],$arr) && is_int(array_search($ws['columnName'],$arr))){
                            if(preg_match('/_id$/',$ws['columnName'])){
                                $ws['type'] = 'int';
                            }else{
                                $ws['type'] = 'string';
                            }
                            continue;
                        }
                        throw new ModelException("{$wh['columnName']} 不在Model里");
                    }
                }else{
                    if(!empty($arr[$wh['columnName']])){
                        if(in_array($arr[$wh['columnName']],$this->columnType)){
                            $wh['type'] = $arr[$wh['columnName']];
                            continue;
                        }elseif(is_array($arr[$wh['columnName']])){
                            $wh['type'] = $arr[$wh['columnName']]['type'];
                            $wh['columnName'] = $arr[$wh['columnName']]['columnName'];
                            continue;
                        }else{
                            if(preg_match('/_id$/',$arr[$wh['columnName']])){
                                $wh['type'] = 'int';
                            }else{
                                $wh['type'] = 'string';
                            }
                            $wh['columnName'] = $arr[$wh['columnName']];
                            continue;
                        }
                    }elseif(in_array($wh['columnName'],$arr) && is_int(array_search($wh['columnName'],$arr))){
                        if(preg_match('/_id$/',$wh['columnName'])){
                            $wh['type'] = 'int';
                        }else{
                            $wh['type'] = 'string';
                        }
                        continue;
                    }
                    throw new ModelException("{$wh['columnName']} 不在Model里");
                }

            }

        if(!empty($this->order)){
            if(is_array($this->order)){//如果他是数组
                foreach ($this->order as $key=>&$value){
                    if(is_int($key)){ //默认排序方法
                        if(!empty($arr[$value])){
                            if(is_array($arr[$value])){
                                $value =  $arr[$value]['columnName'];
                            }elseif(!empty($arr[$value]) && !in_array($arr[$value],$this->columnType)){
                                $value = $arr[$value];
                            }
                        }
                    }else{//倒序排序
                        if(!empty($arr[$key])){
                            if(is_array($arr[$key])){
                                $this->order[$arr[$key]['columnName']] =$value;
                                unset($this->order[$key]);
                            }
                        }
                    }
                }
            }else{//字符串
                $oa = explode(',',$this->order);
                foreach ($oa as &$value) {
                    if (is_array($arr[$value])) {
                        $value = $arr[$value]['columnName'];
                    } elseif (!empty($arr[$value]) && !in_array($arr[$value], $this->columnType)) {
                        $value = $arr[$value];
                    }
                }
                $this->order = $oa;
            }
        }

        return $this;
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
