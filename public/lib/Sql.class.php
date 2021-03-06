<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
class Sql
{
    private $is_commit  =false;
    private $conn =null;
    private $err_megs = array();

    function __destruct()
    {
        if(!empty($this->conn)){
            $this->conn->close();
        }
    }
    public function __construct($is_transaction=false)
    {
        if($is_transaction){
            $this->getConn();
            $this->is_commit =true;
            $this->conn->autocommit(false);
        }
    }

    //获取连接
    private function getConn()
    {
        if($this->conn == null){
            $this->conn = new MySQLi(ConfigSql::SQL_URL,ConfigSql::SQL_USER,ConfigSql::SQL_PWD,ConfigSql::SQL_DATABASE);
            if (mysqli_connect_errno()){
                die('Unable to connect!'.mysqli_connect_error());
            }
            $this->conn->query("SET NAMES 'utf8'"); ;
            $this->conn->query("set time_zone = '+8:00'");
        }
        return  $this->conn;
    }

    //提交事务
    public function commit(){
        if($this->is_commit && !empty($this->conn) && count($this->err_megs) === 0 ){
            $this->conn->commit();
            return true;
        }else{
           print_r($this->err_megs);
            return $this->err_megs;
        }
    }

    /**
     * 执行SQL语句
     * @param string $sql 语句
     *
     * @return  boolean 成功返回true失败返回false
     *
     * */
    public function execute($sql)
    {
        if($this->showErr())return false;
        $conn = $this->getConn();
        if($conn->query($sql)){
            return true;
        }else{
            if($conn->errno){
                $this->showErr('执行错误!'.$conn->error);
            }
            return false;
        }
    }

    /**
     *  查询SQL语句 返回首行
     *
     * @param string $sql 语句
     *
     * @return   array|bool 成功返回查询到的首行失败返回false
     *
     * */
    public function queryLine($sql)
    {
        if($this->showErr())return false;
        $conn = $this->getConn();
        $re = $conn->query($sql);
        if($conn->errno){
            $this->showErr('查询错误!'.$conn->error);
        }
        if(empty($re)){return false;}
        $row = $re->fetch_assoc();
        $re->close();
        return $row;
    }


    /**
     *  查询SQL语句 返回多行
     *
     * @param string $sql 语句
     *
     * @return  array|bool 成功返回查询到数据 失败返回false
     * */
    public function queryData($sql)
    {
        if($this->showErr())return false;
        $conn = $this->getConn();
        $re = $conn->query($sql);
        if($conn->errno){
            $this->showErr('执行错误!'.$conn->error);

        }
        if(empty($re)){return false;}
        $data = array();
        while($row = $re->fetch_assoc()){
            $data[] = $row;
        }
        $re->close();
        return $data;
    }

    /**
     * 执行SQL语句返回ID
     *
     * @param string $sql 语句
     *
     * @return  int|boolean 成功返回ID失败返回false
     *
     * */
    public function executeId($sql)
    {
        if($this->showErr())return false;
        $conn = $this->getConn();
        if($conn->query($sql)){
            $id = $conn->insert_id;
            return $id;
        }else{
            if($conn->errno){
                $this->showErr('执行错误!'.$conn->error);
            }
            return false;
        }
    }

    /**
     * 执行预编译SQL查询语句
     *
     * @param $table  string 表名
     *
     * @param $column array|string 列名集合
     *
     * @param $where Where 条件必须是二维数组，子数组条件必须 columnName，type ，value，可选logic，mark
     *
     * @return array|bool 成功返回数组集合，失败返回false
     *
     */
    public function selectLine($table,$column,$where){
        $ret = $this->selectData($table,$column,$where);
        if(!empty($ret)){
            return $ret[0];
        }
        return null;
    }

