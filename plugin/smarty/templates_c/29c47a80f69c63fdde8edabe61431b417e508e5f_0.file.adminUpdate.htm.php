<?php /* Smarty version 3.1.27, created on 2016-02-28 02:56:29
         compiled from "E:\xampp\mall258\admin\htmPc\adminUpdate.htm" */ ?>
<?php
/*%%SmartyHeaderCode:2652056d1f15d6b7633_21909450%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29c47a80f69c63fdde8edabe61431b417e508e5f' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\adminUpdate.htm',
      1 => 1456599018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2652056d1f15d6b7633_21909450',
  'variables' => 
  array (
    'row' => 0,
    'adminAuth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d1f15d6e7c71_69826847',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d1f15d6e7c71_69826847')) {
function content_56d1f15d6e7c71_69826847 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2652056d1f15d6b7633_21909450';
?>
<style type="text/css">
    #adminUpdate{
        position: absolute;
        z-index: 100;
        width: 500px;
        overflow: hidden;
    }
    .win_row_span{
        display: block;
        height: 30px;
        line-height: 30px;
        font-size: 20px;
        font-weight: bold;
    }
</style>
<form id="adminUpdateForm" action="./server/adminUpdateSer.php" method="post">
    <div id="adminUpdate" class="show_win win">
        <input type="hidden" name="a_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
"/>
        <h1 class="win_head">修改管理员权限
            <div class="show_win_close">×</div>
        </h1>
        <div class="win_row">
            <label class="win_row_head" >编号</label>
            <div class="win_row_input"><span class="win_row_span" ><?php echo $_smarty_tpl->tpl_vars['row']->value['a_id'];?>
</span></div>
        </div>
        <div class="win_row">
            <label class="win_row_head">管理员登录名</label>
            <div class="win_row_input"> <span class="win_row_span" ><?php echo $_smarty_tpl->tpl_vars['row']->value['a_name'];?>
</span></div>
        </div>
        <div class="win_row" >
            <label class="win_row_head">管理员姓名</label>
            <div class="win_row_input" > <input name ="a_nick" type="text" class="form_div" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['a_nick'];?>
" /></div>
        </div>
        <div class = "win_row_auto" >
                <label class="win_row_head">管理员权限</label>
                <div class="win_row_con">
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
"><input  name="aa_id"  type="radio" value="<?php echo $_smarty_tpl->tpl_vars['adminAuth']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_id'];?>
" <?php echo $_smarty_tpl->tpl_vars['adminAuth']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['checked'];?>
 /><?php echo $_smarty_tpl->tpl_vars['adminAuth']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_nick'];?>
 </label>
                    <?php endfor; endif; ?>
                </div>
            </div>

        <div>
            <div class="button cancel">取消</div>
            <div class="button submit">提交</div>
        </div>
    </div>
</form>
<?php echo '<script'; ?>
 type="text/javascript">
    function UpdateSucc(data){
        toast(data.status, data.megs);
        Resize.resizeF5('./inc/adminInfo.php');
    }
    $(function () {
        $(".submit").click(function () {
            $.ajax({
                url: $(this).parents('form').attr('action'),
                data: $(this).parents('form').serialize(),
                type: "POST",
                dataType: "json",
                beforeSend: null,
                success: UpdateSucc
            });
        });
    });
<?php echo '</script'; ?>
><?php }
}
?>