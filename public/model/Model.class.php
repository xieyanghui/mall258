<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-8
 * Time: 上午2:54
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
abstract class Model implements Iterator{
    private static $sql_s = null;// 处理事物的数据库连接
    private $sql = null; //  用于连接的数据库
    private $columnType = array('int','string','double');
    private $current =0; //游标
    private $limit = 0; //分页查询时预测总数
    public $sibling = array();
    public $oneLine = array();
    protected $pageS = 0;//分页预计数
    protected $model = array(); //模型数据仓库
    protected $columnName = array(); //数据库列名列表 关联数组KEY 为列名, VALUE为类型,类型默认为 String
    protected $tableName = ''; //表名
    protected $modelId = ''; //Model主键



    //数据库类连接
    protected function getSql(){
        if(Model::$sql_s !== null ){
            return Model::$sql_s;
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


    protected function columnToSqls($columnName){
        if($columnName === '*'){
            $c = array();
            foreach ($this->columnName as $key=>$value){
                if(is_int($key)){//column 为string
                    array_push($c,$value);
                }elseif(is_array($value)){  //column 为array
                    array_push($c," {$value['columnName']}  AS {$key}"); ;
                }elseif(!in_array($value,$this->columnType)){ //column 单带类型
                    array_push($c,"{$value}  AS {$key}");
                }else{
                    array_push($c,$key);
                }
            }
            return $c;
        }
        if(!is_array($columnName)){
            $columnName = explode(',',$columnName);
        }
        foreach ($columnName as &$c){
            $b = $this->columnToSql($c);
            if($c !== $b){
                $c = "{$b}  AS {$c}";
            }
        }
        return $columnName;

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
     *
     * @param $where  Where
     *
     * @return bool
     */
    public function remove(Where $where){
        $where->convertColumn($this->columnName);
        $sql = $this->getSql();
        return $sql->delete($this->tableName,$where);
    }


    /**
     * 开始事务
    */
    public static function startTransaction(){
        Model::$sql_s = new Sql(true);
    }


    /**
     * 提交事务
     */
    public static function commitTransaction(){
        if(!empty(Model::$sql_s)){
            return Model::$sql_s->commit();
        }else{
            return '连接为空';
        }
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
        foreach ($arr as $key=>$v){
            if(!empty($this->columnName[$key]) || in_array($key,$this->columnName)){
                $value[$key] = $v;
            }
        }
        if(!empty(array_filter($value))){
            array_push($this->model,$this->readFilter($value));
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

//    过滤器子类可以实现
    protected function readFilter($model){
        return $model;
    }
    protected function saveFilter($model){
        return $model;
    }

    protected function queryFilter($model){
        return $model;
    }

    /**
     * 保存模型
     *
      * @param $inject array|string 注入值可为空
      *
      * @param $value string 注入值的value可为空
     *
     * @return  int|bool 单个保存返回保存后返回的ID
     *
     */
    public function save($inject = null,$value = null){
        $id = true;
        $sql = $this->getSql();
        foreach ($this->model as $model){
            if(!empty($inject) && is_array($inject)){
                foreach ($inject as $key=>$value){
                    $model[$key] = $value;
                }
            }elseif (!empty($inject) && !empty($value)){
                $model[$inject] = $value;
            }
            $model = $this->saveFilter($model);
            if(!empty($model[$this->modelId])){//修改
                $data = array();
                foreach($model as $key=>$value){
                    if($key === $this->modelId)continue;
                    if(is_a($value,'Model')){
                        $value->save(array($this->modelId=>$model[$this->modelId]));
                    }else{

                        array_push($data,array('columnName'=>$this->columnToSql($key),'value'=>$value,'type'=>$this->columnType($key)));
                    }
                }
                $where = new Where($this->modelId ,$model[$this->modelId]);
                $sql->update($this->tableName,$where->convertColumn($this->columnName),$data);
            }
            else{//增加
                $column = array();
                $data = array();
                $models = array();
                foreach($model as $key=>$value){
                    if(is_a($value,'Model')){
                        array_push($models,$value);
                    }else{
                        $column[$this->columnToSql($key)] =$this->columnType($key);
                        array_push($data,$value);
                    }
                }
                $id =$sql->insert($this->tableName,$column,$data);
               // echo $this->tableName.'--------------'.$id;
                foreach($models as $value){
                 //   print_r($id);
                    $value->save(array($this->modelId=>$id));
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
    public function limitLingth(){
        if($this->limit >0){
            return $this->limit;
        }
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

    public function modelQuery($arr){
        $mm = get_class($this);
        $mm = new $mm;
        foreach ($this->model as $model){
            $b = true;
            foreach ($arr as $key=>$value ){
                if(empty($model[$key]) || $model[$key] !== $value){
                    $b = false;
                    continue;
                }
            }
            if($b){
                foreach ($model as $key =>$value){
                    $mm->set($key,$value);
                }
                $mm->next();
            }
        }
        $mm->sibling = $this->sibling;
        $mm->oneLine = $this->oneLine;
        return $mm;
    }
    
    /**
     * 查询
     *
     * @param $where Where 条件
     *
     * @param $columnName string|array 需要查询的字段
     *
     *@param $subModel string 子类名,可多个 用","隔开 需要子类引用该类的id
     * $subModel子查询 详细配置
     *
     *subModel array 子查询的子查询
     *
     *noSub string 默认是以id去子查询，noSub为Model的列名，设置后就覆盖了ID
     *
     *where Where  另加条件
     *
     *tableName string 查询出来后以该名称代替Model名
     *
     *sibling  bool 如果true 当只有一条子查询记录时，右连接子Model
     *
     *oneLine string 一对多查询时，如果只有一列，可直接汇总成数组
     *
     * @return  Model 链式
     */
    public function query(Where $where,$columnName ='*',$subModel = null){
        $where->convertColumn($this->columnName);
        $sql = $this->getSql();
        $this->model = $sql->selectData($this->tableName,$this->columnToSqls($columnName),$where);
        //过滤器
        foreach ($this->model as &$model){
            $model = $this->queryFilter($model);
        }
        //如果有分页 就统计总数
        if(!empty($where->getLimit())){
            if($this->pageS !== 0){
                $w = $where->getLimit();
                if($this->length() <$w['length']){
                    $this->limit = $w['start'] +$this->length();
                }else{
                    $w['start'] += $w['length'];
                    $w['length'] *= $this->pageS;
                    $where->setLimit($w);
                    $aa = $sql->selectData($this->tableName,$this->columnToSqls($this->modelId),$where);
                    $this->limit = $w['start']+count($aa);
                }
            }else{
                $where->setLimit(array());
                $cou = $sql->selectData($this->tableName,'count(*) as count',$where);
                $this->limit = $cou[0]['count'];
            }


        }
        //子查询
        if(!empty($subModel)){
            $w=array();
            //遍历已查询到的行
            foreach ($this->model as $model){
                array_push($w,$model[$this->modelId]);
            }
            //子查询数组
            if(is_array($subModel)){

                foreach ($subModel as $key=>$value){
                    $m = null;
                    if(is_array($value)){
                        if(!empty($value['sibling'])){ //右连接
                            $this->sibling[$key] =$value['sibling'];
                        }
                        if(!empty($value['oneLine'])){//一对多查询时，如果只有一列，可直接汇总成数组
                            $this->oneLine[$key] =$value['oneLine'];
                        }
                        $m = new $key;
                        //指定子查询的表名
                        $tableName = !empty($value['tableName'])?$value['tableName']:$key;
                        //注入WHERE
                        $where = !empty($value['where'])?$value['where']:new Where();

                        //默认查询全部列
                        if(empty($value['columnName'])){
                            $columnName ='*';
                        }
                        else
                        {
                            //如果是字符串先转成数组
                            if(!is_array($value['columnName']) && $value['columnName'] !== "*"){
                                $value['columnName'] =  explode(',',trim($value['columnName'],','));
                            }
                            //注入自身ID列
                            if(empty($value['noSub'])){
                                if(!in_array($this->modelId,$value['columnName'])){
                                    array_push($value['columnName'],$this->modelId);
                                }
                                //注入指定列
                            }else{
                                if (!in_array($value['noSub'], $value['columnName'])) {
                                    array_push($value['columnName'], $value['noSub']);
                                }
                            }
                            $columnName = $value['columnName'];
                        }


                        //如果子查询里还有子查询
                        $subModel=!empty($value['subModel'])?$value['subModel']:null;

                        //如果是注入了指定列
                        if(!empty($value['noSub'])){
                            $ws = array();
                            foreach ($this->model as $model){
                                array_push($ws,$model[$value['noSub']]);
                            }
                            $where->setWhere($value['noSub'],$ws);
                        }else{
                            $where->setWhere($this->modelId,$w);
                        }
                        //执行子查询
                        $m->query($where,$columnName,$subModel);

                    }
                    //不带参数的子查询
                    else
                    {
                        $m = new $value;$tableName = $value;
                        $m->query(new Where($this->modelId,$w));
                    }

                    //查询出来后分别赋值
                    foreach ($this->model as &$model){
                        if(!empty($value['noSub'])){
                            $model[$tableName] = $m->modelQuery(array($value['noSub']=>$model[$value['noSub']]));
                        }else{
                            $model[$tableName] = $m->modelQuery(array($this->modelId=>$model[$this->modelId]));
                        }
                    }
                }
            }
            //字符串 子查询 不带参数
            else
            {
                $arr = array_filter(explode(',',$subModel));
                $m =null;$mm ='';
                foreach ($arr as $a){
                    $m = new $a;$mm =$a;
                    $m->query(new Where($this->modelId,$w));
                }
                foreach ($this->model as &$model){
                    $model[$mm] = $m->modelQuery(array($this->modelId=>$model[$this->modelId]));

                }
            }

        }
        return $this;
    }


    /**
    */
    public function subQuery($arr){

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
            //print_r($this->model);
            $a = array();
            foreach($model as $key=>$value){
                if(is_a($value,'Model')){
                    if($value->length() ===1 && !empty($this->sibling[get_class($value)])){ //如果是一对一就直接上来
                        $vv = $value->toArray()[0];
                        foreach ($vv as $k=>$v){
                            $a[$k] = $v;
                        }
                    }elseif(!empty($this->oneLine[get_class($value)])){
                        $vv = $value->toArray();
                        $a[$key] = array();
                        foreach ($vv as $v){
                            array_push($a[$key],$v[$this->oneLine[get_class($value)]]);
                        }
                   }else{
                        $a[$key] = $value->toArray();
                    }

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