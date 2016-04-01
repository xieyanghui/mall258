<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');

/*
 *   收藏
 * `c_id` ID
 * `u_id` 用户ID
 * `g_id` 商品ID
 * */

class Collect
{
    //增加收藏
    public function addCollect($u_id, $g_id)
    {
        $sql = new Sql;
        $sql->execute("INSERT INTO `collect`(u_id,g_id) VALUES($u_id,$g_id)");

    }

    //删除收藏
    public function deleteCollect($c_id)
    {
        $sql = new Sql;
        $sql->execute("DELETE FROM `collect`WHERE c_id =$c_id");

    }

    //查询收藏
    public function queryCollect($u_id)
    {
        $sql = new Sql;

    }
}

?>