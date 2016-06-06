<?php /* Smarty version 3.1.27, created on 2016-05-02 15:02:56
         compiled from "/home/xiehui/work/mall258/admin/tplPc/leftMenu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6268645165726fba04c1674_84385065%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5327911da42f988264a9e05efdce2d986cb13ae' => 
    array (
      0 => '/home/xiehui/work/mall258/admin/tplPc/leftMenu.tpl',
      1 => 1459684396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6268645165726fba04c1674_84385065',
  'variables' => 
  array (
    'menus' => 0,
    'menu' => 0,
    'HTTP_MODEL' => 0,
    'contents' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5726fba04c68e5_11634115',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5726fba04c68e5_11634115')) {
function content_5726fba04c68e5_11634115 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '6268645165726fba04c1674_84385065';
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