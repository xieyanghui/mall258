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
     * @return   成功返回查询到的首行失败返回false
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
     * 执行SQL预编译语句
     *
     * @param string $sql 预编译语句
     *
     * @param string $type 参数类型
     *
     * @param array $param 参数合集
     *
     * @return  boolean 成功返回ID失败返回false
     *
     * */
    public function executePrep($sql,$type,$param){

    }

    public function insert($table,$column,$arr){
        $type="";
        $columns="";
        $wen ="";
        foreach($column as $key => $value){
            $columns .=  $key." ,";
            $wen .="? ,";
            $type .= $value;
        }
        $columns =substr($columns,0,strlen($columns)-1);
        $wen =substr($wen,0,strlen($wen)-1);
        $str ="INSERT INTO {$table} ({$columns}) VALUES ({$wen});";
        echo $str;
        $sql = $this->getConn();
        $sqlStmt = $sql->prepare($str);
        foreach($arr as  $value){
            if(is_array($value)){
                array_unshift($value,$type);
                call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($value));
                $res = $sqlStmt->execute();
                if(!$res){
                    echo 'error'.$sqlStmt->error;
                }
            }else{
                array_unshift($arr,$type);
                print_r($arr);
                call_user_func_array(array($sqlStmt,"bind_param"),$this->refValues($arr));
                $res = $sqlStmt->execute();
                if(!$res){
                    echo 'error'.$sqlStmt->error;
                }
                break;
            }
        }

        $sqlStmt->close();
        $sql->close();

    }
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