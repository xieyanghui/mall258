<?php /* Smarty version 3.1.27, created on 2016-03-28 23:06:51
         compiled from "G:\xampp\mall258.com\admin\htmPc\index.htm" */ ?>
<?php
/*%%SmartyHeaderCode:149656f9488b6c8514_21761327%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bad0bb4b743c47ad25dca2eb3aae31d79c1af88' => 
    array (
      0 => 'G:\\xampp\\mall258.com\\admin\\htmPc\\index.htm',
      1 => 1459177568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149656f9488b6c8514_21761327',
  'variables' => 
  array (
    'HTTP_HOST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f9488b6ff021_00289965',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f9488b6ff021_00289965')) {
function content_56f9488b6ff021_00289965 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '149656f9488b6c8514_21761327';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/css/main.css"/>
    <title>后台管理</title>
    <style type="text/css">
        body{
            background-image: url('http://huiweixin.qiniudn.com/background.jpg');
        }
        #login_win{
            width: 400px;
            margin: 200px auto 0;
        }
        .validateRow >div{
            float: left;
        }
        #validateMeg{
            clear: both;
            margin-left: 125px;
        }
        #validateImg:hover{
            cursor: pointer;
        }
    </style>
</head>
<body >
    <form id="login_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/admin/server/adminLoginSer.php">
        <div id="login_win" class="win">
            <h1 class="win_head">后台管理系统</h1>
            <div class="win_row"><label class='win_row_head' for="a_name">账号：</label><div class="win_row_input"><input id="a_name"  type="text" name="a_name" class="form_div"/></div></div>
            <div class="win_row"><label class='win_row_head' for="a_pwd">密码：</label><div class="win_row_input"><input id="a_pwd" type="password" name="a_pwd" class="form_div"/></div></div>
            <!--<div class="win_row validateRow"><label class = 'win_row_head' for="validate">验证码：</label><div class="win_row_input" ><input type ="text" id ="validate" name ="validate" class= "validate form_div "/></div>-->
                <!--<div><img id="validateImg" src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/validateSer.php?name=adminLoginCheck" /></div>-->
                <!--<div id="validateMeg"></div>-->
            <!--</div>-->
            <div class="win_row"><div class="submit button">登录</div></div>
        </div>
    </form>
</body>

<?php echo '<script'; ?>
 src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/inCheck.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function succ(data){
        toast(data.status,data.megs);
        if(data.status){
            setInterval(function(){
                window.location.reload();
            },2000);
        }else{
            $('#validateImg').attr("src", $('#validateImg').attr("src") + "&data=" + new Date().getTime());
            $('#a_pwd').val("");
            $('#validate').val("");
        }
    }
    $(function () {
        $('.submit').click(function () {
            $(this).parents("form").submit();
        });
        $('#a_name').focus();
        $(document).keydown(function(event){
            if(event.keyCode ==13){
                $("input:focus").parents('form').submit();
            }
        });

        $('#validateImg').click(function () {
            $(this).attr("src", $(this).attr("src") + "&data=" + new Date().getTime());
        });

        $.checks.checkform($("#login_form"), {
            "async": {'success': succ},
            "validate": {"name": "验证码",'location':'validateMeg', "check": ["noNULL"]},
            "a_name": {"name": "用户名", "check": ["noSpechars", {"isLength": [6, 15]}]},
            "a_pwd": {"name": "密码", "mags": {"success": "ok"}, "check": ["noSpechars", {"isLength": [6, 15]}]}
        });
    });
<?php echo '</script'; ?>
>
</html><?php }
}
?>