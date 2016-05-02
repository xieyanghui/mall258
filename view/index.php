<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/5
 * Time: 23:25
 */
include_once ('./header.inc.php');
$sma = new Smartys();
include_once ('./top.php');
$sma->assign('top',$top);
$im = new IndexModel();
$w = new Where();
$w->setOrder(array('im_sort'));
$im->query($w,'*',array(
'IndexGoods'=>array(
        'subModel'=>array(
            'Goods'=>array(
                'noSub'=>'g_id',
                'columnName'=>'g_price,g_img,g_name,g_number',
                'sibling'=>true
            )
        )
    )
));
$im = $im->toArray();
$ro = array_pop($im);
//print_r($im);
$sma->assign('im',$im);
$sma->assign('ro',$ro);
$sma->display('index.htm');