<?php /* Smarty version 3.1.27, created on 2016-05-02 15:02:41
         compiled from "/home/xiehui/work/mall258/admin/tplPc/index.htm" */ ?>
<?php
/*%%SmartyHeaderCode:10444218215726fb91940155_51805029%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9f16e4ed00f50fdb577a6a656c3c40ac31738bf' => 
    array (
      0 => '/home/xiehui/work/mall258/admin/tplPc/index.htm',
      1 => 1459674525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10444218215726fb91940155_51805029',
  'variables' => 
  array (
    'HTTP_MODEL' => 0,
    'HTTP_HOST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5726fb91943ea0_65461292',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5726fb91943ea0_65461292')) {
function content_5726fb91943ea0_65461292 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '10444218215726fb91940155_51805029';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="./css/main.min.css"/>
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
    <form id="login_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/adminLoginSer.php">
        <div id="login_win" class="win_center">
            <h1 class="win_head">后台管理系统</h1>
            <div class="win_row win_row_one"><label class='win_row_head' for="a_name">账号：</label><div class="win_row_input"><input id="a_name"  type="text" name="a_name" class="form_div"/></div></div>
            <div class="win_row"><label class='win_row_head' for="a_pwd">密码：</label><div class="win_row_input"><input id="a_pwd" type="password" name="a_pwd" class="form_div"/></div></div>
            <!--<div class="win_row validateRow"><label class = 'win_row_head' for="validate">验证码：</label><div class="win_row_input" ><input type ="text" id ="validate" name ="validate" class= "validate form_div "/></div>-->
                <!--<div><img id="validateImg" src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/validateSer.php?name=adminLoginCheck" /></div>-->
                <!--<div id="validateMeg"></div>-->
            <!--</div>-->
            <div class="win_row"><div class="submit center_button">登录</div></div>
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
            "validate": {
                "name": "验证码",
                'location':'validateMeg',
                "check": ["noNULL"]
            },
            "a_name": {
                "name": "用户名",
                "check": ["noSpechars", {"isLength": [6, 15]}]
            },
            "a_pwd": {
                "name": "密码",
                "mags": {"success": "ok"},
                "check": ["noSpechars", {"isLength": [6, 15]}]}
        });
    });
<?php echo '</script'; ?>
>
</html><?php }
}
?>