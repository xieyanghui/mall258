<?php /* Smarty version 3.1.27, created on 2016-03-05 20:39:48
         compiled from "G:\xampp\mall258.com\htmPc\smartyTest.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1524556dad39485c184_51984955%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a969c5082bee1f30d069968eb2612b17f57f9b33' => 
    array (
      0 => 'G:\\xampp\\mall258.com\\htmPc\\smartyTest.tpl',
      1 => 1457181587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1524556dad39485c184_51984955',
  'variables' => 
  array (
    'x' => 0,
    'y' => 0,
    'fooa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56dad39489e814_65694891',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56dad39489e814_65694891')) {
function content_56dad39489e814_65694891 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once 'G:\\xampp\\mall258.com\\plugin\\smarty\\plugins\\function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '1524556dad39485c184_51984955';
$_smarty_tpl->tpl_vars['fooa'] = new Smarty_Variable($_smarty_tpl->tpl_vars['x']->value+$_smarty_tpl->tpl_vars['y']->value, null, 0);?>
<?php ob_start();
echo smarty_function_counter(array(),$_smarty_tpl);
$_tmp1=ob_get_clean();
$_smarty_tpl->tpl_vars['fooa'] = new Smarty_Variable($_tmp1+3, null, 0);?>
<?php echo $_smarty_tpl->tpl_vars['fooa']->value;

}
}
?>