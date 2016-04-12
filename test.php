

<?php
/**
 * Created by PhpStorm.
 * User: 谢扬辉
 * Date: 2016/1/22
 * Time: 5:06
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');
header("Content-Type:text/html;charset=utf-8");
//$sql = new Sql();
//echo $sql->executeid("INSERT INTO `authList`(al_key,al_nick,al_remark) VALUES ('aaaa','aaaa','aaaaa')");
//$admin = "xieyanghui' or 'foo' = 'foo' -- ";

//date_default_timezone_set('Asia/Shanghai');
//$pwd = "";
//$sql = new Sql();
//echo date('Y-m-d H:i:s');
//print_r($sql->queryLine("SELECT * FROM `adminInfo` WHERE a_name='{$admin}' AND a_pwd = '{$pwd}'"));
//echo mysql_real_escape_string("...\"\"");
//$sql->insert("authList",array('al_key'=>'s','al_nick'=>'s','al_remark'=>'s'),array(array("111w",'aaaas','gggg'),array("111e",'aaaas','gggg'),array("111t",'aaaas','gggg')));
//$sql->update("authList",array('al_id'=>array('type'=>'int','value'=>'2'),'al_key'=>array('type'=>'sting','value'=>'rrrrrrr')),array('al_nick'=>array('type'=>'sting','value'=>'aaaaaaaa')));
//$sql->delete("authList",array('al_id'=>array('type'=>'int','value'=>'1')));
//$wh = new Where('gt_id','2','int');
//$wh->setWhere('gta_name','品牌');
//echo $wh;
//print_r($sql->select('gt_attr',"*",$wh));
//$admin = new Admin();
//$img = new ImgSpace();
//echo $img->addImgType('从前的',2);
//$img->updateImgSpace(1,'从前dd','sdfsdfsdf',3);
//$img->updateImgSpace(2,'从aaaaadd','sdqqqqqqqqqqqqdfsdf',4);
//print_r($img->getImgType(3));
//print_r($img->getImgSpace(1));
//print_r($admin->getAdmin(0,4));
//$admin->deleteAdmin(2,1);
//echo '------------<br>';
//print_r($admin->getAdmin(0,4));
//echo date("Y-m-d H:i:s",time());
//$admin->updateAdminPwd(1,md5("123456"),"aaa");
//print_r($admin->getAdmin(25,40));
//$admin->searchAdmin(array('searchLine'=>'a_nick','key'=>'谢'),0,2);
//print_r($sql->queryLine("SELECT * FROM `auth_list` WHERE al_id =2"));
//print_r($admin->queryAdmin(2));
//print_r($admin->adminLogin('xieyang3hui',md5('123456'),'111'));
//for($i = 1 ;$i< 30;$i++){
//
//    $admin->addAdmin(array('a_name'=>'aaaa'.$i,'a_pwd'=>'ddddd','a_nick'=>'bbbbb'),1,"测试用的");
//}
//$admin->addAdmin(array('a_name'=>'aaaa','a_pwd'=>'ddddd','a_nick'=>'bbbbb'));
//$admin->updateAdmins(array('a_id'=>'3','a_name'=>'bb','a_pwd'=>'dddsss','a_nick'=>'aaabb'),1);
//$auth = new Auth();
//$auth->inAdmin(2,'admin');
//print_r($admin->searchAdminAuth('管',0,4));
//print_r($admin->getAdminAuth(0,4));
//print_r($admin->getAuthList());
//print_r($admin->queryAdminAuth(4));
//$admin->addAdminAuth('什染发膏么','',array(2,4,5,6,7,8),1,"申毛送的毛");

//$admin->updateAdminAuth(3,'',null,array(2,3,5,6,7,8,9111),1);
//$admin->updateAdminImg(1,"aaaa");
//$goods = new Goods();
//print_r($goods->getGoods(0,6));
//print_r($goods->searchGoods(array('searchLine'=>'g_name','key'=>'一'),0,6));
//print_r($goods->queryGoodsType(1));
//echo dirname($_SERVER['DOCUMENT_ROOT']);
//$a = array('aaa'=>"bb",'cc'=>'dd');
//echo $a['aaa'];
//echo $a;
//$a='hello';
//$hello='a';
//echo $$hello;
//class sample implements Iterator
//
//{
//
//    private $_items = array('aa'=>1,'bb'=>2);
//
//    public function __construct() {
//
//        ;//void
//
//    }
//
//    public function rewind() { reset($this->_items); }
//
//    public function current() { return current($this->_items); }
//
//    public function key() { return key($this->_items); }
//
//    public function next() { return next($this->_items); }
//
//    public function valid() { return ( $this->current() !== false ); }
//
//}

//$sa = new sample();

//foreach($sa as $key => $val){
//
//    print $key . "=>" .$val;
//
//}
//$arr = array('a'=>'aa','b'=>'bb','c'=>'bb');
//$arr[key($arr)]='aaav';
////$a='aav';
//
//print_r($arr);
echo Xss::RemoveXSS("<script language='javascript'>alert('hello world');</script>");
