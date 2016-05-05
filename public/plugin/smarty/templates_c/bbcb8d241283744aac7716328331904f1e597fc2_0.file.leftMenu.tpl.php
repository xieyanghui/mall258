<?php /* Smarty version 3.1.27, created on 2016-04-30 03:57:38
         compiled from "/home/xiehui/work/phpstorm/mall258/admin/tplPc/leftMenu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17857995585723bcb2d6eed5_91342509%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbcb8d241283744aac7716328331904f1e597fc2' => 
    array (
      0 => '/home/xiehui/work/phpstorm/mall258/admin/tplPc/leftMenu.tpl',
      1 => 1459684396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17857995585723bcb2d6eed5_91342509',
  'variables' => 
  array (
    'menus' => 0,
    'menu' => 0,
    'HTTP_MODEL' => 0,
    'contents' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5723bcb2da53a3_40820084',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5723bcb2da53a3_40820084')) {
function content_5723bcb2da53a3_40820084 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17857995585723bcb2d6eed5_91342509';
?>
<div id="menus">
    <ul>
        <?php
$_from = $_smarty_tpl->tpl_vars['menus']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['menu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
$foreach_menu_Sav = $_smarty_tpl->tpl_vars['menu'];
?>
        <li class="left_menu ajax_menu" href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['menu']->value['pre_menu'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['HTTP_MODEL']->value : $tmp);
echo $_smarty_tpl->tpl_vars['menu']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</li>
        <?php
$_smarty_tpl->tpl_vars['menu'] = $foreach_menu_Sav;
}
?>
    </ul>
</div>
<div id='contents'>
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['contents']->value)===null||$tmp==='' ? '' : $tmp);?>

</div><?php }
}
?>