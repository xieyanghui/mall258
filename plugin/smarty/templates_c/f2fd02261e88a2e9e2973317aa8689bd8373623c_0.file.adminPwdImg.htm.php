<?php /* Smarty version 3.1.27, created on 2016-02-28 02:54:34
         compiled from "E:\xampp\mall258\admin\htmPc\adminPwdImg.htm" */ ?>
<?php
/*%%SmartyHeaderCode:146656d1f0eadbeef2_81102308%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2fd02261e88a2e9e2973317aa8689bd8373623c' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\adminPwdImg.htm',
      1 => 1456599018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146656d1f0eadbeef2_81102308',
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d1f0eadea9d2_91003154',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d1f0eadea9d2_91003154')) {
function content_56d1f0eadea9d2_91003154 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '146656d1f0eadbeef2_81102308';
?>
<style type="text/css">
    .con_value_input>input{
        width: 100px;
    }
    .con_value_input{
        overflow: hidden;
        margin: 3px 0;
    }
</style>
<form action="./server/adminPwdImgSer.php" method="post" id="adminForm">
    <input type="hidden" name="a_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
" />
    <div id='adminInfo' class='win '>
        <h1  class="win_head" >我的信息</h1>

        <div class ="win_row">
            <label class ="win_row_head">登录名</label>
            <div  class ="win_row_input"> <input  type="text" name="a_name" class="form_div" disabled="disabled" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_name'];?>
" /></div>
        </div>

        <div class ="win_row">
            <label class ="win_row_head">姓名</label>
            <div class ="win_row_input" ><input type="text" name="a_nick" class="form_div" disabled="disabled" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_nick'];?>
" /></div>
        </div>

        <div class ="win_row" >
            <label class ="win_row_head">级别</label>
            <div class ="win_row_input" ><input type="text" name="auth" class="form_div" disabled="disabled" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['aa_nick'];?>
" /></div>
        </div>

        <div class = "win_row_auto">
            <label class ="win_row_head">修改密码</label>
            <div class ="win_row_con">
                <div class ="con_value_input"><label class="row_con_head">原密码：</label><input  type="password" name="oldPwd" class="form_div " autocomplete="off" /></div>
                <div class ="con_value_input"><label class="row_con_head">新密码：</label><input  type="password" name="newPwd" class="form_div" autocomplete="off" /></div>
                <div class ="con_value_input"><label class="row_con_head">确认密码：</label><input  type="password" name="verifyPwd" class="form_div" autocomplete="off"/></div>
                <div id="show_pwd_meg"></div>
            </div>
        </div>
        <div class ="win_row_auto">
            <label class ="win_row_head" >头像</label>
            <div class ="win_row_con">
                <div id="adminHeadImg">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_img'];?>
?imageView2/5/w/75/h/75"/>
                    <input  type="hidden" name="a_img"/>
                </div>
                <div class="uploadImg">
                    <div id="imgUp" class="button">选择图片</div>
                    <div class="bars"><div id="bar"></div></div>
                </div>
            </div>
        </div>
        <div class ="win_row">
            <div class="submit button">提交</div>
        </div>
    </div>
</form>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $('.submit').click(function () {
            $(this).parents("form").submit();
        });

        function succ(data) {
            toast(data.status, data.megs);
            $('#contents').load('./inc/adminPwdImg.php');
        }

        function bs() {
            $newPwd = $("#adminForm input[name='newPwd']").val() || null;
            $oldPwd = $("#adminForm input[name='oldPwd']").val() || null;
            $verifyPwd = $("#adminForm input[name='verifyPwd']").val() || null;
            if(($newPwd ==null && $oldPwd ==null && $verifyPwd ==null)||($newPwd !=null && $oldPwd !=null && $verifyPwd !=null) ){
                return true;
            }
            $("#show_pwd_meg").append("<span class='checker'>密码不能为空</span>");
            return false;

        }
        //验证
        $.checks.checkform($('#adminForm'), {
            "async": {'success': succ, 'beforeSend': bs},
            "newPwd": {
                "name": "新密码",
                "check": ["isNULL","noSpechars", {"isLength": [6, 20]}],
                "location":"show_pwd_meg"
            },
            "verifyPwd": {
                "name": "重复密码",
                "check": ["isNULL","noSpechars", {"isContrast": ["newPwd"]}],
                "location":"show_pwd_meg"
            }
        });



    });
    $(function(){
        //上传头像
        var up = getUpload();
        up.browse_button = "imgUp";
        //up.container = "adminHeadImg";
        up['init'].UploadProgress = function(up,file){
            $("#bar").css("width",file.percent+"%");
        };
        up['init'].FileUploaded = function (up, file, info) {
            var domain = up.getOption('domain');
            var res = JSON.parse(info);
            $("#adminHeadImg>img").attr("src", domain + "/" + res.key + "?imageView2/5/w/75/h/75");
            $("#adminHeadImg>input[name='a_img']").val(domain + "/" + res.key);
            $("#bar").css("background-color","#50D1DE");
        };
        var uploader = Qiniu.uploader(up);
    });
<?php echo '</script'; ?>
><?php }
}
?>