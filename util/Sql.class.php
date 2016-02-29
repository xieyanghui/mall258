<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
class Sql
{

    //获取连接
    private function getConn()
    {
        $mysqli = new mysqli(ConfigSql::SQL_URL,ConfigSql::SQL_USER,ConfigSql::SQL_PWD,ConfigSql::SQL_DATABASE);
        if (mysqli_connect_errno()){
            die('Unable to connect!'.mysqli_connect_error());
        }
        $mysqli->query("SET NAMES 'utf8'");
        return $mysqli;
    }

//    public function updateSqlState($arr, $obj)
//    {
//        $ser = "";
//        foreach ($arr as $key => $value) {
//            if(empty($value)){ continue; }
//            if ($obj->isInt($key)) {
//                $ser .= " `$key` = $value ,";
//            } else {
//                $ser .= " `$key` = '$value' ,";
//            }
//        }
//        return substr($ser, 0, strlen($ser) - 1);
//    }



    //拼装插入语句
//    public function addSqlState($arr, $obj)
//    {
//        $columns = "";
//        $values = "";
//        foreach ($arr as $key => $value) {
//            if(is_array($value)){continue;}
//            $columns .= " `$key` ,";
//            if ($obj->isInt($key)) {
//                $values .= "$value ,";
//            } else {
//                $values .= "'$value' ,";
//            }
//        }
//        return "(" . substr($columns, 0, strlen($columns) - 1) . ") values (" . substr($values, 0, strlen($values) - 1) . ");";
//    }



