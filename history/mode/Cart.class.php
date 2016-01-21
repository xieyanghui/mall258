<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');

/*
 *   购物车
 * `c_id`  购物车ID
 * `u_id`  用户ID
 * `g_id` 商品ID
 * `c_sum` 数量
 * */

class Cart
{

    //增加购物车
    public function addCart($arr)
    {
        $sql = new Sql;
        $values = "";
        foreach ($arr as $value) {
            $values .= "(" . $value['u_id'] . "," . $value['g_id'] . "," . $value['c_sum'] . "),";
        }
        $values = substr($values, 0, strlen($values) - 1);
        $sqls = "insert into `cart` (`u_id`,`g_id`,`c_sum`) values" . $values;
        $sql->execute($sqls);
    }

    //修改购物车数量
    public function updateCart($c_id, $c_sum)
    {
        $sql = new Sql;
        $sql->execute("UPDATE `cart` SET `c_sum` = $c_sum  WHERE `c_id` = $c_id");
    }

    //删除购物车的商品
    public function deleteCart($ids)
    {
        $sql = new Sql;
        foreach ($ids as $id) {
            $sql->execute("DELETE `cart` WHERE c_id = $id");
        }
    }

    public function queryCart($uid)
    {
        $sql = new Sql;
        return $sql->queryData("SELECT * FROM cartInfo WHERE u_id = $uid");
    }
}

?>