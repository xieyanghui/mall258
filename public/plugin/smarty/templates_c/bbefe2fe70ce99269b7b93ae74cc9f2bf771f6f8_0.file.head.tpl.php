<?php /* Smarty version 3.1.27, created on 2016-05-02 15:02:10
         compiled from "/home/xiehui/work/mall258/tplPc/head.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16411850655726fb72b753c5_26284150%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbefe2fe70ce99269b7b93ae74cc9f2bf771f6f8' => 
    array (
      0 => '/home/xiehui/work/mall258/tplPc/head.tpl',
      1 => 1461506730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16411850655726fb72b753c5_26284150',
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'HTTP_HOST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5726fb72b78319_32400023',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5726fb72b78319_32400023')) {
function content_5726fb72b78319_32400023 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16411850655726fb72b753c5_26284150';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? '星火数码' : $tmp);?>
</title>
    <meta name="keywords" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['keywords']->value)===null||$tmp==='' ? '' : $tmp);?>
" />
    <meta name="description" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['description']->value)===null||$tmp==='' ? '' : $tmp);?>
" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/css/main.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/css/jquery-ui.min.css"/>
    <?php echo '<script'; ?>
 src="/script/require.min.js" data-main="/script/config.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
> window.h_main =[]; window.onload = function(){
        require(['main'],function(){
            console.log('开始了');
        });
    }<?php echo '</script'; ?>
>
</head>
<body><?php }
}
?>