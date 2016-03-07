<?php /* Smarty version 3.1.27, created on 2016-03-01 03:35:51
         compiled from "E:\xampp\mall258\admin\htmPc\goodsTypeAdd.htm" */ ?>
<?php
/*%%SmartyHeaderCode:3129156d49d97ae5951_26987688%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81302e08d0922fdc6609c32fee78db3936bb228a' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\goodsTypeAdd.htm',
      1 => 1456774456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3129156d49d97ae5951_26987688',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d49d97b063a5_26854389',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d49d97b063a5_26854389')) {
function content_56d49d97b063a5_26854389 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3129156d49d97ae5951_26987688';
?>
<style type="text/css">
    #goodsTypeAdd{
        position: absolute;
        z-index: 100;
        width: 400px;
        overflow: hidden;
    }

    div.gt_attr{
        width: 210px;
        padding-bottom: 0;
        padding-right: 0;
    }
</style>
<form action="./server/goodsTypeAddSer.php" method="post" id="goodsTypeAddForm">
    <div id='goodsTypeAdd' class='win show_win'>
        <h1 class="win_head">添加商品类型 <div class="show_win_close">×</div></h1>
        <div class="win_row">
            <label class ="win_row_head">编号</label>
            <div class ="win_row_input"><input tabindex="1" type="text" name="gt_number" class="form_div"/></div>
        </div>
        <div class="win_row">
            <label class ="win_row_head">商品类型名</label>
            <div class ="win_row_input"><input tabindex="2" type="text" name="gt_name" class="form_div"/></div>
        </div>
        <div class="win_row">
            <label class ="win_row_head">备注</label>
            <div class ="win_row_input"><input tabindex="3" type="text" name="gt_remark" class="form_div"/></div>
        </div>
        <div class ="win_row_auto">
            <label class ="win_row_head" >属性</label>
            <div class ="gt_attr win_row_con" name ='attr'>
                <div class="con_list_add" >+</div>
            </div>
        </div>
        <div class ="win_row_auto">
            <label class ="win_row_head" >价格属性</label>
            <div class ="gt_attr win_row_con" name ='price'>
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
        $.checks.checkform($('#goodsTypeAddForm'),{
            "async": {'success': succ},
            "gt_name": {
                "name": "商品类型名称",
                "check": [{"isLength": [1, 20]}, {"isAjax": ["/server/iskeySer.php"]}]
            },
            "gt_number": {
                "name": "编号",
                "check": ["noSpechars",{"isLength": [5,5]},{"isAjax": ["/server/iskeySer.php"]}],
                "mags":{"isLength":"编号只能是5位数"}
            }
        });

        $('div.con_list_add').click(function () {
            var name = $(this).parent().attr("name");
            $(this).before("<div class='con_list_input'><input class='list_form_div' type='text' name='"+name+"[]' ></div>");
            $(this).prev().children('input').focus();
        });
    });
<?php echo '</script'; ?>
><?php }
}
?>