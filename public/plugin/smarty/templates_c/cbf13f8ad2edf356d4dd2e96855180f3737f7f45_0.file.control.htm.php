<?php /* Smarty version 3.1.27, created on 2016-04-30 03:57:38
         compiled from "/home/xiehui/work/phpstorm/mall258/admin/tplPc/control.htm" */ ?>
<?php
/*%%SmartyHeaderCode:7842481435723bcb2db0394_77653411%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbf13f8ad2edf356d4dd2e96855180f3737f7f45' => 
    array (
      0 => '/home/xiehui/work/phpstorm/mall258/admin/tplPc/control.htm',
      1 => 1461923520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7842481435723bcb2db0394_77653411',
  'variables' => 
  array (
    'HTTP_MODEL' => 0,
    'HTTP_HOST' => 0,
    'admin' => 0,
    'menus' => 0,
    'menu' => 0,
    'con' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5723bcb2dbea58_32087744',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5723bcb2dbea58_32087744')) {
function content_5723bcb2dbea58_32087744 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7842481435723bcb2db0394_77653411';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/css/main.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/wangEdit/css/wangEditor.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/css/control.min.css" />

    <?php echo '<script'; ?>
 src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="//cdn.bootcss.com/plupload/2.1.8/plupload.full.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/qiniujs/qiniu.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/inCheck.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/xss.js" ><?php echo '</script'; ?>
>

</head>

<body>
<div id="tops">
    <ul class = 'top_left'>
        <li><img class="admin_head_s" src="<?php echo $_smarty_tpl->tpl_vars['admin']->value['a_img'];?>
?imageView2/5/w/75/h/75"/></li>
        <li><?php echo $_smarty_tpl->tpl_vars['admin']->value['a_nick'];?>
欢迎您</li>
    </ul>
    <ul class = 'top_menus'>
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
            <li class='top_menu ajax_menu' href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['menu']->value['pre_url'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['HTTP_MODEL']->value : $tmp);
echo $_smarty_tpl->tpl_vars['menu']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</li>
        <?php
$_smarty_tpl->tpl_vars['menu'] = $foreach_menu_Sav;
}
?>

    </ul>
</div>

<div id="con">
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['con']->value)===null||$tmp==='' ? '' : $tmp);?>

</div>
<div id="loading_back"><div class="loading_img"><img src="http://7xkkh3.com1.z0.glb.clouddn.com/o_1af6m10bl1e5k1tfgv7d7hk56il.gif"/></div>></div>
</body>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/js/main.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/wangEdit/js/wangEditor.min.js"><?php echo '</script'; ?>
>
</html><?php }
}
?>