<?php
$auth = "goodsAdd";
include_once ("./header.inc.php");
Model::startTransaction();
$gpi = new GPriceInfo();
$data = json_decode($_POST['data']);
foreach ($data as $value){
    $gpi->read($value);
    $gpl = new GPriceList();
    $gpl->remove(new Where('gpi_id',$gpi->get('gpi_id')));
    foreach($value->gpl as $gpls){
        $gpl->read(array('gp_id'=>$gpls));
    }
    $gpi->set('gpl',$gpl);
    $gpi->next();
}
$gpi->save();
if(Model::commitTransaction()  ==1){
    exit(json_encode(array("status" => true, "megs" => "保存成功")));
}

exit(json_encode(array("status" => false, "megs" => "保存失败")));