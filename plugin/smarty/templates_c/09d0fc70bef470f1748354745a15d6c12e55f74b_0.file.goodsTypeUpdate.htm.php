<?php /* Smarty version 3.1.27, created on 2016-03-01 02:28:33
         compiled from "E:\xampp\mall258\admin\htmPc\goodsTypeUpdate.htm" */ ?>
<?php
/*%%SmartyHeaderCode:123056d48dd1f02555_32839876%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09d0fc70bef470f1748354745a15d6c12e55f74b' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\goodsTypeUpdate.htm',
      1 => 1456770183,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123056d48dd1f02555_32839876',
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d48dd1f3be40_50433483',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d48dd1f3be40_50433483')) {
function content_56d48dd1f3be40_50433483 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '123056d48dd1f02555_32839876';
?>
<style type="text/css">
    #goodsTypeUpdate{
        position: absolute;
        z-index: 100;
        width: 400px;
        overflow: hidden;
    }
    div.con_list_input,div.con_list_add{
        display: block;
        float: left;
        width: 60px;
        height: 25px;
        padding-left:5px ;
        overflow: hidden;
        margin: 0 3px 3px 0 ;
        border: 1px solid #50D1DE;
        line-height: 25px;
    }
    div.con_list_add:hover{
        cursor: pointer;
    }
    div.con_list_add{
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        background-color: #EEEEEE;
    }
    input.list_form_div{
        border-style: hidden;
        outline:none;
        width: 50px;
    }
    div.con_list_inputOff{
        background-color: #EEEEEE;
    }
    div.gt_attr{
        width: 210px;
        padding-bottom: 0;
        padding-right: 0;
    }

</style>
<form action="./server/goodsTypeUpdateSer.php" method="post" id="goodsTypeUpdateForm">
    <input type="hidden" name="gt_id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['gt_id'];?>
"/>
    <div id='goodsTypeUpdate' class='win show_win'>
        <h1 class="win_head">修改商品类型 <div class="show_win_close">×</div></h1>
        <div class="win_row">
            <label class ="win_row_head">编号</label>
            <div class ="win_row_input"><input disabled="disabled" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['gt_number'];?>
"  type="text" name="gt_number" class="form_div"/></div>
        </div>
        <div class="win_row">
            <label class ="win_row_head">商品类型名</label>
            <div class ="win_row_input"><input value="<?php echo $_smarty_tpl->tpl_vars['row']->value['gt_name'];?>
" tabindex="2" type="text" name="gt_name" class="form_div"/></div>
        </div>
        <div class="win_row">
            <label class ="win_row_head">备注</label>
            <div class ="win_row_input"><input value="<?php echo $_smarty_tpl->tpl_vars['row']->value['gt_remark'];?>
" tabindex="3" type="text" name="gt_remark" class="form_div"/></div>
        </div>
        <div class ="win_row_auto">
            <label class ="win_row_head" >属性</label>
            <div class ="gt_attr win_row_con" name ='attr'>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['index'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['row']->value['attr']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                <div class=' con_list_input con_list_inputOff' ><input type="text" class="list_form_div" name="uAttr<?php echo $_smarty_tpl->tpl_vars['row']->value['attr'][$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['gta_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['attr'][$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['gta_name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['attr'][$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['gta_name'];?>
" disabled="disabled"/></div>
                <?php endfor; endif; ?>
                <div class="con_list_add " >+</div>
            </div>
        </div>
        <div class ="win_row_auto">
            <label class ="win_row_head" >价格属性</label>
            <div class ="gt_attr win_row_con" name ='price'>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['index'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['row']->value['price']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                <div class='con_list_input con_list_inputOff' ><input type="text" class="list_form_div" name="uPrice<?php echo $_smarty_tpl->tpl_vars['row']->value['price'][$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['gtp_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['price'][$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['gtp_name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['price'][$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['gtp_name'];?>
" disabled="disabled"/></div>
                <?php endfor; endif; ?>
                <div class="con_list_add" >+</div>
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
        Resize.resizeF5('./inc/goodsType.php');
    }
    $(function(){
        //提交
        $('.submit').click(function () {
            $(this).parents("form").submit();
        });
        //验证
        $.checks.checkform($('#goodsTypeUpdateForm'),{
            "async": {'success': succ},
            "gt_name": {
                "name": "商品类型名称",
                "check": [{"isLength": [1, 20]}]
            }
        });

        $('div.con_list_add').click(function () {
            var name = $(this).parent().attr("name");
            $(this).before("<div class='con_list_input'><input class='list_form_div' type='text' name='"+name+"[]' ></div>");
            $(this).prev().children('input').focus();
        });
        $('div.con_list_input').click(function () {
            $(this).removeClass("con_list_inputOff");
            $(this).children('input').removeAttr('disabled');
        });
    });
<?php echo '</script'; ?>
>
<?php }
}
?>