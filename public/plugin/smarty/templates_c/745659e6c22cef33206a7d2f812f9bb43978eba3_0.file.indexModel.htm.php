<?php /* Smarty version 3.1.27, created on 2016-05-01 19:25:51
         compiled from "/home/xiehui/work/phpstorm/mall258/admin/tplPc/indexModel.htm" */ ?>
<?php
/*%%SmartyHeaderCode:18606439955725e7bf6dfd19_53786991%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '745659e6c22cef33206a7d2f812f9bb43978eba3' => 
    array (
      0 => '/home/xiehui/work/phpstorm/mall258/admin/tplPc/indexModel.htm',
      1 => 1462101950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18606439955725e7bf6dfd19_53786991',
  'variables' => 
  array (
    'HTTP_MODEL' => 0,
    'ss' => 0,
    'view' => 0,
    'row' => 0,
    'c1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5725e7bf714e00_51042094',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5725e7bf714e00_51042094')) {
function content_5725e7bf714e00_51042094 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18606439955725e7bf6dfd19_53786991';
?>
<style>
    .list_row_text{
        width: 150px;
        outline:none;
        border: none;
        padding: 0 5px;
        font-size: 18px;
    }
    .list_save{
        width: 28px;
        height: 28px;
        float: left;
        display: block;
        cursor: pointer;
        text-align: center;
        line-height: 28px;
        font-size: 25px;
        font-weight: bold;
    }
    .index{
        position: relative;
        overflow: hidden;
        float: left;
        margin-left: 20px;
    }
    .index_img{
        width: 30px;
        height: 30px;
        vertical-align:middle;
    }
    .select_goods{
        width: 100%;
        height: 100%;
        font-size: 18px;
    }
</style>
<div id="indexModel" class="index" save="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/indexModelAUSer.php">
    <?php echo $_smarty_tpl->tpl_vars['ss']->value;?>

    <div class="add_button">+</div>
    <li class='list_row'  id="model_list_row_template">
        <span style="width:150px"><input class="list_row_text" type="text" name ='im_name'></span>
        <span style="width:150px"><input class="list_row_text" type="text" value="default" name="im_class"></span>
        <span style="width:150px"><input class="list_row_text" type="number" min="0" value="0" name="im_sort"></span>
        <span class='list_save' >S</span>
    </li>
</div>

<div id="indexGoods" class="index" save="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/indexGoodsAUSer.php">
    <div class="add_button">+</div>
    <li class='list_row'  id="goods_list_row_template">
        <span style="width:150px"><input class="list_row_text" type="text" name ='ig_name'></span>
        <span style="width:150px"><div class="select_goods"></div></span>
        <span style="width:150px"><input class="list_row_text" type="text"  name ='ig_label'></span>
        <span style="width:80px"><img class="index_img select_img preview_img"/></span>
        <span class='list_save' >S</span>
    </li>
</div>

<?php echo '<script'; ?>
>
    $(function(){
        $('.index').on('click','.add_button',function(){
            var parent = $(this).parents('.index');
            var x = parent.find('[id$="_template"]').clone();
            x.removeAttr('id');
            var last = parent.find('.win .list_row').last();
            if(last.length < 1){
                last= parent.find('.list_row_head');
            }
            if(x.find('.select_goods').length > 0){
                x.find('.select_goods').attr('id',getRandomString(20));
            }
            if(last.hasClass('list_row_even')){
                x.addClass('list_row_odd');
                x.removeClass('list_row_even');
            }else{
                x.addClass('list_row_even');
                x.removeClass('list_row_odd');
            }
            last.after(x);
        });
        $('#indexModel').on('click','.list_save',function(){
            var p = $(this).parent();
            var ag = {};
            ag.im_name = p.find('input[name="im_name"]').val();
            ag.im_class = p.find('input[name="im_class"]').val();
            ag.im_sort = p.find('input[name="im_sort"]').val();
            if(p.attr('name') !=null){
                ag.im_id = p.attr('name');
            }
            $.post(p.parents('.index').attr('save'),ag,function(data){
                toast(data.status,data.megs);
                if(data.status){
                    if(typeof data.id !== 'undefined'){
                        ag.im_id = data.id;
                    }
                    p.attr('name',ag.im_id);
                    p.find('input').each(function(){
                        $(this).parent().html($(this).val());
                    });
                    p.find('.list_save').html('×').addClass('list_delete').removeClass('list_save');
                }
            },'json');
        });
        $('#indexModel').on('click','.list_row',function(){
            var ag = {};
            ag.im_id = $(this).attr('name');
            ag.im_name = $(this).find('[name="im_name"]').html();
            $.get('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/view/indexGoods.php',ag,function(data){
                $('#indexGoods').children('.win').remove();
                $('#indexGoods').prepend($(data));
                $('#indexGoods').attr('im_id',ag.im_id);
                $('#indexGoods').find('.list_row span[name="ig_img"]').each(function(){
                    var i = $("<img class='index_img  preview_img'/>");
                    i.attr('img_url',$(this).html()).attr('src',$(this).html()+'?imageView2/5/w/80/h/28');
                    $(this).html(i);
                });
            });
        });
        $('#indexModel').on('dblclick','.list_row',function(){
            if($(this).find('input').length >0){
                return;
            }
            var parent = $(this).parents('.index');
            $(this).children('span[name]').each(function(){
                var x = parent.find('[id$="_template"]').find('input[name="'+$(this).attr('name')+'"]').clone();
                x.val($(this).html());
                $(this).html(x);
            });
            $(this).children('.list_delete').html('S').addClass('list_save').removeClass('list_delete');
        });
        $('#indexGoods').on('click','.list_save',function(){
            var p = $(this).parent();
            var ag = {};
            ag.ig_name = p.find('input[name="ig_name"]').val();
            ag.ig_label = p.find('input[name="ig_label"]').val();
            ag.ig_sort = p.find('input[name="im_sort"]').val();
            if(p.attr('name') !=null){
                ag.ig_id = p.attr('name');
            }else{
                ag.im_id = p.parents('#indexGoods').attr('im_id');
            }
            if(p.attr('g_id') !=null){
                ag.g_id = p.attr('g_id');
            }
            if(typeof p.find('img').attr('img_url') !== 'undefined'){
                ag.ig_img = p.find('img').attr('img_url');
            }
            $.post(p.parents('.index').attr('save'),ag,function(data){
                toast(data.status,data.megs);
                if(data.status){
                    if(typeof data.id !== 'undefined'){
                        ag.im_id = data.id;
                    }
                    p.attr('name',ag.im_id);
                    p.find('input').each(function(){
                        $(this).parent().html($(this).val());
                    });
                    var sel = p.children('span[name="g_name"]');
                    sel.html(sel.children('div').html());
                    p.children('span[name="ig_img"]').removeClass('select_img');
                    p.find('.list_save').html('×').addClass('list_delete').removeClass('list_save');
                }
            },'json');
        });

        $('#indexGoods').on('dblclick','.list_row',function(){
            if($(this).find('input').length >0){
                return;
            }
            var parent = $(this).parents('.index');
            $(this).children('span[name]').each(function(){
                var x = parent.find('[id$="_template"]').find('input[name="'+$(this).attr('name')+'"]').clone();
                if(x.length >0){
                    x.val($(this).html());
                    $(this).html(x);
                }
            });
            var sel = $(this).children('span[name="g_name"]');
            sel.html($("<div class='select_goods'>"+sel.html()+"</div>"));
            $(this).children('span[name="ig_img"]').addClass('select_img');
            $(this).children('.list_delete').html('S').addClass('list_save').removeClass('list_delete');
        });
        $('.index').on('call','.select_goods',function(data,d){
            $(this).parents('.list_row').attr('g_id',d.id);
            $(this).attr('title',d.g_name).html(d.g_name);
        });

    });
<?php echo '</script'; ?>
>


<!--<li class='list_row' name="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['view']->value['table']['id']];?>
">-->
    <!--<?php
$_from = $_smarty_tpl->tpl_vars['view']->value['table']['column'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['c1'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['c1']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['c1']->value) {
$_smarty_tpl->tpl_vars['c1']->_loop = true;
$foreach_c1_Sav = $_smarty_tpl->tpl_vars['c1'];
?>-->
    <!--<span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['c1']->value['key']];?>
"  style="width:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['c1']->value['width'])===null||$tmp==='' ? '100' : $tmp);?>
px"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['c1']->value['key']];?>
</span>-->
    <!--<?php
$_smarty_tpl->tpl_vars['c1'] = $foreach_c1_Sav;
}
?>-->
    <!--<?php if (!empty($_smarty_tpl->tpl_vars['view']->value['delete'])) {?>-->
    <!--<span class="list_delete" >×</span>-->
    <!--<?php }?>-->
<!--</li>--><?php }
}
?>