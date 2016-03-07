<?php /* Smarty version 3.1.27, created on 2016-03-01 02:26:54
         compiled from "E:\xampp\mall258\admin\htmPc\menuGoods.htm" */ ?>
<?php
/*%%SmartyHeaderCode:757156d48d6e8c48f1_08970699%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b4195ba452ced968eedab2cc7b826a75faf3dc0' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\menuGoods.htm',
      1 => 1455733310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '757156d48d6e8c48f1_08970699',
  'variables' => 
  array (
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d48d6e8f7440_65156422',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d48d6e8f7440_65156422')) {
function content_56d48d6e8f7440_65156422 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '757156d48d6e8c48f1_08970699';
?>
<div id="menus">
    <ul>
        <?php if ($_smarty_tpl->tpl_vars['auth']->value['goodsType']) {?><li href='./inc/goodsType.php'>商品类型管理</li><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['auth']->value['goodsInfo']) {?><li href='./inc/goodsInfo.php'>商品管理</li><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['auth']->value['goodsRecommend']) {?><li href='./inc/shopRoom.php'>推荐商品管理</li><?php }?>
    </ul>
</div>
<div id='contents'>
</div>
<?php echo '<script'; ?>
>

    $("#menus >ul >li").click(function () {
        $("#contents").load($(this).attr('href'));
    });
<?php echo '</script'; ?>
><?php }
}
?>