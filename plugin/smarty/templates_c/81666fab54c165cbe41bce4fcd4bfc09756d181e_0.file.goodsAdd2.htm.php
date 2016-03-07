<?php /* Smarty version 3.1.27, created on 2016-03-03 01:10:44
         compiled from "E:\xampp\mall258\admin\htmPc\goodsAdd2.htm" */ ?>
<?php
/*%%SmartyHeaderCode:148956d71e94d85b94_84212700%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81666fab54c165cbe41bce4fcd4bfc09756d181e' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\goodsAdd2.htm',
      1 => 1456938019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148956d71e94d85b94_84212700',
  'variables' => 
  array (
    'goodsType' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d71e94de2725_41980502',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d71e94de2725_41980502')) {
function content_56d71e94de2725_41980502 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '148956d71e94d85b94_84212700';
?>
<style type="text/css">
    #goodsAdd2{
        position: absolute;
        z-index: 100;
        width: 1000px;
        overflow: hidden;
    }
    .select_div{
        width: 65px;
        height: 30px;
        border: 1px solid #50D1DE;
        text-align: center;
        line-height: 30px;
        background-color: #EEEEEE;
    }
    .select_div_bottom{
        border-bottom: hidden;
    }
    .select_ul{
        display: none;
        position: absolute;
        z-index: 1000;
        overflow: hidden;
        border-top: 1px solid #50D1DE;
        border-left: 1px solid #50D1DE;
        background-color: #FFFFFF;

    }
    .select_li{
        width: 65px;
        height: 30px;
        border-bottom: 1px solid #50D1DE;
        border-right: 1px solid #50D1DE;
        text-align: center;
        line-height: 30px;
        background-color: #EEEEEE;
        float: left;
    }
    .select_li:hover{
        background-color: #50D1DE;
        cursor: pointer;
    }
    .goods_attr_list{
        height: 30px;
        line-height: 30px;
        border: 1px solid #50D1DE;
        margin: 0 2px 2px 0;
        width: 120px;
        float: left;
        overflow: hidden;
    }
    .goods_attr_list>label{
        width: 70px;
        float: right;
    }
    .goods_price_list >label{
        width: 70px;
    }
    .goods_price_list >div.win_row_con{
        width:160px;
        margin-bottom: 3px;
    }
    div.input_label{
        border: 1px solid #50D1DE;
        padding-left: 5px;
        overflow: hidden;
        display: block;
    }
    label#gt_number{
        height: 30px;
        line-height: 30px;
        width: 35px;
        float: left;
        text-align: right;
        display: block;
    }
    input.input_label_value{
        height: 30px;
        line-height: 30px;
        width:40px;
        border: hidden;
        outline:none;
    }
    div.goods_attr_list>input{
        width:40px;
        display: block;
        padding: 5px;
        height: 18px;
        border: hidden;
        outline:none;
        float: right;
    }
    .attr_price{
        width: 250px;
    }
    textarea.con_textarea{
        display: block;
        outline:none;
        border: 1px solid #50D1DE;
        margin: 2px 5px;
        padding: 3px;
        float: left;
        max-width: 150px;
        width: 150px;
    }
</style>
<form action="./server/goodsAdd2Ser.php" method="post" id="goodsAdd2Form">
    <div id='goodsAdd2' class='win show_win'>
        <input type="hidden" name="gt_id" id="gt_id" />
        <h1 class="win_head">添加商品详细资料 <div class="show_win_close">×</div></h1>
        <div class="win_column">
            <label class ="win_row_head">商品类型</label>
            <div class ="win_row_input"><div class="select_div">请选择类型</div>
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
            </div>
        </div>
        <div class="win_column">
            <label class ="win_row_head">商品编号</label>
            <div class ="win_row_input"><div class="input_label" ><label id="gt_number"></label><input tabindex="2" type="text" name="g_number" class="input_label_value"/></div></div>
        </div>
        <div class="win_column">
            <label class ="win_row_head">商品名称</label>
            <div class ="win_row_input"><input tabindex="3" type="text" name="g_name" class="form_div"/></div>
        </div>
    </div>
</form>
<?php echo '<script'; ?>
>
    function succ(data) {
        toast(data.status, data.megs);
        if(data.status){
            $('#CRUD').load('./inc/goodsAdd2.php',{'g_id':data.g_id},function(){
                Resize.resizeAdd(1000,100);
            });
        }
    }
    $(function(){
        $('.submit').click(function () {
            $(this).parents("form").submit();
        });
        if($('.select_li').length >4){
            $('.select_ul').css('width','268px');
        }
        $('.select_div').parent().mousemove(function(){
            $('.select_ul').show();
            $('.select_div').addClass('select_div_bottom');
        });
        $('.select_div').parent().mouseout(function(){
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
            $.getJSON('./server/goodsTypeInfoSer.php',{'gt_id':$(this).attr('value')},function(data){
                $('#gt_number').html(data['gt_number']);
                for(var j in data['attr']){
                    $('#attr').append("<div class='goods_attr_list'><input id='attr"+j+"' name='attr"+j+"' type='text'/><label for='attr"+j+"'  class='row_con_head'>"+data['attr'][j]+"</label></div>");
                }
                for(var i in data['price']){
                    $('#price').append("<div class='goods_price_list'><label class='row_con_head'>"+data['price'][i]+"</label><div class='win_row_con' id='price"+i+"'><div class='con_list_add'>+</div></div></div>");
                }
                $('.con_list_add').unbind();
                $('.con_list_add').click(function(){
                    var name = $(this).parent().attr("id");
                    $(this).before("<div class='con_list_input'><input class='list_form_div' type='text' name='"+name+"[]' ></div>");
                    $(this).prev().children('input').focus();
                });
                $('.input_label_value').focus();
            });

        });
        //验证
        $.checks.checkform($('#goodsAddForm'),{
            "async": {'success': succ,'beforeSend':function(){
                $('.input_label_value').first().val($('#gt_number').html()+$('.input_label_value').first().val());
            }}
//            "a_name": {
//                "name": "登录名",
//                "check": ["noSpechars", {"isLength": [4, 20]}, {"isAjax": ["/server/iskeySer.php"]}]
//            },
//            "a_nick": {
//                "name": "姓名",
//                "check": [{"isLength": [2, 20]}]
//            },
//            "a_pwd": {
//                "name": "密码",
//                "check": [{"isLength": [6, 20]}]
//            }
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
            $("#adminHeadImg>input[name='img']").val(domain + "/" + res.key);
            $("#bar").css("background-color","#50D1DE");
        };
        var uploader = Qiniu.uploader(up);
    });
<?php echo '</script'; ?>
><?php }
}
?>