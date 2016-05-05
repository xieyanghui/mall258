<?php /* Smarty version 3.1.27, created on 2016-05-01 17:54:33
         compiled from "/home/xiehui/work/phpstorm/mall258/admin/tplPc/adminImgSpace.htm" */ ?>
<?php
/*%%SmartyHeaderCode:11012735875725d259653990_17426406%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38c926634061d04a6d5c59919acefc5c72a573d0' => 
    array (
      0 => '/home/xiehui/work/phpstorm/mall258/admin/tplPc/adminImgSpace.htm',
      1 => 1462088972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11012735875725d259653990_17426406',
  'variables' => 
  array (
    'select' => 0,
    'img_link' => 0,
    'space_img' => 0,
    'space' => 0,
    'HTTP_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5725d2596f3e33_88681195',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5725d2596f3e33_88681195')) {
function content_5725d2596f3e33_88681195 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/xiehui/work/phpstorm/mall258/public/plugin/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '11012735875725d259653990_17426406';
?>
<style type="text/css">
    #img_space{
        display: block;
        margin-top:10px;
        width: 800px;
        float: left;
    }

    .img_type_ul{
        width: 800px;
        height: 30px;
        background-color: #80E5F0;
        font-size: 18px;
        overflow: hidden;
    }
    .img_type_li{
        display: block;
        position: relative;
        float: left;
        height: 28px;
        width: 70px;
        margin: 2px 5px 0;
        text-align: center;
        line-height: 30px;
    }
    .img_type_li_click{
        background-color: #FFFFFF;
        cursor: pointer;
    }
    .img_type_li:hover{
        background-color: #FFFFFF;
        cursor: pointer;
        color: #50D1DE;
    }
    .img_type_li[name='img1']{
        float: right;
    }
    .img_type_li>input{
        width: 60px;
        border: hidden;
        margin: 1px auto;
    }
    .img_type_add{
        font-size: 35px;
    }
    .img_type_delete ,.img_type_update{
        top:0;
        width:10px;
        height: 10px;
        z-index: 100;
        position: absolute;
        line-height: 1;
        display: none;
    }
    .img_type_delete{
        right: 0;
        color: red;
    }
    .img_type_update{
        left: 0;
        color: #2b542c;
    }
    .img_type_delete:hover{
        background-color: #9B410E;
    }
    .img_type_update:hover{
        background-color: #4cae4c;
    }


    .img_con{
        height: 600px;
        width: 800px;
        overflow: hidden;
    }
    .img_con_list{
        height: 600px;
        width: 800px;
        overflow-y: auto;
        overflow-x: hidden;
        display: none;
        padding-bottom:5px ;
    }
    .img_con_con{
        margin: 5px 0 0 5px;
        border: 1px solid #50D1DE;
        width: 110px;
        height: 150px;
        overflow: hidden;
        float: left;
        position: relative;
    }
    .img_con_con:hover{
        cursor: pointer;
    }
    .img_con_con_img{
        margin: 4px auto;
        width: 100px;
        height: 100px;
    }
    .img_con_con_name{
        margin:3px auto;
        width: 100px;
        border: 1px solid #50D1DE;
    }
    .img_con_con_name >input{
        outline:none;
        width: 100px;
        height: 18px;
        border: hidden;
    }
    .img_con_con_time {
        width: 100px;
        text-align: center;
        margin: 3px auto;
    }
    .img_con_con_bar{
        float: left;
        height: 4px;
        top: 2px;
        width: 0;
        background-color: #2aabd2;
    }
    .img_con_util{
        width: 100%;
        height: 20px;
        position: relative;
        float: left;
        padding-bottom: 5px;
    }
    .img_con_util >div{
        float: left;
        width: 60px;
        height: 20px;
        line-height: 20px;
        margin: 5px;
        position: relative;
        text-align: center;
        background-color: #BCEDF2;
    }
    .img_con_util >div:hover{
        cursor: pointer;
        background-color: #80E5F0;
    }
    .img_con_con_mouse{
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 110px;
        background-color: #BCEDF2;
        opacity: 0.5;
        display: none;
    }
    .img_con_con_click{
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #80E5F0;
        opacity: 0.5;
        display: none;
    }
    .img_con_move_ul{
        position: absolute;
        z-index: 101;
        background-color: #BCEDF2;
        text-align: left;
        width: 100%;
        display: none;
    }
    .img_con_move_li:hover{
        background-color: #80E5F0;
    }
</style>
<?php if ($_smarty_tpl->tpl_vars['select']->value) {?>
<style type="text/css">
    #img_space{
        position: absolute;
        top: 50px;
        left: 400px;
        float: left;
        z-index:999;
    }
</style>
<?php }?>
<div id='img_space' class='win'>
    <?php if ($_smarty_tpl->tpl_vars['select']->value) {?>
    <div class="show_win_close">×</div>
    <input type="hidden" name="img_link" value="<?php echo $_smarty_tpl->tpl_vars['img_link']->value;?>
">
    <input type="hidden" name="space_img" value="<?php echo $_smarty_tpl->tpl_vars['space_img']->value;?>
">
    <?php }?>
    <h1 class="win_head">图片空间</h1>
    <ul class="img_type_ul">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['index'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['space']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
        <li class="img_type_li" name="img<?php echo $_smarty_tpl->tpl_vars['space']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['ait_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['space']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['ait_name'];?>
<div class="img_type_update">✎</div><div class="img_type_delete">×</div></li>
        <?php endfor; endif; ?>
        <?php if (!$_smarty_tpl->tpl_vars['select']->value) {?>
        <li class="img_type_add img_type_li">+</li>
        <?php }?>
    </ul>
    <div class="img_con">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['index'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['space']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
        <div class="img_con_list" name="img<?php echo $_smarty_tpl->tpl_vars['space']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['ait_id'];?>
" >
            <?php if (!$_smarty_tpl->tpl_vars['select']->value) {?>
            <div class="img_con_util">
                <?php if ($_smarty_tpl->tpl_vars['space']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['ait_id'] == 1) {?>
                <div class="img_con_delete">彻底删除</div>
                <div class="img_con_move">还原到</div>
                <?php } else { ?>
                <div class="img_con_delete">删除</div>
                <div class="img_con_move">移动到</div>
                <?php }?>

                <div class="img_con_select">全选</div>
                <div class="img_con_cancel">取消</div>
            </div>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['ind'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['ind']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['name'] = 'ind';
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['space']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['value']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['ind']['total']);
?>
            <div class="img_con_con preview_img" name="imgs<?php echo $_smarty_tpl->tpl_vars['space']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['value'][$_smarty_tpl->getVariable('smarty')->value['section']['ind']['index']]['ais_id'];?>
" preview = ".img_con_con[name='imgs<?php echo $_smarty_tpl->tpl_vars['space']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['value'][$_smarty_tpl->getVariable('smarty')->value['section']['ind']['index']]['ais_id'];?>
'] img.preview">
                <div class="img_con_con_mouse " ></div><div class="img_con_con_click"></div>
                <div class="img_con_con_img"><img class="preview" src="<?php echo $_smarty_tpl->tpl_vars['space']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['value'][$_smarty_tpl->getVariable('smarty')->value['section']['ind']['index']]['ais_img_url'];?>
?imageView2/5/w/100/h/100"> </div>
                <div class="img_con_con_name"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['space']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['value'][$_smarty_tpl->getVariable('smarty')->value['section']['ind']['index']]['ais_name'];?>
" ></div>
                <div class="img_con_con_time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['space']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['value'][$_smarty_tpl->getVariable('smarty')->value['section']['ind']['index']]['ais_time'],"%y-%m-%d %H:%M");?>
</div>
            </div>
            <?php endfor; endif; ?>
        </div>
        <?php endfor; endif; ?>
    </div>
</div>
<?php if (!$_smarty_tpl->tpl_vars['select']->value) {?>
<div id = 'img_add_button' class="add_button">+</div>
<?php }?>
<input type="hidden" name="isUpload" value="no" >
<?php echo '<script'; ?>
 type="text/javascript">
    $(function () {
        //默认显示第一个
        $('.img_type_li').eq(1).addClass('img_type_li_click');
        $('.img_con_list').eq(1).show();

        //图片错误提示
        $('.img_con_con_img>img').error(function(){
            $(this).attr('src','http://7xkkh3.com1.z0.glb.clouddn.com/imgerror.jpg?imageView2/5/w/100/h/100');
        });

        //选择图片视觉效果
        $('.img_con').on('mouseleave','.img_con_con',function(){
            $(this).children('.img_con_con_mouse').hide();
        });
        $('.img_con').on('mouseenter','.img_con_con',function(){
            $(this).children('.img_con_con_mouse').show();
        });
    });

<?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['select']->value) {?>
<?php echo '<script'; ?>
 type="text/javascript">
    $('#img_space_div').on('click','.show_win_close',function(){
        $('#img_space_div').hide();
    });
    $('.img_type_ul').on('click','.img_type_li',function(){
        //选择分类
        $(this).addClass('img_type_li_click');
        $(this).siblings().removeClass('img_type_li_click');
        $(".img_con_list[name='"+ $(this).attr('name')+"']").show().siblings().hide();
    });
    //选择图片
    $('.img_con').on('dblclick','.img_con_con',function(){
        var src = $(this).find('img').first().attr('src');
        src = src.substr(0,src.lastIndexOf('?'));
        var self = $(".select_img[space_img='"+$('#img_space').find("input[name='space_img']").val()+"']");
        var preview =$("img[img_link='"+$('#img_space').find("input[name='img_link']").val()+"']");
        if(!(typeof (self.attr('callback')) == 'undefined' || self.attr('callback') == "")){
            self.attr('img_url',src);
            self.trigger(self.attr('callback'));
        }else{
            preview.attr("img_url",src);
            var w = preview.parent().width();
            var h = preview.parent().height();
            preview.attr("src", src + "?imageView2/5/w/"+w+"/h/"+h);
        }
        $('#img_space_div').hide();
    });
<?php echo '</script'; ?>
>
<?php } else { ?>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        //删除分类
        $('.img_type_ul').on('click','.img_type_delete',function(e){
            var type = $(this).parent();
            $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/adminImgTypeDeleteSer.php',{'ait_id':$(this).parent().attr('name').substr(3)},function(data){
                toast(data.status, data.megs);
                if (data.status){
                    $('.img_type_li').eq(1).trigger('click');
                    type.remove();
                    var con = $(".img_con_list[name='"+type.attr('name')+"'] >.img_con_con");
                    con.children('.img_con_con_click').hide();
                    con.children('.img_con_con_time').html("刚刚");
                    con.insertAfter($(".img_con_list[name='img1'] >.img_con_util"));
                    $(".img_con_list[name='"+type.attr('name')+"']").remove();
                }
            });
            e.stopPropagation();
        });

        //修改分类名称
        $('.img_type_ul').on('click','.img_type_update',function(e){
            var type = $(this).parent();
            type.children('div').remove();
            var yuan = type.html();
            type.html("<input type='text' value='"+type.html()+"' class='form_div'>");
            typeVerify(type.find('input'),function(value){
                if(value == yuan){
                    type.html(yuan+"<div class='img_type_update'>✎</div><div class='img_type_delete'>×</div>");
                    return;
                }
                $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
//server/adminImgTypeUpdateSer.php', {'ait_name': value,'ait_id':type.attr('name').substr(3)}, function (data) {
                    toast(data.status, data.megs);
                    if (data.status) {
                        type.html(value);
                    } else {
                        type.html(yuan);
                    }
                    type.append("<div class='img_type_update'>✎</div><div class='img_type_delete'>×</div>");
                });
            });
            e.stopPropagation();
        });

        //验证分类名
        var typeVerify = function(imgType,fun){
            imgType.focus();
            imgType.blur(function() {
                var $slfe = $(this);
                var b = true;
                $(this).parent().siblings().map(function () {
                    var clo = $(this).clone();
                    clo.children('div').remove();

                    if ($slfe.val() == clo.html()) {
                        toast(false, '重复了');
                        b = false;
                    }
                });
                if (b) {
                    fun($slfe.val());
                }
            });
        }

        //选择分类,与增加分类
        $('.img_type_ul').on('click','.img_type_li',function(){
            if($("input[name='isUpload']").val() != 'no'){return;}
            if($(this).hasClass('img_type_add')){
                $(this).before("<li class='img_type_li'> <input type='text' class='form_div'></li>");
                var type = $(this).prev();
                typeVerify($(this).prev().find('input'),function(value){
                    $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
//server/adminImgTypeAddSer.php', {'ait_name': value}, function (data) {
                        toast(data.status, data.megs);
                        if (data.status) {
                            type.attr('name','img'+data.id);
                            type.html(value+"<div class='img_type_update'>✎</div><div class='img_type_delete'>×</div>");
                            var icl = $('.img_con_list').last().clone();
                            icl.children(".img_con_con").remove();
                            icl.attr("name",'img'+data.id);
                            $('.img_con').append(icl);
                            type.addClass('img_type_li_click');
                            type.siblings().removeClass('img_type_li_click');
                            $(".img_con_list[name='"+ type.attr('name')+"']").show().siblings().hide();

                        } else {
                            type.remove();
                        }
                    });
                });



            }else{
                //选择分类
                $(this).addClass('img_type_li_click');
                $(this).siblings().removeClass('img_type_li_click');
                $(".img_con_list[name='"+ $(this).attr('name')+"']").show().siblings().hide();
            }




        });

        //分类视觉效果
        $('.img_type_ul').on('mouseleave','.img_type_li',function(){
            $(this).children('div').hide();
        });
        $('.img_type_ul').on('mouseenter','.img_type_li',function(){
            if($(this).attr('name')=='img1'){return;}
            $(this).children('div').show();
        });

        //选择图片
        $('.img_con').on('click','.img_con_con',function(){
            if($(this).children('.img_con_con_click').is(':visible')){
                $(this).children('.img_con_con_click').hide();
                $(this).attr("select",'0');
            }else{
                $(this).children('.img_con_con_click').show();
                $(this).attr("select",'1');
            }
        });

        //修改图片信息
        var con_name_temp;
        $('.img_con').on('click','.img_con_con_name',function(e){
            con_name_temp  = $(this).children('input').val();
            e.stopPropagation();
        });
        $('.img_con').on('blur','input',function(e){
            if(con_name_temp == $(this).val()){return;}
            var slfe = $(this);
            $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
//server/adminImgSpaceUpdateSer.php',{'ais_id':$(this).parent().parent().attr('name').substr(4),'ais_name':$(this).val()},function(data){
                toast(data.status,data.megs);
                if(!data.status){
                    slfe.val(con_name_temp);
                }
            });
            e.stopPropagation();
        });

        //删除图片
        $('.img_con').on('click','.img_con_delete ',function(e){
            var slfe = $(this).parent().parent();
            if(slfe.children(".img_con_con[select='1']").length ==0){return;}
            var ais_id= [];
            var ait_id = slfe.attr('name').substr(3);
            slfe.children(".img_con_con[select='1']").map(function(){
                ais_id.push($(this).attr('name').substr(4));
            });
            $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
//server/adminImgSpaceDeleteSer.php',{'ais_id':ais_id,'ait_id':ait_id},function(data){
                toast(data.status,data.megs);
                if(data.status){
                    if(ait_id == 1){
                        slfe.children(".img_con_con[select='1']").remove();
                    }else{
                        slfe.children(".img_con_con[select='1']").children('.img_con_con_click').hide();
                        slfe.children(".img_con_con[select='1']").children('.img_con_con_time').html("刚刚");
                       // slfe.children(".img_con_con[select='1']")
                        slfe.children(".img_con_con[select='1']").attr('select','0').insertAfter($(".img_con_list[name='img1'] >.img_con_util"));
                    }
                }
            });
            e.stopPropagation();
        });

        //移动图片按钮
        $('.img_con').on('mouseenter','.img_con_move',function(e){
            var slfe = $(this).parent().parent();
            var ls = $(this).find('li').length;
            var lists = slfe.siblings('.img_con_list').length;
            if(( ls != lists -1 && slfe.attr("name") != "img1") || (slfe.attr("name") == "img1" && ls !=lists)){
                var mul = $("<ul class='img_con_move_ul'></ul>");
                slfe.siblings('.img_con_list').map(function(){
                    var name = $(this).attr('name');
                    if(name == "img1"){return;}
                    var htm = $(".img_type_li[name='"+name+"']").clone();
                    htm.children().remove('div');
                    htm = htm.html();
                    mul.append("<li class='img_con_move_li' name='"+$(this).attr('name')+"'>"+htm+"</li>");
                });
                $(this).append(mul);
            }
            $(this).children('ul.img_con_move_ul').show();
            e.stopPropagation();
        });
        $('.img_con').on('mouseleave','.img_con_move',function(e){
            $(this).children('ul.img_con_move_ul').hide();
            e.stopPropagation();
        });
        //移动图片到
        $('.img_con').on('click','.img_con_move_li',function(e){
            var con = $(this).parents('.img_con_list').children(".img_con_con[select='1']");
            var ais_id= [];
            var ait_id = $(this).attr('name').substr(3);
            con.map(function(){
                ais_id.push($(this).attr('name').substr(4));
            });
            $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
//server/adminImgSpaceUpdateSer.php',{'ais_id':ais_id,'ait_id':ait_id},function(data){
                toast(data.status,data.megs);
                if(data.status){
                    con.children('.img_con_con_click').hide();
                    con.children('.img_con_con_time').html("刚刚");
                    con.attr('select','0');
                    con.insertAfter($(".img_con_list[name='img"+ait_id+"'] >.img_con_util"));
                }
            });
            e.stopPropagation();
        });

        //取消已选
        $('.img_con').on('click','.img_con_cancel',function(e){
            $(this).parent().siblings('.img_con_con').attr('select','0');
            $(this).parent().siblings('.img_con_con').children('.img_con_con_click').hide();
            e.stopPropagation();
        });

        //全选图片
        $('.img_con').on('click','.img_con_select',function(e){
            $(this).parent().siblings('.img_con_con').attr('select','1');
            $(this).parent().siblings('.img_con_con').children('.img_con_con_click').show();
            e.stopPropagation();
        });
    });
    $(function(){
        //上传
        var up =  getUpload();
        up.browse_button = "img_add_button";
        up.multi_selection =true;
        up['init'].UploadProgress = function(up,file){
            $(".img_con_list >div[name='"+file.id+"']").find('div.img_con_con_bar').css('width',file.percent+"%");
        };
        up['init'].FilesAdded = function(ups,file){
            if($('.img_con_list:visible').attr('name')== 'img1'){
                ups.stop();
                toast(true,'回收站不能上传');
            }
            $("input[name='isUpload']").val('yse');
        };
        up['init'].BeforeUpload = function(up,file){
            if($('.img_con_list:visible').attr('name')== 'img1'){ return;}
            var name =  file.name;
            name = name.substr(0,name.lastIndexOf('.'));
            $('.img_con_list:visible>div.img_con_util').after("<div class ='img_con_con preview_img' name = 'imgs"+file.id+"'><div class=' img_con_con_mouse' ></div><div class='img_con_con_click'></div><div class='img_con_con_img'></div><div class='img_con_con_name'><input type='text' value='"+name+"'></div><div class='img_con_con_time'><div class='img_con_con_bar'></div></div></div>");
        };
        up['init'].UploadComplete = function(){
            $("input[name='isUpload']").val('no');
        };
        up['init'].FileUploaded = function (up, file, info) {
           // alert('aaaaaaaaa');
            var div = $(".img_con_list >div[name='imgs"+file.id+"']");
            console.log(div);
            var domain = up.getOption('domain');
            var res = JSON.parse(info);
            div.children('.img_con_con_img').append("<img class='preview' src='"+domain + "/" + res.key + "?imageView2/5/w/100/h/100"+"'>");
            var ait_id = div.parent().attr('name').substr(3);
            $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/adminImgSpaceAddSer.php',{'ais_name':file.name.substr(0,file.name.lastIndexOf('.')),'ais_img_url':domain + "/" + res.key,'ait_id':ait_id},function(data){
                toast(data.status,data.megs);
                if(data.status){
                    div.children('.img_con_con_time').html("刚刚");
                    div.attr('name','imgs'+data.id);
                }
            });

        };
        var uploader = Qiniu.uploader(up);
    });
<?php echo '</script'; ?>
>
<?php }

}
}
?>