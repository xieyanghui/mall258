<?php
/**
 * Created by PhpStorm.
 * User: 谢扬辉
 * Date: 2016/1/22
 * Time: 5:06
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/util/autoload.php');
header("Content-Type:text/html;charset=utf-8");
//$sql = new Sql();
//echo $sql->executeid("INSERT INTO `authList`(al_key,al_nick,al_remark) VALUES ('aaaa','aaaa','aaaaa')");
$admin = "xieyanghui' or 'foo' = 'foo' -- ";


//$pwd = "";
$sql = new Sql();
//print_r($sql->queryLine("SELECT * FROM `adminInfo` WHERE a_name='{$admin}' AND a_pwd = '{$pwd}'"));
//echo mysql_real_escape_string("...\"\"");
//$sql->insert("authList",array('al_key'=>'s','al_nick'=>'s','al_remark'=>'s'),array(array("111w",'aaaas','gggg'),array("111e",'aaaas','gggg'),array("111t",'aaaas','gggg')));
//$sql->update("authList",array('al_id'=>array('type'=>'int','value'=>'2'),'al_key'=>array('type'=>'sting','value'=>'rrrrrrr')),array('al_nick'=>array('type'=>'sting','value'=>'aaaaaaaa')));
//$sql->delete("authList",array('al_id'=>array('type'=>'int','value'=>'1')));
//$wh = new Where('gt_id','2','int');
//$wh->setWhere('gta_name','品牌');
//echo $wh;
//print_r($sql->select('gt_attr',"*",$wh));
$admin = new Admin();
//$admin->updateAdminPwd(1,md5("123456"),"aaa");
//print_r($admin->getAdmin(1,4));
//$admin->searchAdmin(array('searchLine'=>'a_nick','key'=>'谢'),0,2);
//print_r($admin->queryAdmin(2));
//print_r($admin->adminLogin('xieyanghui',md5('123456'),'111'));
//$admin->addAdmin(array('a_name'=>'aaaa','a_pwd'=>'ddddd','a_nick'=>'bbbbb'));
$admin->updateAdmins(array('a_id'=>'3','a_name'=>'bbb','a_pwd'=>'dddsss','a_nick'=>'aaabb'),1);
$auth = new Auth();
//$auth->inAdmin(2,'admin');