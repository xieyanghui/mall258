<?php /* Smarty version 3.1.27, created on 2016-02-28 02:54:33
         compiled from "E:\xampp\mall258\admin\htmPc\menuSystem.htm" */ ?>
<?php
/*%%SmartyHeaderCode:995756d1f0e9ba6d15_73994264%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8978e9f9aa0e7aa7b5e264861b51d322df8dc71' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\menuSystem.htm',
      1 => 1456599018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '995756d1f0e9ba6d15_73994264',
  'variables' => 
  array (
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d1f0e9bce2e9_70432449',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d1f0e9bce2e9_70432449')) {
function content_56d1f0e9bce2e9_70432449 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '995756d1f0e9ba6d15_73994264';
?>
<div id="menus">
    <ul>
        <?php if ($_smarty_tpl->tpl_vars['auth']->value['admin']) {?>  <li href='./inc/adminInfo.php'>管理员管理</li><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['auth']->value['adminAuth']) {?>  <li href='./inc/adminAuth.php'>权限管理</li><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['auth']->value['log']) {?>  <li href='./inc/systemLog.php'>系统日志</li><?php }?>
        <li href='./inc/adminPwdImg.php'>我的资料</li>
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
>
<?php }
}
?>