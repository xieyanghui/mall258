<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');

/*
 *   管理员信息
 * `a_id` 管理员ID
 * `a_name` 管理员账号
 * `a_pwd` 管理员密码
 * `a_reg` 添加日期
 * `a_img`  头像路径
 * `a_nick` 管理员姓名
 *
 * */

class AdminInfo
{
    //返回总行数
    public function counts()
    {
        $sql = new Sql;
        $sqls = "SELECT COUNT(a_id) as count FROM `adminInfo`";
        $row = $sql->queryLine($sqls);
        return $row['count'];
    }

    /*
     * 查询管理员信息
     * $start 开始行
     * $sum  去多少行
     * $sortline 排序列
     * $sort 排序方法
     * */
    public function queryDataAdmin($start, $sum, $sortline, $sort)
    {
        $sql = new Sql;
        $sqls = "SELECT `a_name`,`a_reg`,`a_auth`,`a_img`,`a_nick` FROM `adminInfo` ORDER BY `$sortline` $sort   limit $start,$sum";
        return $sql->queryData($sqls);
    }

    //查询单个管理员信息
    public function queryLineAdmin($id)
    {
        $sql = new Sql;
        $id = $sql->sqlVerif($id);
        $sqls = "SELECT `a_name`,`a_reg`,`a_auth`,`a_img`,`a_nick` FROM `adminInfo` WHERE `a_id` = $id";
        return $sql->queryLine($sqls);
    }

    //判断是否是数字，以便值是否加‘’;
    public function isInt($column)
    {
        if ($column == "a_id") {
            return true;
        }
        return FALSE;
    }

    //管理员登陆
    public function login($name, $pwd, $aip)
    {
        $sql = new Sql;
        $name = $sql->sqlVerif($name);
        $pwd = $sql->sqlVerif($pwd);
        $row = $sql->queryLine("SELECT `a_id` ,`a_nick` `a_logintime`,`aa_id` FROM `adminInfo` WHERE `a_name` = '$name' and `a_pwd` ='$pwd'");
        if (count($row) > 1) {
            $sql->execute("INSERT INTO `adminloginlog`(a_id,ip) VALUES (" . $row['a_id'] . ",'" . $aip . "')");
            $auth = $sql->queryData("SELECT `al_id` FROM `adminauthlist` WHERE `aa_id` = " . $row['aa_id']);
            foreach ($auth as $value) {
                $row['auth'][] = $value['al_id'];
            }
            return $row;
        } else {
            return null;
        }
    }

    //增加管理员
    public function addAdmin($arr)
    {
        $sql = new Sql;
        $arr = $sql->arrSqlVerif($arr);
        $sqls = "INSERT INTO adminInfo" . $sql->addSqlState($arr, $this);
        return $sql->execute($sqls);
    }

    //修改管理员信息
    public function updateAdmin($arr, $id)
    {
        $sql = new Sql;
        $arr = $sql->arrSqlVerif($arr);
        $sqls = "UPDATE `adminInfo` SET " . $sql->updateSqlState($arr, $this) . " WHERE a_id = $id;";
        return $sql->execute($sqls);
    }


}

?>