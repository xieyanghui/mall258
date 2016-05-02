<?php
$auth = "goodsAdd";
include_once ("./header.inc.php");
Model::startTransaction();
$goods = new Goods();
$goods->read($_POST);
$ga = new GAttr();
$gp = new GPrice();
foreach ($_POST as $key => $value) {
    if (preg_match("/^attr/",$key) && !empty($value)) {
        $ga->read(array('ga_id'=>substr($key, 4),'ga_value'=>$value));
   }elseif(preg_match("/^a_attr/",$key) && !empty($value)){
        $ga->read(array('gta_id'=>substr($key, 6),'ga_value'=>$value));
    }elseif(preg_match("/^price/",$key) && !empty($value)){
        $gp->read(array('gp_id'=>substr($key, 5),'gp_name'=>$value));
    }elseif(preg_match("/^a_price/",$key) && !empty($value)){
        foreach ($value as $v){
            $gp->read(array('gtp_id'=>substr($key, 7),'gp_name'=>$v));
        }
    }
}
$goods->set('gattr',$ga);
$goods->set('gprice',$gp);

$goods->save();
print_r(Model::commitTransaction());
//$g['g_number'] = !empty($_POST['g_number'])?$_POST['g_number']:null;
//$g['g_id'] = !empty($_POST['g_id'])?$_POST['g_id']:null;
//$g['gt_id'] = !empty($_POST['gt_id'])?$_POST['gt_id']:null;
//$g['g_name'] = !empty($_POST['g_name'])?$_POST['g_name']:null;
//$g['g_price'] = !empty($_POST['g_price'])?$_POST['g_price']:null;
//$g['g_img'] = !empty($_POST['g_img'])?$_POST['g_img']:null;
//$g['g_keywords'] = !empty($_POST['g_keywords'])?$_POST['g_keywords']:null;
//$g['g_description'] = !empty($_POST['g_description'])?$_POST['g_description']:null;
//$g['attr'] = array();
//$g['a_price'] = array();
//$g['u_price'] = array();

//if(!empty($g['g_id'])){
//    unset($g['g_number']); unset($g['gt_id']);
//    if($goods->updateGoods($g,$a_id,"{$_SESSION['adminInfo']['a_nick']} 修改了商品 {$_POST['g_number']}")){
//        exit(json_encode(array("status" => true, "megs" => "修改成功","g_id"=>$g['g_id'])));
//    }else{
//        exit(json_encode(array("status" => false, "megs" => "修改失败")));
//    }
//}else{
//    if($g_id = $goods->addGoods($g,$a_id,"{$_SESSION['adminInfo']['a_nick']} 添加了商品 {$_POST['g_number']}")){
//          exit(json_encode(array("status" => true, "megs" => "添加成功","g_id"=>$g_id)));
//    }
//    exit(json_encode(array("status" => false, "megs" => "添加失败")));
//}
//
