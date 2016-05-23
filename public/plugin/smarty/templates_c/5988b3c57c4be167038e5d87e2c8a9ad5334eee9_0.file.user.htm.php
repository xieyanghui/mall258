<?php /* Smarty version 3.1.27, created on 2016-05-23 03:27:45
         compiled from "/home/xiehui/work/mall258/tplPc/user.htm" */ ?>
<?php
/*%%SmartyHeaderCode:154744877657420831d71ec3_70617013%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5988b3c57c4be167038e5d87e2c8a9ad5334eee9' => 
    array (
      0 => '/home/xiehui/work/mall258/tplPc/user.htm',
      1 => 1463945200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154744877657420831d71ec3_70617013',
  'variables' => 
  array (
    'top' => 0,
    'HTTP_HOST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57420831db4ef6_76494396',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57420831db4ef6_76494396')) {
function content_57420831db4ef6_76494396 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '154744877657420831d71ec3_70617013';
echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div id ='top_div'>
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['top']->value)===null||$tmp==='' ? '' : $tmp);?>

</div>
<div class="clear"></div>
<ul class="goods_nav wrap">
    <li class = "goods_nav_li"> <a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
">首页</a></li><span>></span>
    <li class = "goods_nav_li"> <a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/user.php">个人中心</a></li>
</ul>
<div class="wrap">
    <ul class="user_menu_ul">
        <li class="user_menu_li">订单管理</li>
        <li class="user_menu_li">购物车</li>
        <li class="user_menu_li">收藏夹</li>
        <li class="user_menu_li">收货地址管理</li>
        <li class="user_menu_li">资料修改</li>
        <li class="user_menu_li">修改密码</li>
    </ul>
    <div class="user_con">

    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>