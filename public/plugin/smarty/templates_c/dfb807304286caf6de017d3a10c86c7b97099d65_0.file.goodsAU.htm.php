<?php /* Smarty version 3.1.27, created on 2016-05-09 01:35:49
         compiled from "/home/xiehui/work/mall258/admin/tplPc/goodsAU.htm" */ ?>
<?php
/*%%SmartyHeaderCode:1904957448572f78f5d77ac0_20086501%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfb807304286caf6de017d3a10c86c7b97099d65' => 
    array (
      0 => '/home/xiehui/work/mall258/admin/tplPc/goodsAU.htm',
      1 => 1462035835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1904957448572f78f5d77ac0_20086501',
  'variables' => 
  array (
    'HTTP_MODEL' => 0,
    'goods' => 0,
    'goodsType' => 0,
    'GOODS_IMG_DEFAULT' => 0,
    'attr' => 0,
    'attrs' => 0,
    'ga_id' => 0,
    'price' => 0,
    'prices' => 0,
    'HTTP_HOST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_572f78f5de90a3_05737076',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_572f78f5de90a3_05737076')) {
function content_572f78f5de90a3_05737076 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1904957448572f78f5d77ac0_20086501';
?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/css/goodsAU.min.css" type="text/css">
<form action="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/goodsAUSer.php" method="post" id="goodsAUForm">
    <div id='goodsAU' class='win'>
        <input type="hidden" name="g_id" id="g_id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['goods']->value['g_id'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <input type="hidden" name="gt_id" id="gt_id" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['gt_id'];?>
" />
        <input type="hidden" name="g_img" id="g_img" />

        <h1 class="win_head">商品基本资料</h1>
        <div class="win_column">
            <div class="win_row win_row_one">
                <label class ="win_row_head">商品类型</label>
                <div class ="win_row_select">
                    <?php if (!empty($_smarty_tpl->tpl_vars['goods']->value)) {?>
                    <div title="<?php echo $_smarty_tpl->tpl_vars['goods']->value['gt_name'];?>
" class="select_div"><?php echo $_smarty_tpl->tpl_vars['goods']->value['gt_name'];?>
</div>
                    <?php } else { ?>
                    <div class="select_div">请选择类型</div>
                    <ul class="select_ul">
                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['index'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['goodsType']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                        <li class="select_li" value="<?php echo $_smarty_tpl->tpl_vars['goodsType']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['gt_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['goodsType']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['gt_name'];?>
 </li>
                        <?php endfor; endif; ?>
                    </ul>
                    <?php }?>
                </div>
            </div>
            <div class="win_row">
                <label class ="win_row_head">商品编号</label>
                <div class ="win_row_input">
                    <?php if (!empty($_smarty_tpl->tpl_vars['goods']->value)) {?>
                    <div class="input_label g_number" ><?php echo $_smarty_tpl->tpl_vars['goods']->value['g_number'];?>
</div>
                    <?php } else { ?>
                    <div class="win_row_input"  ><input tabindex="2" type="text" name="g_number" class="form_div"/></div>
                    <?php }?>
                </div>
            </div>
            <div class="win_row">
                <label class ="win_row_head">商品名称</label>
                <div class ="win_row_input"><input tabindex="3"   type="text" name="g_name" class="form_div" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['goods']->value['g_name'])===null||$tmp==='' ? '' : $tmp);?>
"/></div>
            </div>
            <div class="win_row">
                <label class ="win_row_head">商品默认价格</label>
                <div class ="win_row_input"><input tabindex="4" type="number" name="g_price" class="form_div" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['goods']->value['g_price'])===null||$tmp==='' ? '' : $tmp);?>
" /></div>
            </div>

            <div class ="win_row_auto">
                <label class ="win_row_head">商品预览图</label>
                <div class ="win_row_con">
                    <div class="upload_img_div">
                        <img preview=".upload_img_div >img" class="preview_img select_img img_75" img_url="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['goods']->value['g_img'])===null||$tmp==='' ? '' : $tmp);?>
"  src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['goods']->value['g_img'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['GOODS_IMG_DEFAULT']->value : $tmp);?>
?imageView2/5/w/75/h/75"/>
                    </div>
                    <div class="upload_img_button button select_img" preview=".upload_img_div >img">选择图片</div>
                </div>
            </div>

            <div class ="win_row_auto">
                <label class ="win_row_head">SEO</label>
                <div class ="win_row_con">
                    <div ><label class='row_con_head'>关键字</label><textarea class="con_textarea"  name="g_keywords"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['goods']->value['g_keywords'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></div>
                    <div ><label class='row_con_head'>描述</label><textarea class="con_textarea" name="g_description"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['goods']->value['g_description'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></div>
                </div>
            </div>
            <?php if (!empty($_smarty_tpl->tpl_vars['goods']->value)) {?>
            <div class="win_row">
                <div class="left_button g_price_set ajax_menu " href="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/view/goodsPriceAU.php?g_id=<?php echo $_smarty_tpl->tpl_vars['goods']->value['g_id'];?>
">价格设置</div>
                <div class="right_button g_description_set ajax_menu" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/view/goodsTextAU.php?g_id=<?php echo $_smarty_tpl->tpl_vars['goods']->value['g_id'];?>
">详细描述</div>
            </div>
            <?php }?>
        </div>

        <div class="win_column">
        <div class ="win_row_auto win_row_one">
            <label class ="win_row_head_right" >属性</label>
            <div class ="win_row_con attr_price" id ='attr'>
                <?php if (!empty($_smarty_tpl->tpl_vars['goods']->value['attr'])) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['goods']->value['attr'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['attr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['attr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['attr']->value) {
$_smarty_tpl->tpl_vars['attr']->_loop = true;
$foreach_attr_Sav = $_smarty_tpl->tpl_vars['attr'];
?>
                <div class='goods_price_list' >
                    <label class='row_con_head'><?php echo $_smarty_tpl->tpl_vars['attr']->value['gtat_name'];?>
</label>
                    <div class='win_row_con' id="attr<?php echo $_smarty_tpl->tpl_vars['attr']->value['gtat_id'];?>
">
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
                        <?php if (!empty($_smarty_tpl->tpl_vars['attrs']->value["ga_id"])) {?>
                            <?php $_smarty_tpl->tpl_vars['ga_id'] = new Smarty_Variable(('attr').($_smarty_tpl->tpl_vars['attrs']->value["ga_id"]), null, 0);?>
                        <?php } else { ?>
                            <?php $_smarty_tpl->tpl_vars['ga_id'] = new Smarty_Variable(('a_attr').($_smarty_tpl->tpl_vars['attrs']->value["gta_id"]), null, 0);?>
                        <?php }?>
                        <div class='con_attr_list' >
                           <label for='<?php echo $_smarty_tpl->tpl_vars['ga_id']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['attrs']->value['gta_name'];?>
</label> <input class='con_attr_list_form' type='text' id='<?php echo $_smarty_tpl->tpl_vars['ga_id']->value;?>
' value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['attrs']->value['ga_value'])===null||$tmp==='' ? '' : $tmp);?>
" name='<?php echo $_smarty_tpl->tpl_vars['ga_id']->value;?>
' />
                        </div>
                        <?php
$_smarty_tpl->tpl_vars['attrs'] = $foreach_attrs_Sav;
}
?>
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
            <label class ="win_row_head_right" >价格</label>
            <div class ="win_row_con attr_price" id = 'price'>
                <?php if (!empty($_smarty_tpl->tpl_vars['goods']->value['price'])) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['goods']->value['price'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['price'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['price']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['price']->value) {
$_smarty_tpl->tpl_vars['price']->_loop = true;
$foreach_price_Sav = $_smarty_tpl->tpl_vars['price'];
?>
                <div class='goods_price_list' >
                    <label class='row_con_head'><?php echo $_smarty_tpl->tpl_vars['price']->value['gtp_name'];?>
</label>
                    <div class='win_row_con' id="price<?php echo $_smarty_tpl->tpl_vars['price']->value['gtp_id'];?>
">
                        <?php
$_from = $_smarty_tpl->tpl_vars['price']->value['val'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['prices'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['prices']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['prices']->value) {
$_smarty_tpl->tpl_vars['prices']->_loop = true;
$foreach_prices_Sav = $_smarty_tpl->tpl_vars['prices'];
?>
                        <div class='con_list_input' >
                            <input class='list_form_div' type='text' value="<?php echo $_smarty_tpl->tpl_vars['prices']->value['gp_name'];?>
" name='price<?php echo $_smarty_tpl->tpl_vars['prices']->value["gp_id"];?>
' />
                        </div>
                        <?php
$_smarty_tpl->tpl_vars['prices'] = $foreach_prices_Sav;
}
?>
                        <div class='con_list_add'>+</div>

                    </div>
                </div>
                <?php
$_smarty_tpl->tpl_vars['price'] = $foreach_price_Sav;
}
?>
                <?php }?>
            </div>
        </div>
        </div>
        <div class="win_row">
            <div class="left_button history_back">取消</div>
            <div class="right_button submit"><?php if (!empty($_smarty_tpl->tpl_vars['goods']->value)) {?>确定<?php } else { ?>NEXT<?php }?></div>
        </div>
    </div>
</form>

<div class='goods_price_list' id = 'goods_attr_list_template'>
    <label class='row_con_head'></label>
    <div class='win_row_con' >
    </div>
</div>
<div class='con_attr_list' id="con_attr_list_template">
    <label></label> <input class='con_attr_list_form' type='text'  />
</div>
<div class='goods_price_list' id='goods_price_list_template'>
    <label class='row_con_head'></label>
    <div class='win_row_con'>
        <div class='con_list_add'>+</div>
    </div>
</div>
<div id="con_list_input_template" class='con_list_input' >
    <input class='list_form_div' type='text' name='' />
</div>
<?php echo '<script'; ?>
>

    $(function(){
        $('#goodsAU').on('click','.con_list_add',function(){
            var name = $(this).parent().attr("id");
            var price = $('#con_list_input_template').clone();
            price.removeAttr('id');
            price.children('input').attr('name','a_'+name+'[]');
            $(this).before(price);
            $(this).prev().children('input').focus();
        });
        $("input[type] ").css('background-color','#fff').attr('disabled','disabled');
        $("input[type] ").parent().click(function(){
            $(this).children('input').removeAttr('disabled');
            $(this).children('input').focus();
        });
        $('.g_price_set').click(function(){

        });
        //验证
        var su = function(data){
            if(typeof data.g_id !== 'undefined'){
                history.pushState({foo:'bar'},"aaa",'<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/view/goodsPriceAU.php?g_id='+data.g_id);
                if(data.status){
                    $('#contents').load('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/view/goodsPriceAU.php?g_id='+data.g_id);
                }
            }
            toast(data.status,data.megs);
        };
        $.checks.checkform($('#goodsAUForm'),{
            "async": {'success': su,'beforeSend':function(){
                $("input[name='g_img']").val($('.upload_img_div >img').attr('img_url'));
            }},
            "g_numbers": {
                "name": "商品编号",
                "check": ["noSpechars", {"isLength": [5,5]}, {"isAjax": ["<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/iskeySer.php"]}],
                'location':'number_megs'
            },
            "g_name": {
                "name": "商品名称",
                "check": ['noNull']
            }
        });

    });

<?php echo '</script'; ?>
>

<?php if (empty($_smarty_tpl->tpl_vars['goods']->value)) {?>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
//        设置选择框的宽度
        if($('.select_li').length >4){
            $('.select_ul').css('width','268px');
        }
        $('.select_div').parent().mousemove(function(){
            $('.select_ul').show();
            $('.select_div').addClass('select_div_bottom');
        }).mouseout(function(){
            $('.select_ul').hide();
            $('.select_div').removeClass('select_div_bottom');
        });
        //选择商品类型
        $('.select_li').click(function(){
            $('.select_div').html($(this).html());
            $('.select_ul').hide();
            $('#attr').children().remove();
            $('#price').children().remove();
            $('#gt_id').val($(this).attr('value'));
            $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/goodsTypeInfoSer.php',{'gt_id':$(this).attr('value')},function(data){
                for(var j in data['attr']){
                    var attr = $('#goods_attr_list_template').clone();
                    attr.removeAttr('id');
                    attr.children('label').html(data['attr'][j]['gtat_name']);
                    for(var x in data['attr'][j]['GTAttr']){
                        var xx = data['attr'][j]['GTAttr'][x];
                        var attrs = $('#con_attr_list_template').clone();
                        attrs.removeAttr('id');
                        attrs.children('label').html(xx['gta_name']).attr('for','a_attr'+xx['gta_id']).attr('title',xx['gta_name']);
                        attrs.children('input').attr('name','a_attr'+xx['gta_id']).attr('id','a_attr'+xx['gta_id']);
                        attr.children('.win_row_con').append(attrs);
                    }
                    $('#attr').append(attr);
                }
                for(var i in data['price']){
                    var price = $('#goods_price_list_template').clone();
                    price.removeAttr('id');
                    price.children('div').attr('id','price'+data['price'][i]['gtp_id']);
                    price.children('label').html(data['price'][i]['gtp_name']);
                    $('#price').append(price);
                }
                $('.input_label_value').focus();
                $('.goods_price_list').each(function(){
                    $(this).css('line-height',$(this).height()+'px');
                });
            });

        });

    });
<?php echo '</script'; ?>
>
<?php }
}
}
?>