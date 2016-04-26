<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-8
 * Time: 上午2:54
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
abstract class Model implements Iterator{
    private static $sql_s = null;
    private $sql = null; //  用于连接的数据库
    private $columnType = array('int','string','double');
    private $current =0; //游标
    protected $model = array(); //模型数据仓库
    protected $columnName = array(); //数据库列名列表 关联数组KEY 为列名, VALUE为类型,类型默认为 String
    protected $tableName = ''; //表名
    protected $tableId = ''; //表主键

    //数据库类连接
    protected function getSql(){
        if($this::$sql_s !== null ){
            return $this::$sql_s;
        }
        if($this->sql === null){
            $this->sql = new Sql;
        }
        return $this->sql;
    }
    
    /**
     * Model列名转数据库列名
     *
     * @param $columnName string  Model列名
     *
     *@return string 数据库列名
     *
     * @throws ModelException 没找到抛出异常
     */
    protected function columnToSql($columnName){
        foreach ($this->columnName as $key=>$value){
            if(is_int($key) && $columnName === $value){//column 为string
                return $value;
            }else if($key === $columnName && is_array($value)){  //column 为array
                return $value['columnName'];
            }else if(in_array($value,$this->columnType) && $key ===$columnName ){ //column 单带类型
                return $key;
            }else if($key ===$columnName){
                return $value;
            }
        }
        throw new ModelException("找不到 {$columnName} 所对应的Sql 列");
    }

    /**
     * 数据库取出来的列名转Model
     *
     * @param $columnName string 数据库列名
     *
     *@return string  Model 列名
     *
     * @throws ModelException 没找到抛出异常
    */
    protected function columnToModel($columnName){
        foreach ($this->columnName as $key=>$value){
            if(is_int($key) && $columnName === $value){ //column 为string
                return $value;
            }else if(is_array($value) && $value['columnName'] === $columnName){ //column 为array
                return $key;
            }else if(in_array($value,$this->columnType) && $columnName === $key){
                return $key;
            }else if($columnName === $value ){
                return $key;
            }
        }
        throw new ModelException("找不到 {$columnName} 所对应的Model 列");
    }

    /**
     * 数据库取出来的列名转Model
     *
     * @param $columnName string 数据库列名
     *
     *@return string  Model 列名
     *
     * @throws ModelException 没找到抛出异常
     */
    protected function columnType($columnName){
        try{
            $c = $this->columnToSql($columnName);
            if(preg_match("/_id$/",$c)){
                return 'int';
            }
        }catch(Exception $e){
        }
        foreach ($this->columnName as $key=>$value){
            if(is_int($key) && $columnName === $value){
                return 'string';
            }elseif($columnName ===$key ){
                if(in_array($value,$this->columnType)){
                    return $value;
                }elseif (is_array($value) && !empty($value['type'])){
                    return $value['type'];
                }else{
                    return 'string';
                }
            }
        }
        throw new ModelException("model列 {$columnName} 未定义,或没有确定类型");
    }

    /**
     * 删除表
     */
    protected function remove(Where $where){
        $sql = $this->getSql();
        return $sql->delete($this->tableName,$where);
    }

    public static function startTransaction(){
        
    }

    /**
     * 从数组中读取Model值
     *
     * @param $arr array 数组
     *
     * @return Model 链式用
    */
    public function read($arr){
        $value = array();
        foreach ($arr as $key=>$value){
            foreach($this->columnName as $k=>$v){
                if(($key === $v && is_int($k))||$k === $key){
                    if(!is_array($key)){
                        $value[$key]= $value;
                        continue;
                    }
                }
            }
        }
        if(!empty(array_filter($value))){
            array_push($this->model,$value);
        }
        return $this;
    }

    /**
     * 从多维数组中读取Model值
     *
     * @param $arr array 数组
     *
     * @return Model 链式用
     */
    public function readArr($arr){
        foreach ($arr as $value){
            $this->read($value);
        }
        return $this;
    }


    public function getTableName(){
        return $this->tableName;
    }

    /**
     * 保存模型
     *
     * @param $inject array 注入值可为空
     *
     * @return  int|bool 单个保存返回保存后返回的ID
     *
     */
    public function save($inject = null){
        $id = 0;
        $sql = $this->getSql();
        foreach ($this->model as $model){
            if(!empty($inject)){
                foreach ($inject as $key=>$value){
                    $model[$key] = $value;
                }
            }
            if(!empty($model[$this->tableId])){//修改
                $data = array();
                foreach($model as $key=>$value){
                    if($key === $this->tableId)continue;
                    if(is_a($value,'Model')){
                        $value->save(array($this->tableId,$model[$this->tableId]));
                    }else{
                        array_push($data,array('columnName'=>$key,'value'=>$value,'type'=>$this->columnType($key)));
                    }
                }
                $sql->update($this->tableName,new Where($this->tableId ,$model[$this->tableId],'int'),$data);
            }
            else{//增加
                $column = array();
                $data = array();
                $models = array();
                foreach($model as $key=>$value){
                    if(is_a($value,'Model')){
                        array_push($models,$value);
                    }else{
                        $column[$key] =$this->columnType($key);
                        array_push($data,$value);
                    }
                }
                $id =$sql->insert($this->tableName,$column,$data);
                foreach($models as $value){
                    $value->save(array($this->tableId,$id));
                }
            }
        }
        return $id;
    }

    /**
     * 长度
     *
     *@return int
     */
    public function length(){
        return count($this->model);
    }

    /**
     * 设置当前游标行的值
     *
     * @param $key string 条件
     *
     * @param $value mixed 需要查询的字段
     *
     *@return  Model 链式
     */
    public function set($key,$value){
        $this->model[$this->current][$key] = $value;
        return $this;
    }


    /**
     * 查询
     *
     * @param $where Where 条件
     *
     * @param $columnName string|array 需要查询的字段
     *
     *@param $subModel string 子类名,可多个 用","隔开 需要子类引用该类的id
     *
     * @return  Model 链式
     */
    public function query(Where $where,$columnName ='*',$subModel = ""){
        $sql = $this->getSql();
        $this->model =$sql->selectData($this->tableName,$columnName,$where);
        if(!empty($subModel)){
            foreach ($this->model as &$model){
                $w = new Where($this->tableId,$model[$this->tableId],'int');
                $arr = array_filter(explode(',',$subModel));
                foreach ($arr as $a){
                    $m = new $a;
                    $m->query($w);
                    $model[$a] = $m;
                }
            }
        }
        return $this;
    }


    /**
     * 获取当前游标下的值
     *
     * @param $key string 列名
     *
     * @return 值
    */
    public function get($key){
        if(!$this->valid()){
            $this->current = 0;
        }
        $arr = $this->model[$this->current];
        return $arr[$key];
    }

    public function toArray(){
        $arr = array();
        foreach ($this->model as $model){
            $a = array();
            foreach($model as $key=>$value){
                if(is_a($value,'Model')){
                    $a[$key] = $value->toArray();
                }else{
                    $a[$key] = $value;
                }
            }
            array_push($arr,$a);
        }
        return $arr;
    }
    public function toJson(){
        return json_encode($this->toArray());
    }

    //遍历
    public function rewind() { $this->current =0; }

    public function current() { return $this->model[$this->current]; }

    public function key() { return $this->current; }

    public function next() { return $this->current++;}

    public function valid() { return ($this->current < $this->length()); }

}