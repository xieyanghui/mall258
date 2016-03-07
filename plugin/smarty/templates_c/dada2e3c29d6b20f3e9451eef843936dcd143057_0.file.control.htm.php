<?php /* Smarty version 3.1.27, created on 2016-03-03 01:03:20
         compiled from "E:\xampp\mall258\admin\htmPc\control.htm" */ ?>
<?php
/*%%SmartyHeaderCode:1242056d71cd8cc73f2_14115405%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dada2e3c29d6b20f3e9451eef843936dcd143057' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\control.htm',
      1 => 1456938194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1242056d71cd8cc73f2_14115405',
  'variables' => 
  array (
    'HTTP_HOST' => 0,
    'admin' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d71cd8d00186_53589125',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d71cd8d00186_53589125')) {
function content_56d71cd8d00186_53589125 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1242056d71cd8cc73f2_14115405';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/css/main.css"/>
    <?php echo '<script'; ?>
 src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
    <style>
        body {
            background-color: #E0F8FB;
        }
        #tops {
            width: 100%;
            height: 50px;
            background-color: #50D1DE;
            position: fixed;
            top: 0;
            z-index: 10;
        }
        .top_left{
            height: 50px;
            display: block;
            float: left;
        }
        .top_left >li{
            float: left;
            font-weight: bold;
            height: 50px;
            line-height: 50px;
            margin-left: 5px;
        }
         .top_menus {
            height: 50px;
            display: block;
            float: right;
        }

        .top_menu {
            margin: 0 20px;
            width: 150px;
            height: 50px;
            line-height: 50px;
            float: right;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            display: block;
            position: relative;
            background-color: #50D1DE;
        }
        li.top_menu:hover {
            background-color: #07A1B1;
            cursor: pointer;
        }

        .menuClick {
            margin: 0 20px;
            width: 150px;
            height: 50px;
            line-height: 50px;
            float: right;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            display: block;
            position: relative;
            background-color: #07A1B1;
            cursor: pointer;
        }

        .con {
            position: relative;
            top: 50px;
        }

        #menus {
            position: fixed;
            top: 50px;
            z-index: 10;
        }

        #contents {
            position: relative;
            left: 250px;
            top: 50px;
            overflow: hidden;
        }

        #menus > ul > li {
            height: 40px;
            width: 200px;
            line-height: 40px;
            text-align: center;
            font-size: 24px;
            margin: 10px 25px;
            cursor: pointer;
            background-color: #BCEDF2;
        }

        #menus > ul > li:hover {
            background-color: #50D1DE;
        }
        .admin_head_s {
            width: 50px;
            height: 50px;
            border-radius: 25px;
        }
        .backdrop{
            top:0;
            position: fixed;
            background-color: #000000;
            opacity: 0.3;
            z-index: 20;
        }
        #con{
            float: left;
        }
    </style>
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
        <li class='top_menu' href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/exitSer.php">安全退出</li>

        <li class='top_menu' href="./inc/menuSystem.php">系统设置</li>

        <li class='top_menu' href="11">消息中心</li>

        <?php if ($_smarty_tpl->tpl_vars['auth']->value['report']) {?><li class='top_menu' href="11">报表统计</li> <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['auth']->value['order']) {?>  <li class='top_menu' href="11">订单管理</li> <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['auth']->value['service']) {?>  <li class='top_menu' href="11">在线客服</li> <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['auth']->value['goods']) {?>  <li class='top_menu' href="./inc/menuGoods.php">商品管理</li> <?php }?>
    </ul>
</div>
<div id="con"></div>
<div class= "backdrop"></div>
<div id = 'CRUD'></div>
</body>
<?php echo '<script'; ?>
>
    $(function () {
        $(".top_menus >li").click(function () {
            //$(this).removeClass('top_menu');
            $(this).addClass('menuClick');
            $(this).siblings().removeClass('menuClick');
            $(this).siblings().addClass('menu');
            $('#con').load($(this).attr('href'));
        });
    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/plupload/plupload.full.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/qiniujs/qiniu.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/main.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/inCheck.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
</html><?php }
}
?>