<?php /* Smarty version 3.1.27, created on 2016-05-09 11:42:33
         compiled from "/home/xiehui/work/mall258/admin/tplPc/goodsTextAU.htm" */ ?>
<?php
/*%%SmartyHeaderCode:20621612735730072951b047_91789430%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0a1912a8faa9c48486ffdd5a6f7620ce1e2facf' => 
    array (
      0 => '/home/xiehui/work/mall258/admin/tplPc/goodsTextAU.htm',
      1 => 1462765349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20621612735730072951b047_91789430',
  'variables' => 
  array (
    'g' => 0,
    'HTTP_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57300729520ff4_24947072',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57300729520ff4_24947072')) {
function content_57300729520ff4_24947072 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20621612735730072951b047_91789430';
?>

<style type="text/css">
    /*商品详细资料*/
    #goodsTextAU{
        width: 800px;
    }
    /*列样式*/
    .win_column{
        border: solid 1px #50D1DE;
        height: 600px;
        overflow: auto;
    }
    /*列样式下的标题*/
    .win_column_head{
        background-color: #80E5F0;
        text-align: center;
        overflow: hidden;
        height: 30px;
        line-height: 30px;
        font-weight: bold;
        font-size: 25px;
    }

    /*价格列*/
    .goods_price{
        float: left;
        width: 410px;
    }


    /*价格列下的主行*/
    .goods_price_li{
        width: 100%;
        overflow: hidden;
    }

    /*价格属性标题*/
    .goods_price_head{
        width: 80px;
        text-align: right;
        float: left;
        color: #07A1B1;
        font-size: 15px;
        display: block;
        height: 50px;
        line-height: 50px;
    }
    /*价格属性内容*/
    .goods_price_con{
        border: 1px solid #50D1DE;
        margin: 5px 0 5px 5px;
        padding: 3px 0 0 3px;
        width: 300px;
        float: left;
    }
    /*价格属性*/
    .goods_price_con_li{
        width: 70px;
        height: 30px;
        line-height: 30px;
        border: 1px solid #50D1DE;
        margin: 0 3px 3px 0;
        float: left;
        text-align: center;
    }
    .goods_price_con_li:hover{
        cursor: pointer;
        background-color: #50D1DE;
    }
    .goods_price_con_li_click{
        background-color: #50D1DE;
        color:red;
    }

    /*价格值行*/
    .goods_price_con_info{
        width: 380px;
        overflow: hidden;
        margin: 5px auto;
        border: 1px solid #50D1DE;
        padding: 2px 0 0 2px;
    }
    /*价格值*/
    .goods_price_con_info >div.goods_price_con_list{
        width: 189px;
        border: hidden;
        height:auto;
        margin: 0;
        float: left;
    }
    /*价格值列*/
    .goods_price_con_prop{
        float: left;
        width: 43px;
        border: 1px solid #50D1DE;
        margin: 0 2px 2px 0;
        overflow: hidden;
        border-bottom-style: hidden;
        background-color: #ffffff;
    }
    /*价格值单元格*/
    .goods_td{
        width: 100%;
        height: 16px;
        text-align: center;
        line-height: 16px;
        border-bottom: 1px solid #50D1DE;
    }
    /*价格值选中状态*/
    .goods_price_con_prop_select{
        border-bottom: 1px solid red;
    }
    /*价格值行匹配状态*/
    #goods_price_con_info_add{
        background-color: #50D1DE;
    }

    .goods_price_con_prop_name{

    }
    /*商品数量*/
    .goods_price_con_sum{
        width: 40px;
        float: right;
    }
    /*数字*/
    input.numbers{
        border-style: hidden;
        outline:none;
        width: 100%;
    }
    /*商品价格*/
    .goods_price_con_price{
        width: 57px;
        float: right;
    }

    /*商品路径*/
    .goods_price_con_img{
        height: 33px;
        width: 33px;
        float: right;
        border: 1px solid #50D1DE;
    }
    /*默认商品属性*/
    #goods_price_default{
        display: block;
    }
    #goods_price_default>.goods_price_con_list{
        line-height: 35px;
        text-align: center;
        color: #333333;
        font-size: 18px;
        background-color: #eeeeee ;
    }
    /*CRUD工具*/
    .goods_price_con_util{
        float: right;
    }
    /*详细资料列*/
    .goods_all{
        float: right;
        width: 780px;
        position: relative;
        overflow-x: hidden;
    }

    #allEdit{
        width: 100%;
        height:560px;
        overflow-x: hidden;
    }

    .win_column_util{
        clear: left;
        width: 100%;
    }
</style>
<div id='goodsTextAU' class='win'>
    <input type="hidden" name="g_id" id="g_id" value="<?php echo $_smarty_tpl->tpl_vars['g']->value['g_id'];?>
" />
    <h1 class="win_head">商品详细介绍</h1>

    <!--商品详细资料-->
    <div id="allEdit"></div>
    <div class = "win_column_util">
        <div class ='left_button history_back'>取消</div>
        <div class="right_button submit_add">提交</div>
    </div>
</div>

<?php echo '<script'; ?>
>
    $(function(){
        var editor = new wangEditor('allEdit');
        editor.config.menus=[
            'bold',
            'underline',
            'italic',
            'strikethrough',
            'eraser',
            'forecolor',
            'bgcolor',
            'fontfamily',
            'fontsize',
            'head',
            'unorderlist',
            'orderlist',
            'alignleft',
            'aligncenter',
            'alignright',
            'link',
            'unlink',
            'table',
            'undo',
            'location',
            'img'
        ];
        editor.config.mapAk="FB48626872cb58590f33faf85ea639fd";
        editor.create();
        var img_button = $('.wangeditor-menu-img-picture').parents('.menu-item');
        img_button.unbind('click').addClass('select_img').attr('callback','imgCall');
        img_button.find('a').unbind('click').attr('href',"javascript:void()");
        img_button.bind('imgCall',function(){
            editor.$txt.append("<img src='"+$(this).attr('img_url')+"?imageMogr2/thumbnail/680x'/>");
        });
        $('.submit_add').click(function(){
            var html = editor.$txt.html();
            html = filterXSS(html);
            $.post('<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/goodsTextAUSer.php',{'g_id':$("input[name='g_id']").val(),'g_text':html},function(data) {
                toast(data.status,data.megs);
                if(data.status){
                    $('.history_back').trigger('click');
                }else{
                    toast(data.status,data.megs);
                }
            },'json');
        });
        editor.$txt.append("<?php echo strtr($_smarty_tpl->tpl_vars['g']->value['g_text'], array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
");


    });
<?php echo '</script'; ?>
><?php }
}
?>