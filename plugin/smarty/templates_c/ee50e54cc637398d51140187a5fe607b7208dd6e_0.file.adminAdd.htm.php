<?php /* Smarty version 3.1.27, created on 2016-03-03 01:01:38
         compiled from "E:\xampp\mall258\admin\htmPc\adminAdd.htm" */ ?>
<?php
/*%%SmartyHeaderCode:335056d71c724976e7_62545605%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee50e54cc637398d51140187a5fe607b7208dd6e' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\adminAdd.htm',
      1 => 1456770183,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '335056d71c724976e7_62545605',
  'variables' => 
  array (
    'adminHeadDefault' => 0,
    'adminAuth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d71c72518ed9_57943050',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d71c72518ed9_57943050')) {
function content_56d71c72518ed9_57943050 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '335056d71c724976e7_62545605';
?>
<style type="text/css">
    #adminAdd{
        position: absolute;
        z-index: 100;
        width: 500px;
        overflow: hidden;
    }
</style>
<form action="./server/adminAddSer.php" method="post" id="adminAddForm">
    <div id='adminAdd' class='win show_win'>
        <h1 class="win_head">添加管理员 <div class="show_win_close">×</div></h1>
        <div class="win_row">
            <label class ="win_row_head">登录名</label>
            <div class ="win_row_input"><input tabindex="1" type="text" name="a_name" class="form_div"/></div>
        </div>
        <div class="win_row">
            <label class ="win_row_head">姓名</label>
            <div class ="win_row_input"><input tabindex="2" type="text" name="a_nick" class="form_div"/></div>
        </div>
        <div class="win_row">
            <label class ="win_row_head">密码</label>
            <div class ="win_row_input"><input tabindex="3" type="password" name="a_pwd" class="form_div"/></div>
        </div>
        <div class ="win_row_auto">
            <label class ="win_row_head" >头像</label>
            <div class ="win_row_con">
                <div id="adminHeadImg">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['adminHeadDefault']->value;?>
?imageView2/5/w/75/h/75"/>
                    <input  type="hidden" name="a_img"/>
                </div>
                <div class="uploadImg">
                    <div id="imgUp" class="button">选择图片</div>
                    <div class="bars"><div id="bar"></div></div>
                </div>
            </div>
        </div>
        <div class ="win_row_auto">
            <label class ="win_row_head" >管理员级别</label>
            <div class ="win_row_con">
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['index'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['adminAuth']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total']);
?>
                <label title="<?php echo $_smarty_tpl->tpl_vars['adminAuth']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_remark'];?>
">
                    <input name="aa_id" tabindex="4" type="radio"  value="<?php echo $_smarty_tpl->tpl_vars['adminAuth']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['adminAuth']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_id'] == 2) {?>checked<?php }?>/>
                    <?php echo $_smarty_tpl->tpl_vars['adminAuth']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_nick'];?>

                </label>
                <?php endfor; endif; ?>
            </div>
        </div>

        <div class="win_row">
            <div class="button cancel">取消</div>
            <div class="submit button">提交</div>
        </div>
    </div>
</form>
<?php echo '<script'; ?>
>
    function succ(data) {
        toast(data.status, data.megs);
        Resize.resizeF5('./inc/adminInfo.php');
    }
    $(function(){
        //新增管理员提交
        $('.submit').click(function () {
            $(this).parents("form").submit();
        });
        //验证
        $.checks.checkform($('#adminAddForm'),{
            "async": {'success': succ},
            "a_name": {
                "name": "登录名",
                "check": ["noSpechars", {"isLength": [4, 20]}, {"isAjax": ["/server/iskeySer.php"]}]
            },
            "a_nick": {
                "name": "姓名",
                "check": [{"isLength": [2, 20]}]
            },
            "a_pwd": {
                "name": "密码",
                "check": [{"isLength": [6, 20]}]
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