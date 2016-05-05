<?php /* Smarty version 3.1.27, created on 2016-04-30 04:27:23
         compiled from "/home/xiehui/work/phpstorm/mall258/tplPc/head.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3904088985723c3ab57d2c0_61381081%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daddc5fffd789ed114e5c5a4d9fd37978a953ea5' => 
    array (
      0 => '/home/xiehui/work/phpstorm/mall258/tplPc/head.tpl',
      1 => 1461506730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3904088985723c3ab57d2c0_61381081',
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'HTTP_HOST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5723c3ab614540_79723700',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5723c3ab614540_79723700')) {
function content_5723c3ab614540_79723700 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3904088985723c3ab57d2c0_61381081';
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