<?php /* Smarty version 3.1.27, created on 2016-05-01 02:06:02
         compiled from "/home/xiehui/work/phpstorm/mall258/admin/tplPc/goodsPriceAU.htm" */ ?>
<?php
/*%%SmartyHeaderCode:11096350285724f40ab34442_10477292%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc1a72672056b05c15811ce133f787b1b1c52636' => 
    array (
      0 => '/home/xiehui/work/phpstorm/mall258/admin/tplPc/goodsPriceAU.htm',
      1 => 1462039540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11096350285724f40ab34442_10477292',
  'variables' => 
  array (
    'HTTP_MODEL' => 0,
    'g' => 0,
    'value' => 0,
    'v' => 0,
    'g_price' => 0,
    'gpi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5724f40ab61061_95347592',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5724f40ab61061_95347592')) {
function content_5724f40ab61061_95347592 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11096350285724f40ab34442_10477292';
?>

<style type="text/css">
    /*商品详细资料*/
    #goodsPriceAU{
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
        width: 700px;
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
        width: 700px;
        overflow: hidden;
        margin: 5px auto;
        border: 1px solid #50D1DE;
        padding: 2px 0 0 2px;
    }
    /*价格值*/
    #goods_price_default>div.goods_price_con_list{
        width: 577px;
    }
    .goods_price_con_info >div.goods_price_con_list{
        width: 420px;
        border: hidden;
        height:auto;
        margin: 0;
        float: left;
    }
    /*价格值列*/
    .goods_price_con_prop{
        float: left;
        width: 100px;
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
        background-color: #50D1DE;
    }
    /*价格值行匹配状态*/
    #goods_price_con_info_add{
        background-color: #50D1DE;
    }

    .goods_price_con_prop_name{

    }
    /*商品数量*/
    .goods_price_con_sum{
        width: 60px;
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
        width: 80px;
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
    .price_img_s{
        width: 100%;
        height: 100%;
    }
</style>
<form action="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/goodsAU2Ser.php" method="post" id="goodsAU2Form">
    <div id='goodsPriceAU' class='win'>
        <input type="hidden" name="g_id" id="g_id" value="<?php echo $_smarty_tpl->tpl_vars['g']->value['g_id'];?>
" />
        <h1 class="win_head">商品价格详情</h1>
        <!--商品价格CRUD-->
        <?php
$_from = $_smarty_tpl->tpl_vars['g']->value['GTPrice'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars['value'];
?>
        <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['GPrice'])) {?>
        <div class='goods_price_li' gtp_id ="<?php echo $_smarty_tpl->tpl_vars['value']->value['gtp_id'];?>
">
            <label class='goods_price_head'><?php echo $_smarty_tpl->tpl_vars['value']->value['gtp_name'];?>
</label>
            <div class='goods_price_con'>
                <?php
$_from = $_smarty_tpl->tpl_vars['value']->value['GPrice'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                <div class='goods_price_con_li' gp_id="<?php echo $_smarty_tpl->tpl_vars['v']->value['gp_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['gp_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['gp_name'];?>
</div>
                <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
            </div>
        </div>
        <?php }?>

        <?php
$_smarty_tpl->tpl_vars['value'] = $foreach_value_Sav;
}
?>
        <div class="goods_price_con_info" id="goods_price_default">
            <div class="goods_price_con_list">默认价格</div>
            <div class="goods_price_con_img goods_price_con_prop">
                <img class="preview_img price_img_s" src="<?php echo $_smarty_tpl->tpl_vars['g']->value['g_img'];?>
?imageView2/5/w/33/h/33" />
            </div>
            <div class="goods_price_con_price goods_price_con_prop">
                <div class="goods_td">价格</div>
                <div class="goods_td"><?php echo $_smarty_tpl->tpl_vars['g']->value['g_price'];?>
</div>
            </div>
        </div>
        <div id="goods_price_con_info_template">
            <div class="goods_price_con_list">
            </div>
            <div class="goods_price_con_img goods_price_con_prop select_img" >
                <img img_url="" class="preview_img goods_price_imgs price_img_s" />
            </div>
            <div class="goods_price_con_price goods_price_con_prop">
                <div class="goods_td">价格</div>
                <div class="goods_td goods_price_input"><input class="numbers" min="0" type="number" name="price" value="<?php echo $_smarty_tpl->tpl_vars['g_price']->value;?>
" ></div>
            </div>
            <div class="goods_price_con_sum goods_price_con_prop">
                <div class="goods_td">数量</div>
                <div class="goods_td goods_sum_input"><input class="numbers" min="0" type="number" name="sum" value="0"></div>
            </div>
        </div>

        <div class = "win_column_util">
            <div class ='left_button history_back'>取消</div>
            <div class="right_button submit_add" >提交</div>
        </div>
    </div>
</form>

