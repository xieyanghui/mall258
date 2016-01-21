<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');

/*
 * 商品
 * `g_id` ID
 * `g_number` 商品编号
 * `g_name` 商品名
 * `gt_id` 商品类型ID
 * `g_keywoeds` SEO关键字
 * `g_description` SEO描述
 * `g_sum` 商品数量
 * `g_img` 商品图片路径
 * `g_reg` 商品添加时间
 * `g_status` 商品状态
 * `g_text` 商品描述
 * */

class Goods
{
    function setGoods($arr)
    {
        $sql = "insert into `goods`(`g_number`,`g_name`,`gt_id`,`g_keywoeds`,`g_description`,`g_sum`,`g_img`,`g_text`) valuse($arr['g_number'],'$arr['g_name']',$arr['gt_id'],'$arr['g_keywoeds']','$arr['g_description']',$arr['g_sum'],'$arr['g_img']','$arr['g_text']')";
			$attr = $arr['attr'];
			$price = $arr['price'];
			$attrsql = "insert into `gAttrValue` (`g_id`,`gta_id`,`gav_value`) values ";
			foreach ($attr as $key => $value) {
                $attrsql .= "($g_id,$key ,'$value'),";
            }
			$attrsql = substr($attrsql, 0, strlen($attrsql) - 1);
			
		}

    function updateGoods($arr)
    {

    }

    function getDataGoods($arr)
    {

    }
}

?>