    /**
     * 执行预编译SQL查询语句
     *
     * @param $table  string 表名
     *
     * @param $column array|string 列名集合,数组字符串都可以
     *
     * @param $where Where 条件必须是二维数组，子数组条件必须 columnName，type ，value，可选logic，mark
     *
     * @return array|bool 成功返回数组集合，失败返回false
     */
    public function selectData($table,$column,$where){
        if($this->showErr())return false;
        $columns="";        //列名集合
        if(is_array($column)){
            foreach($column as  $value){
                $columns .=$value."  ," ;
            }
            $columns =substr($columns,0,strlen($columns)-1);
        }else{
            $columns = $column;
        }
        $str ="SELECT {$columns} FROM {$table} {$where->getPrepWhere()}";
//        echo $str;
//        print_r($where->getPrepArges());
        $conn = $this->getConn();
        $sqlStmt = $conn->stmt_init();
        $sqlStmt->prepare($str);

        if($where->getPrepType() ==""){  //没有参数的查询
            if(!$sqlStmt->execute()){
                $this->showErr('select错误'.$sqlStmt->error);
                $sqlStmt->close();
                return false;
            }
        }else{
            //带参数的查询
            if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($where->getPrepArges()))){
                $this->showErr('语句或参数错误'.$str.'  '.join(',',$where->getPrepArges()));
                $sqlStmt->close();
                return false;
            }
            if(!$sqlStmt->execute()){
                $this->showErr('select错误'.$sqlStmt->error);
                $sqlStmt->close();
                return false;
            }
        }
        $result = array();
        $md = $sqlStmt->result_metadata();
        $params = array();
        while($field = $md->fetch_field()) {
            //  print_r($field);
            $params[] = &$result[$field->name];
        }
        call_user_func_array(array($sqlStmt,'bind_result'),$params);//获取查询的值
        $ret = array();
        while($sqlStmt->fetch()){
            $mf = array();
            foreach($result as $k => $v){
                $mf[$k] = $v;
            }
            $ret[] = $mf;
        }
        $sqlStmt->free_result();
        $sqlStmt->close();
        return $ret;
    }

    private function showErr($str =null){
        if(!empty($str)){
            if($this->is_commit){
                array_push($this->err_megs,$str);
                $this->conn->rollback();
            }elseif(Config::DEBUG){
                die('语句或参数错误'.$str);
            }
        }else{
            if($this->is_commit && count($this->err_megs) > 0 ){
                return true;
            }
        }

    }

    /**
     * 执行预编译SQL删除语句
     *
     * @param $table  string 表名
     *
     * @param $where Where 条件必须是二维数组，子数组条件必须 columnName，type ，value，可选logic，mark
     *
     * @return int|bool 成功返回受影响的行数，失败返回false
     *
     */
    public function delete($table,$where){
        if($this->showErr())return false;
        $str ="DELETE FROM  {$table} {$where->getPrepWhere()}";
        $conn = $this->getConn();
        $sqlStmt = $conn->prepare($str);
        if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($where->getPrepArges()))){
            $this->showErr('语句或参数错误'.$str.'  '.join(',',$where->getPrepArges()));
            $sqlStmt->close();
            return false;
        }
        $res = $sqlStmt->execute();
        if(!$res){
            $this->showErr('delete错误'.$sqlStmt->error);
            $sqlStmt->close();
            return false;
        }
        $ret =  $sqlStmt->affected_rows;
        $sqlStmt->close();
        return $ret;
    }

    /**
     * 执行预编译SQL修改语句
     *
     * @param $table  string 表名
     *
     * @param $where Where 条件,参考Where类
     *
     * @param $values array 需要修改的字段 数组，子数组条件必须 columnName，value, type或者关联数组KEY为值,VALUE为字段名
     *
     * @return bool 成功返回true，失败返回false
     *
     */
    public function update($table,$where,$values){
        if($this->showErr())return false;
        $set = "";
        $type="";
        $arges=array();
        foreach($values as $key=>$value){
            if(is_array($value)){
                $set .= " `{$value['columnName']}` =? ,";
                if (!empty($value['type'])) {
                    $type .= substr($value['type'], 0, 1);
                } else {
                    $type .= 's';
                }
                array_push($arges, $value['value']);
            }else{
                if(isset($values['columnName'])) {
                    $set .= " `{$values['columnName']}` =? ,";
                    $type .= substr($values['type'], 0, 1);
                    array_push($arges, $values['value']);
                    break;
                }else{
                    $type .= 's';
                    $set .=$key.' =? ,';
                    array_push($arges, $value);
                }
            }
        }
        $type .= $where->getPrepType();
        array_unshift($arges,$type);
        $arges = array_merge($arges,$where->getPrepValues());
        $set =substr($set,0,strlen($set)-1);
        $str ="UPDATE {$table}  SET   {$set}  {$where->getPrepWhere()}";
        $conn = $this->getConn();
        $sqlStmt = $conn->prepare($str);
        if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($arges))){
            $this->showErr('语句或参数错误'.$str.'  '.join(',',$arges));
            $sqlStmt->close();
            return false;
        }

        if(!$sqlStmt->execute()){
            $sqlStmt->close();
            $this->showErr('update错误'.$sqlStmt->error);
            return false;
        }
        $sqlStmt->close();
        return true;
    }


    /**
     * 执行预编译SQL插入语句
     *
     * @param $table  string 表名
     *
     * @param $column array 列名,数组,key是列名, value 是类型
     *
     * @param $data array 需要插入的值,可以是一维数组,也可以是二维的
     *
     * @return bool|int 单条成功返回ID,多条成功返回true，失败返回false
     *
     */
    public function insert($table,$column,$data){
        if($this->showErr())return false;
        $type="";$columns="";$wen ="";
        foreach($column as  $key=>$value){//拼装sql字符串 默认为string 凡是后最为 _id 的是int
            $wen .="? ,";
            if(is_int($key)){
                $columns .=  $value." ,";
                if(preg_match("/_id$/",$value)){
                    $type .= 'i';
                }else{
                    $type .= 's';
                }
            }else{
                $columns .=  $key." ,";
                $type .= substr($value,0,1);
            }
        }
        $columns =substr($columns,0,strlen($columns)-1);
        $wen =substr($wen,0,strlen($wen)-1);
        $str ="INSERT INTO {$table} ({$columns}) VALUES ({$wen});";
        $conn = $this->getConn();
        $sqlStmt = $conn->prepare($str);
        foreach($data as  $value){
            if(is_array($value)){//插入多行内容
                array_unshift($value,$type);
                if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($value))){
                    $this->showErr('语句或参数错误'.$str);
                    $sqlStmt->close();
                    return false;
                }
                $res = $sqlStmt->execute();
                if(!$res){
                    $this->showErr('insert错误'.$sqlStmt->error);
                    $sqlStmt->close();
                    return false;
                }
            }else{
                //echo $str;
                array_unshift($data,$type); //单行插入 返回ID
              // print_r($data);
                if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($data))){
                    $this->showErr('语句或参数错误'.$str);
                    $sqlStmt->close();
                    return false;
                }
                $res = $sqlStmt->execute();
                if(!$res){
                    $this->showErr('insert错误'.$sqlStmt->error);
                    $sqlStmt->close();
                    return false;
                }
                $id= $sqlStmt->insert_id;
                $sqlStmt->close();
                //echo $id;
                return $id;
            }
        }
        $sqlStmt->close();
        return true;
    }


    //配合call_user_func_array的参数
    private function refValues($arr){
        if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
            $refs = array();
            foreach($arr as $key => $value){
                $refs[$key] = &$arr[$key];
            }
            return $refs;
        } return $arr;
    }
}