<?php /* Smarty version 3.1.27, created on 2016-04-30 07:03:14
         compiled from "/home/xiehui/work/phpstorm/mall258/admin/tplPc/goodsTypeAU.htm" */ ?>
<?php
/*%%SmartyHeaderCode:13820189475723e8328d3ea7_98408322%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '907737c318f47c63ecded6bdf3fc88210a8ebad2' => 
    array (
      0 => '/home/xiehui/work/phpstorm/mall258/admin/tplPc/goodsTypeAU.htm',
      1 => 1461970983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13820189475723e8328d3ea7_98408322',
  'variables' => 
  array (
    'HTTP_MODEL' => 0,
    'row' => 0,
    'attr' => 0,
    'attrs' => 0,
    'price' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5723e832905261_85126429',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5723e832905261_85126429')) {
function content_5723e832905261_85126429 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13820189475723e8328d3ea7_98408322';
?>
<style type="text/css">
    #goodsTypeAU{
        width: 800px;
        overflow: hidden;
    }
    div.con_list_input,div.con_list_add{
        display: block;
        float: left;
        width: 120px;
        height: 30px;
        padding-left:5px ;
        overflow: hidden;
        margin: 0 3px 3px 0 ;
        border: 1px solid #50D1DE;
        line-height: 30px;
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
        width: 120px;
    }
    div.con_list_inputOff{
        background-color: #EEEEEE;
    }
    div.gt_attr{
        width: 520px;
        padding-bottom: 0;
        padding-right: 0;
    }
    .gt_attr_s_l{
        width: 100px;
        float: left;
        height: 30px;
        line-height: 30px;
        font-size: 14px;
        color: #07A1B1;
        padding-right: 10px;
        text-align: right;

    }
    .gt_attr_s{
    }
    .gt_attr_s_s{
        overflow: hidden;
        border: 1px solid #50D1DE;
        float: left;
        padding: 4px;
        margin: 2px;
        width: 390px;
    }
</style>
<form action="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/goodsTypeAUSer.php" method="post" id="goodsTypeAUForm">
 <input type="hidden" name="gt_id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['gt_id'])===null||$tmp==='' ? '' : $tmp);?>
"/>
    <div id='goodsTypeAU' class='win'>
        <h1 class="win_head">商品类型详细 </h1>
        <div class="win_row win_row_one">
            <label class ="win_row_head">编号</label>
            <div class ="win_row_input"><input value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['gt_number'])===null||$tmp==='' ? '' : $tmp);?>
"  <?php if (!empty($_smarty_tpl->tpl_vars['row']->value)) {?>disabled="disabled"<?php }?> type="text" name="gt_number" class="form_div"/></div>
        </div>
        <div class="win_row">
            <label class ="win_row_head">商品类型名</label>
            <div class ="win_row_input"><input value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['gt_name'])===null||$tmp==='' ? '' : $tmp);?>
" tabindex="2" type="text" name="gt_name" class="form_div"/></div>
        </div>
        <div class="win_row">
            <label class ="win_row_head">备注</label>
            <div class ="win_row_input"><input value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['gt_remark'])===null||$tmp==='' ? '' : $tmp);?>
" tabindex="3" type="text" name="gt_remark" class="form_div"/></div>
        </div>
        <div class ="win_row_auto">
            <label class ="win_row_head" >属性</label>
            <div class ="gt_attr win_row_con" name ='attr'>
                <?php if (!empty($_smarty_tpl->tpl_vars['row']->value['attr'])) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['row']->value['attr'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['attr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['attr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['attr']->value) {
$_smarty_tpl->tpl_vars['attr']->_loop = true;
$foreach_attr_Sav = $_smarty_tpl->tpl_vars['attr'];
?>
                <div class="gt_attr_s" name="attr<?php echo $_smarty_tpl->tpl_vars['attr']->value['gtat_id'];?>
">
                    <label class="gt_attr_s_l"><?php echo $_smarty_tpl->tpl_vars['attr']->value['gtat_name'];?>
</label>
                    <div class ='gt_attr_s_s'>
                    <?php
$_from = $_smarty_tpl->tpl_vars['attr']->value['GTAttr'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['attrs'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['attrs']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['attrs']->value) {
$_smarty_tpl->tpl_vars['attrs']->_loop = true;
$foreach_attrs_Sav = $_smarty_tpl->tpl_vars['attrs'];
?>
                    <div class=' con_list_input con_list_inputOff' >
                        <input type="text" class="list_form_div" name="attr<?php echo $_smarty_tpl->tpl_vars['attrs']->value['gta_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['attrs']->value['gta_name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['attrs']->value['gta_name'];?>
" disabled="disabled"/>
                    </div>

                    <?php
$_smarty_tpl->tpl_vars['attrs'] = $foreach_attrs_Sav;
}
?>

                    <div class="con_list_add " >+</div>
                    </div>
                </div>
                <?php
$_smarty_tpl->tpl_vars['attr'] = $foreach_attr_Sav;
}
?>
                <?php }?>
            </div>
        </div>
        <div class ="win_row_auto">
            <label class ="win_row_head" >价格属性</label>
            <div class ="gt_attr win_row_con" name ='price'>
                <?php if (!empty($_smarty_tpl->tpl_vars['row']->value['price'])) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['row']->value['price'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['price'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['price']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['price']->value) {
$_smarty_tpl->tpl_vars['price']->_loop = true;
$foreach_price_Sav = $_smarty_tpl->tpl_vars['price'];
?>
                    <div class='con_list_input con_list_inputOff' ><input type="text" class="list_form_div" name="price<?php echo $_smarty_tpl->tpl_vars['price']->value['gtp_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['price']->value['gtp_name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['price']->value['gtp_name'];?>
" disabled="disabled"/></div>
                <?php
$_smarty_tpl->tpl_vars['price'] = $foreach_price_Sav;
}
?>
                <?php }?>
                <div class="con_list_add" >+</div>
            </div>
        </div>
        <div class="win_row">
            <div class="left_button history_back">取消</div>
            <div class="right_button submit">提交</div>
        </div>
    </div>
</form>
<?php echo '<script'; ?>
>
    $(function(){
        //验证
        var succ = function(data){
            if(data.status){

            }else{

            }
        }
        $.checks.checkform($('#goodsTypeAUForm'),{
            "async": {'success': succ},
            "gt_name": {
                "name": "商品类型名称",
                "check": [{"isLength": [1, 20]}]
            }
        });

        $('div.con_list_add').click(function () {
            var name = $(this).parents('.gt_attr_s').attr("name") || $(this).parents('.win_row_con').attr("name");
            $(this).before("<div class='con_list_input'><input class='list_form_div' type='text' name='a_"+name+"[]' ></div>");
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