    /**
     * 执行SQL语句
     * @param string $sql 语句
     *
     * @return  boolean 成功返回true失败返回false
     *
     * */
    public function execute($sql)
    {
        $mysqli = $this->getConn();
        if($mysqli->query($sql)){
            $mysqli->close();
            return true;
        }else{
            if($mysqli->errno){
                die('执行错误!'.$mysqli->error);
            }
            $mysqli->close();
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
        $mysqli = $this->getConn();
        $re = $mysqli->query($sql);
        if($mysqli->errno){
            die('查询错误!'.$mysqli->error);
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
     *
     * */
    public function queryData($sql)
    {
        $mysqli = $this->getConn();
        $re = $mysqli->query($sql);
        if($mysqli->errno){
            die('查询错误!'.$mysqli->error);
        }
        if(empty($re)){return false;}
        $data = array();
        while($row = $re->fetch_assoc()){
            $data[] = $row;
        }
        $re->close();
        $mysqli->close();
        return $data;
    }

    /**
     * 执行SQL语句
     *
     * @param string $sql 语句
     *
     * @return  int|boolean 成功返回ID失败返回false
     *
     * */
    public function executeId($sql)
    {
        $mysqli = $this->getConn();
        if($mysqli->query($sql)){
            $id = $mysqli->insert_id;
            $mysqli->close();
            return $id;
        }else{
            if($mysqli->errno){
                die('执行错误!'.$mysqli->error);
            }
            $mysqli->close();
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
     * @param $column array|string 列名集合
     *
     * @param $where Where 条件必须是二维数组，子数组条件必须 columnName，type ，value，可选logic，mark
     *
     * @return array|bool 成功返回数组集合，失败返回false
     *
     */
    public function selectData($table,$column,$where){
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
        $sql = $this->getConn();
        $sqlStmt = $sql->stmt_init();
        $sqlStmt->prepare($str);
        //echo $str;
        if($where->getPrepType() ==""){
            $sqlStmt->execute();
        }else{
            if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($where->getPrepArges()))){
                if(Config::Debug){
                    echo '语句或参数错误'.$str;
                }
                $sqlStmt->close();
                $sql->close();
                return false;
            }
            $sqlStmt->execute();
        }
        $result = array();
        $md = $sqlStmt->result_metadata();
        $params = array();
        while($field = $md->fetch_field()) {
            $params[] = &$result[$field->name];
        }
        call_user_func_array(array($sqlStmt,'bind_result'),$params);
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
        $sql->close();
        return $ret;
    }


    /**
     * 执行预编译SQL删除语句
     *
     * @param $table  string 表名
     *
     * @param $where Where 条件必须是二维数组，子数组条件必须 columnName，type ，value，可选logic，mark
     *
     * @return bool 成功返回true，失败返回false
     *
     */
    public function delete($table,$where){
        $str ="DELETE FROM  {$table} {$where->getPrepWhere()}";
        $sql = $this->getConn();
        $sqlStmt = $sql->prepare($str);
        if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($where->getPrepArges()))){
            if(Config::Debug){
                echo '语句或参数错误'.$str;
            }
            $sqlStmt->close();
            $sql->close();
            return false;
        }
        $res = $sqlStmt->execute();
        if(!$res){
            if(Config::Debug){
                echo '错误：'.$sqlStmt->error;
            }
            $sqlStmt->close();
            $sql->close();
            return false;
        }
        $sqlStmt->close();
        $sql->close();
        return true;
    }

    /**
     * 执行预编译SQL修改语句
     *
     * @param $table  string 表名
     *
     * @param $where Where 条件,必须是二维数组，子数组条件必须 columnName，type ，value，可选logic，mark
     *
     * @param $values array 需要修改的字段必须是二维数组，子数组条件必须 columnName，value,可选 type默认string
     *
     * @return bool 成功返回true，失败返回false
     *
     */
    public function update($table,$where,$values){
        $set = "";
        $type="";
        $arges=array();
        foreach($values as $value){
            if(is_array($value)){
                $set .=" `{$value['columnName']}` =? ,";
                if(!empty($value['type'])){
                    $type .=substr($value['type'],0,1);
                }else{
                    $type .='s';
                }
                array_push($arges,$value['value']);
            }else{
                $set .=" `{$values['columnName']}` =? ,";
                if(!empty($values['type'])){
                    $type .=substr($values['type'],0,1);
                }else{
                    $type .='s';
                }
                array_push($arges,$values['value']);
                break;
            }
        }
        $type .= $where->getPrepType();
        array_unshift($arges,$type);
        $arges = array_merge($arges,$where->getPrepValues());
        $set =substr($set,0,strlen($set)-1);
        $str ="UPDATE {$table}  SET   {$set}  {$where->getPrepWhere()}";
        $sql = $this->getConn();
        $sqlStmt = $sql->prepare($str);
        if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($arges))){
            if(Config::Debug){
                echo '语句或参数错误'.$str;
            }
            $sqlStmt->close();
            $sql->close();
            return false;
        }
        $res = $sqlStmt->execute();
//        if($sqlStmt->affected_rows == 0){
//            if(Config::Debug){
//                echo '错误：没有修改成功';
//            }
//            $sqlStmt->close();
//            $sql->close();
//            return false;
//        }
        if(!$res){
            if(Config::Debug){
                echo '错误：'.$sqlStmt->error;
            }
            $sqlStmt->close();
            $sql->close();
            return false;
        }
        $sqlStmt->close();
        $sql->close();
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
        $type="";
        $columns="";
        $wen ="";
        foreach($column as  $key=>$value){
            if(is_int($key)){
                $columns .=  $value." ,";
                $wen .="? ,";
                $type .= 's';
            }else{
                $columns .=  $key." ,";
                $wen .="? ,";
                $type .= substr($value,0,1);
            }
        }
        $columns =substr($columns,0,strlen($columns)-1);
        $wen =substr($wen,0,strlen($wen)-1);
        $str ="INSERT INTO {$table} ({$columns}) VALUES ({$wen});";
        $sql = $this->getConn();
        $sqlStmt = $sql->prepare($str);
        foreach($data as  $value){
            if(is_array($value)){
                array_unshift($value,$type);
                if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($value))){
                    if(Config::Debug){
                        echo '语句或参数错误'.$str;
                    }
                    $sqlStmt->close();
                    $sql->close();
                    return false;
                }
                $res = $sqlStmt->execute();
                if(!$res){
                    if(Config::Debug){
                        echo '错误：'.$sqlStmt->error;
                    }
                    return false;
                }
            }else{
                array_unshift($data,$type);
                if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($data))){
                    if(Config::Debug){
                        echo '语句或参数错误'.$str;
                    }
                    $sqlStmt->close();
                    $sql->close();
                    return false;
                }
                $res = $sqlStmt->execute();
                if(!$res){
                    if(Config::Debug){
                        echo '错误：'.$sqlStmt->error;
                    }
                    $sqlStmt->close();
                    $sql->close();
                    return false;
                }
                $id= $sqlStmt->insert_id;
                $sqlStmt->close();
                $sql->close();
                return $id;
            }
        }
        $sqlStmt->close();
        $sql->close();
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