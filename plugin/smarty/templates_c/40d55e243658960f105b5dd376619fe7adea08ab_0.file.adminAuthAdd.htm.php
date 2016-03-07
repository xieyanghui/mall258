<?php /* Smarty version 3.1.27, created on 2016-03-03 01:01:44
         compiled from "E:\xampp\mall258\admin\htmPc\adminAuthAdd.htm" */ ?>
<?php
/*%%SmartyHeaderCode:3035956d71c78624fa6_09656410%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40d55e243658960f105b5dd376619fe7adea08ab' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\adminAuthAdd.htm',
      1 => 1456770183,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3035956d71c78624fa6_09656410',
  'variables' => 
  array (
    'authList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d71c78660c06_94465331',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d71c78660c06_94465331')) {
function content_56d71c78660c06_94465331 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3035956d71c78624fa6_09656410';
?>
<style type="text/css">
    #adminAuthAdd{
        position: absolute;
        z-index: 100;
        width: 400px;
        overflow: hidden;
    }
</style>
<form action="./server/adminAuthAddSer.php" method="post" id="adminAuthAddForm">
    <div id='adminAuthAdd' class='win show_win'>
        <h1 class="win_head">添加权限组 <div class="show_win_close">×</div></h1>
        <div class="win_row">
            <label class ="win_row_head">权限组名</label>
            <div class ="win_row_input"><input tabindex="1" type="text" name="aa_nick" class="form_div"/></div>
        </div>
        <div class="win_row">
            <label class ="win_row_head">备注</label>
            <div class ="win_row_input"><input tabindex="2" type="text" name="aa_remark" class="form_div"/></div>
        </div>
        <div class ="win_row_auto">
            <label class ="win_row_head" >权限列表</label>
            <div class ="win_row_con">
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['index'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['authList']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                <div title="<?php echo $_smarty_tpl->tpl_vars['authList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['al_remark'];?>
">
                    <label><input name="al_id[]" tabindex="3" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['authList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['al_id'];?>
"/><?php echo $_smarty_tpl->tpl_vars['authList']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['al_nick'];?>
</label>

                </div>
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
        Resize.resizeF5('./inc/adminAuth.php');
    }
    $(function(){
        //新增提交
        $('.submit').click(function () {
            $(this).parents("form").submit();
        });
        //验证
        $.checks.checkform($('#adminAuthAddForm'), {
            "async": {'success': succ},
            "aa_nick":{'name':'权限组',"check": [{"isLength": [2, 20]}, {"isAjax": ["/server/iskeySer.php"]}]}
        });

    });
<?php echo '</script'; ?>
><?php }
}
?>