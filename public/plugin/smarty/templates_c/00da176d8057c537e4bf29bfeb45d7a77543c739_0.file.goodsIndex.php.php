<?php /* Smarty version 3.1.27, created on 2016-05-01 04:02:51
         compiled from "/home/xiehui/work/phpstorm/mall258/admin/view/goodsIndex.php" */ ?>
<?php
/*%%SmartyHeaderCode:94774937057250f6b8f94b8_32911479%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00da176d8057c537e4bf29bfeb45d7a77543c739' => 
    array (
      0 => '/home/xiehui/work/phpstorm/mall258/admin/view/goodsIndex.php',
      1 => 1462046568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94774937057250f6b8f94b8_32911479',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57250f6b904151_40144830',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57250f6b904151_40144830')) {
function content_57250f6b904151_40144830 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '94774937057250f6b8f94b8_32911479';
echo '<?php
';?>/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 19:10
 */
include_once("header.inc.php");
include_once("winTable.inc-php.php");
$im = new IndexModel();
$view['table'] = array(
    'title'=>'首页模块管理',
    'id'=>'ir_id',
    'noSearch'=>true,
    'column'=>array(
        array('name'=>'模块名称','key'=>'im_name','width'=>"150"),
        array('name'=>'模块主题','key'=>'im_class','width'=>"150"),
        array('name'=>'排序','key'=>'im_sort','width'=>"150")
    )
);
$im->query(new Where());
$sma = new Smartys;
$sma->assign('page', getPages($im->limitLingth()));
$sma->assign('data' ,$im->toArray());
$sma->assign('view',$view);
$sma = new Smartys;
$sma->assign('ss',$sma->fetch('winTable.tpl'));
$sma->ds('goodsIndex.php');


<?php }
}
?>