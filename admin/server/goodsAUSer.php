<?php
$auth = "goodsAdd";
include_once ("./header.inc.php");
$goods = new Goods();
$g['g_number'] = !empty($_POST['g_number'])?$_POST['g_number']:null;
$g['g_id'] = !empty($_POST['g_id'])?$_POST['g_id']:null;
$g['gt_id'] = !empty($_POST['gt_id'])?$_POST['gt_id']:null;
$g['g_name'] = !empty($_POST['g_name'])?$_POST['g_name']:null;
$g['g_price'] = !empty($_POST['g_price'])?$_POST['g_price']:null;
$g['g_img'] = !empty($_POST['g_img'])?$_POST['g_img']:null;
$g['g_keywords'] = !empty($_POST['g_keywords'])?$_POST['g_keywords']:null;
$g['g_description'] = !empty($_POST['g_description'])?$_POST['g_description']:null;
$g['attr'] = array();
$g['a_price'] = array();
$g['u_price'] = array();
foreach ($_POST as $key => $value) {
    if (strstr($key, "attr") && !empty($value)) {
        $g['attr'][substr($key, 4)] =$value;
    }elseif (strstr($key, "a_price") && !empty($value) && is_array($value)) {
        $g['a_price'][substr($key, 7)] = array();
        foreach ($value as $v) {
            array_push($g['a_price'][substr($key, 7)],$v);
        }
    }elseif (strstr($key, "u_price") && !empty($value)) {
        $g['u_price'][substr($key, 7)] = $value;
    }
}
if(!empty($g['g_id'])){
    unset($g['g_number']); unset($g['gt_id']);
    if($goods->updateGoods($g,$a_id,"{$_SESSION['adminInfo']['a_nick']} 修改了商品 {$_POST['g_number']}")){
        exit(json_encode(array("status" => true, "megs" => "修改成功","g_id"=>$g['g_id'])));
    }else{
        exit(json_encode(array("status" => false, "megs" => "修改失败")));
    }
}else{
    if($g_id = $goods->addGoods($g,$a_id,"{$_SESSION['adminInfo']['a_nick']} 添加了商品 {$_POST['g_number']}")){
          exit(json_encode(array("status" => true, "megs" => "添加成功","g_id"=>$g_id)));
    }
    exit(json_encode(array("status" => false, "megs" => "添加失败")));
}

