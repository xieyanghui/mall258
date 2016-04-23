<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/22
 * Time: 18:13
 */
include_once ('./header.inc.php');
$sma = new Smartys();
$number = $_GET['id'];
include_once ('./top.php');
$g = new Goods();
$g->query(new Where('g_number',$number),'*',"GAttr,GPrice");

if($gt_id = $g->get('gt_id')){
    $where_gt = new Where('gt_id',$gt_id);

    $where = new Where('g_id',$g->get('g_id'),'int');
    $gpi = new GPriceInfo();
    $gpi->query($where,'*',"GPriceList");
    foreach($gpi as $gp){
        print_r($gp['GPriceList']);
    }
}else{

}


//print_r($g->get('g_number'));
//$sma->assign('top',$top);
//$sma->display('goods.htm');