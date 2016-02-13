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
        $mysqli->query("SET NAMES 'UTF8'");
        $mysqli->query("SET CHARACTER SET UTF8");
        $mysqli->query("SET CHARACTER_SET_RESULTS=UTF8");
        return $mysqli;
    }

    public function updateSqlState($arr, $obj)
    {
        $ser = "";
        foreach ($arr as $key => $value) {
            if(empty($value)){ continue; }
            if ($obj->isInt($key)) {
                $ser .= " `$key` = $value ,";
            } else {
                $ser .= " `$key` = '$value' ,";
            }
        }
        return substr($ser, 0, strlen($ser) - 1);
    }



    //拼装插入语句
    public function addSqlState($arr, $obj)
    {
        $columns = "";
        $values = "";
        foreach ($arr as $key => $value) {
            if(is_array($value)){continue;}
            $columns .= " `$key` ,";
            if ($obj->isInt($key)) {
                $values .= "$value ,";
            } else {
                $values .= "'$value' ,";
            }
        }
        return "(" . substr($columns, 0, strlen($columns) - 1) . ") values (" . substr($values, 0, strlen($values) - 1) . ");";
    }


    //sql字符验证
    public function sqlVerify($value)
    {
        return mysqli_real_escape_string($this,$value);
    }

    //数组验证
    public function arrSqlVerify($arr)
    {
        if(empty($arr)){return $arr;};
        foreach ((array)$arr as $key => $value) {
            if (is_array($value)) {
                $arr[$key] = $this->arrSqlVerif($value);
            }else {
                $arr[$key] = mysqli_real_escape_string($value);
            }
        }
        return $arr;
    }

    /**
     * 执行SQL语句
     * @param string $sql 语句
     *
     * @return  boolean成功返回true失败返回false
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
     * @return   成功返回查询到数据 失败返回false
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
     * @return  boolean 成功返回ID失败返回false
     *
     * */
    public function executeid($sql)
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
     * @return array|bool 成功返回二维数组，失败返回false
     *
     */
    public function select($table,$column,$where){
        $columns="";        //列名集合
        if(is_array($column)){
            foreach($column as $key=> $value){
                $columns .=$key."  ," ;
            }
            $columns =substr($columns,0,strlen($columns)-1);
        }else{
            $columns = $column;
        }

        $str ="SELECT {$columns} FROM {$table} WHERE {$where->getPrepWhere()}";
       // print_r($where->getPrepValue());
        $sql = $this->getConn();
        $sqlStmt = $sql->prepare($str);
        if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($where->getPrepValue()))){
            if(Config::Debug){
                echo '语句或参数错误'.$str;
            }
            $sqlStmt->close();
            $sql->close();
            return false;
        }
        $sqlStmt->execute();
//       $res = $sqlStmt->execute();
//        if(!$res){
//            if(Config::Debug){
//                echo '错误：'.$sqlStmt->error;
//            }
//            $sqlStmt->close();
//            $sql->close();
//            return false;
//        }
        $result = $sqlStmt->get_result();
        $data = array();
        while($r = $result->fetch_assoc()){
            array_push($data,$r);
        }
        $result->close();
        $sqlStmt->free_result();
        $sqlStmt->close();
        $sql->close();
        return $data;
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
        $str ="DELETE FROM  {$table} WHERE {$where->getPrepWhere()}";
        $sql = $this->getConn();
        $sqlStmt = $sql->prepare($str);
        if(!call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($where->getPrepValue()))){
            if(Config::Debug){
                echo '语句或参数错误'.$str;
            }
            $sqlStmt->close();
            $sql->close();
            return false;
        }
        $res = $sqlStmt->execute();
        if($sqlStmt->affected_rows == 0){
            if(Config::Debug){
                echo '错误：没有这条记录';
            }
            $sqlStmt->close();
            $sql->close();
            return false;
        }
//        if(!$res){
//            if(Config::Debug){
//                echo '错误：'.$sqlStmt->error;
//            }
//            $sqlStmt->close();
//            $sql->close();
//            return false;
//        }
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
     * @param $values array 需要修改的字段必须是二维数组，子数组条件必须 columnName，type ，value
     *
     * @return bool 成功返回true，失败返回false
     *
     */
    public function update($table,$where,$values){
        $set = "";
        $type="";
        $arges=array();
        foreach($values as $value){
            $set .=" `{$value['columnName']}` =? ,";
            $type .=substr($value['type'],0,1);
            array_push($arges,$value['value']);
        }
        $vars = $where->getPrepValue();
        $type .= array_shift($vars);
        array_unshift($arges,$type);
        print_r($arges);
        $arges = array_merge($arges,$vars);
        $set =substr($set,0,strlen($set)-1);
        $str ="UPDATE {$table}  SET   {$set} WHERE {$where->getPrepWhere()}";
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
        $sqlStmt->execute();
        if($sqlStmt->affected_rows == 0){
            if(Config::Debug){
                echo '错误：没有修改成功';
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
     * @param $column array 列名,二维数组,子数组 type, columnName
     *
     * @param $data array 需要插入的值,可以是一维数组,也可以是二维的
     *
     * @return bool 成功返回true，失败返回false
     *
     */
    public function insert($table,$column,$data){
        $type="";
        $columns="";
        $wen ="";
        foreach($column as  $value){
            $columns .=  $value['columnName']." ,";
            $wen .="? ,";
            $type .= substr($value['type'],0,1);
        }
        $columns =substr($columns,0,strlen($columns)-1);
        $wen =substr($wen,0,strlen($wen)-1);
        $str ="INSERT INTO {$table} ({$columns}) VALUES ({$wen});";
        echo $str;
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
                    return false;
                }
                break;
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