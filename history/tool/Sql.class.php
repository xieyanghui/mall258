<?php

class Sql
{
    //获取连接
    private function getConn()
    {
        return new SaeMysql;
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
    public function sqlVerif($value)
    {
        return mysql_escape_string($value);
    }

    //数组验证
    public function arrSqlVerif($arr)
    {
        if(empty($arr)){return $arr;};
        foreach ((array)$arr as $key => $value) {
            if (is_array($value)) {
                $arr[$key] = $this->arrSqlVerif($value);
            }else {
                $arr[$key] = mysql_escape_string($value);
            }
        }
        return $arr;
    }

    //执行语句
    public function execute($sql)
    {
        $mysql = $this->getConn();
        $mysql->runSql($sql);
        $is = true;
        if ($mysql->errno() != 0) {
            $is = false;
            die("Error:" . $mysql->errmsg());
        }
        $mysql->closeDb();
        return $is;
    }

    //查询返回一行
    public function queryLine($sql)
    {
        $mysql = $this->getConn();
        $row = $mysql->getLine($sql);
        if ($mysql->errno() != 0) {
            die("Error:" . $mysql->errmsg());
        }
        $mysql->closeDb();
        return $row;
    }


    //查询返回多行
    public function queryData($sql)
    {
        $mysql = $this->getConn();
        $row = $mysql->getData($sql);
        if ($mysql->errno() != 0) {
            die("Error:" . $mysql->errmsg());
        }
        $mysql->closeDb();
        return $row;
    }

    public function executeid($sql)
    {
        $mysql = $this->getConn();
        $mysql->runSql($sql);
        $id = $mysql->lastId();
        if ($mysql->errno() != 0) {
            die("Error:" . $mysql->errmsg());
        }
        $mysql->closeDb();
        return $id;
    }

}