<?php echo '<script'; ?>
>
    $(function (){
        if($('.goods_price_con_info[gpi_id]').length > 0){
            $('.submit_add').html('NEXT');
        }
        $('.submit_add').click(function(){
            var json =[];
            $('.goods_price_con_info').each(function(){
                if(typeof $(this).attr('id') !== 'undefined') return;
                var j ={};
                if(typeof $(this).attr('gpi_id') !== 'undefined'){
                    j['gpi_id'] = $(this).attr('gpi_id');
                }else{
                    j['g_id'] = $("input[name='g_id']").val();
                }
                j['gpi_sum'] = $(this).find('input[name="sum"]').val();
                j['gpi_price'] = $(this).find('input[name="price"]').val();
                j['gpi_img'] = $(this).find('.goods_price_imgs').attr('img_url');
                j['gpl'] =[];
                $(this).find('.goods_price_con_list >.goods_price_con_prop').each(function(){
                    j['gpl'].push($(this).attr('gp_id'));
                });
                json.push(j);
            });
           // console.log(JSON.stringify(json));
            $.post("<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;?>
/server/goodsPriceAUSer.php",{'data':JSON.stringify(json)},function(data){
                toast(data.status,data.megs);
                if(data.status){
                    if($('.goods_price_con_info[gpi_id]').length > 0){
                        $('.history_back').trigger('click');
                    }else{

                    }
                }
            },'json');
        });
        var dd = function(){
            var gpi = JSON.parse("<?php echo strtr($_smarty_tpl->tpl_vars['gpi']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
");
            var map = $('.goods_price_li').map(function(){
                var d = $(this).attr('gtp_id');
                return $(this).find('.goods_price_con_li').map(function(){
                    return $(this).attr('gp_id');
                });
            });
            var result=new Array();//结果保存到这个数组
            function toResult(arrIndex,aresult)
            {
                if(arrIndex>=map.length) {result.push(aresult);return;}
                var aArr=map[arrIndex];
                if(!aresult) aresult=new Array();
                for(var i=0;i<aArr.length;i++)
                {
                    var theResult=aresult.slice(0,aresult.length);
                    theResult.push(aArr[i]);
                    toResult(arrIndex+1,theResult);
                }
            }
            toResult(0);
            for(var r in result){
                var a = $('#goods_price_con_info_template').clone();
                a.removeAttr('id');
                a.addClass('goods_price_con_info');
                $('.goods_price_con_info').last().after(a);
                a.find('.goods_price_con_list >div').remove();
                var gpi_id =null;
                for(var pi in gpi){
                    if(result[r].sort().join("") ===  gpi[pi]['gpl'].sort().join("")){
                        gpi_id = gpi[pi]['gpi_id'];
                        a.find('input[name="sum"]').val(gpi[pi]['gpi_sum']);
                        a.find('input[name="price"]').val(gpi[pi]['gpi_price']);
                        a.find('.goods_price_imgs').attr('src',gpi[pi]['gpi_img']+'?imageView2/5/w/33/h/33').attr('img_url',gpi[pi]['gpi_img']);
                        break;
                    }
                }
                a.attr('gpi_id',gpi_id);
                for(var rr in result[r]){
                    console.log();
                    var gp_li = $(".goods_price_con_li[gp_id='"+result[r][rr]+"']");
                    var gp_name = gp_li.html();
                    var gtp_id = gp_li.parents('.goods_price_li').attr('gtp_id');
                    var gtp_name = gp_li.parent().siblings('.goods_price_head').html();
                    a.children('.goods_price_con_list').append(" <div class='goods_price_con_prop' title='"+gp_name+"' gtp_id='"+gtp_id+"' gp_id='"+result[r][rr]+"'><div class='goods_td goods_price_con_prop_name'>"+gtp_name+"</div> <div class='goods_td goods_price_con_prop_value'>"+gp_name+"</div> </div>");
                }
                a.show();
                if(gpi_id === null){
                    a.find('input[name="price"]').val("<?php echo $_smarty_tpl->tpl_vars['g']->value['g_price'];?>
");
                    a.find('.goods_price_imgs').attr('src',"<?php echo $_smarty_tpl->tpl_vars['g']->value['g_img'];?>
?imageView2/5/w/33/h/33").attr('img_url',"<?php echo $_smarty_tpl->tpl_vars['g']->value['g_img'];?>
");
                }
            }

        };
        dd();
        //选择价格属性
        $('.goods_price_con_li').click(function(){
            if(!$(this).hasClass('goods_price_con_li_click')){ //判断是取消还是选定
                $(this).addClass('goods_price_con_li_click');
                $(this).siblings().removeClass('goods_price_con_li_click');
                var gtp_id = $(this).parents('.goods_price_li').attr('gtp_id');;
                //console.log(gtp_id);
                $(".goods_price_con_info  >.goods_price_con_list >.goods_price_con_prop[gtp_id='"+gtp_id+"']").removeClass('goods_price_con_prop_select');
                $(".goods_price_con_prop[gp_id='"+$(this).attr('gp_id')+"']").addClass('goods_price_con_prop_select');
            }else{
                //取消选定的属性
                $(this).removeClass('goods_price_con_li_click');
                $(".goods_price_con_prop[gp_id='"+$(this).attr('gp_id')+"']").removeClass('goods_price_con_prop_select');
            }

        });
    });
<?php echo '</script'; ?>
><?php }
}
?>