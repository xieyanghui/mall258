<?php /* Smarty version 3.1.27, created on 2016-04-30 04:27:23
         compiled from "/home/xiehui/work/phpstorm/mall258/tplPc/goods.htm" */ ?>
<?php
/*%%SmartyHeaderCode:16006519705723c3ab547436_59903193%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81456bd71a2b8e3be64a7587286b70552b27352c' => 
    array (
      0 => '/home/xiehui/work/phpstorm/mall258/tplPc/goods.htm',
      1 => 1461924077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16006519705723c3ab547436_59903193',
  'variables' => 
  array (
    'top' => 0,
    'HTTP_HOST' => 0,
    'g' => 0,
    'gpi' => 0,
    'price' => 0,
    'prices' => 0,
    'attr' => 0,
    'attr_s' => 0,
    'gpi_s' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5723c3ab576f36_44018398',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5723c3ab576f36_44018398')) {
function content_5723c3ab576f36_44018398 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16006519705723c3ab547436_59903193';
echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div id ='top_div'>
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['top']->value)===null||$tmp==='' ? '' : $tmp);?>

</div>
<div class="clear"></div>
<ul class="goods_nav wrap">
    <li class = "goods_nav_li"> <a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
">首页</a></li><span>></span>
    <li class = "goods_nav_li"> <a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
">全部商品</a></li><span>></span>
    <li class = "goods_nav_li"> <a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['g']->value['gt_name'];?>
</a></li><span>></span>
    <li class = "goods_nav_li"><?php echo $_smarty_tpl->tpl_vars['g']->value['g_name'];?>
</li>
</ul>
<div class="goods_head wrap">
    <div class="goods_head_img">
        <div class="goods_show_img">
            <img imgUrl="<?php echo $_smarty_tpl->tpl_vars['g']->value['g_img'];?>
" src="">
            <div class="goods_view_img"></div>
            <div class ='goods_max_img'></div>
        </div>
        <div class="goods_roll_img">
            <div class="goods_roll_left"> </div>
            <ul>
                <?php
$_from = $_smarty_tpl->tpl_vars['g']->value['gpi'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['gpi'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['gpi']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gpi']->value) {
$_smarty_tpl->tpl_vars['gpi']->_loop = true;
$foreach_gpi_Sav = $_smarty_tpl->tpl_vars['gpi'];
?>
                <li class="goods_roll_img_s goods_roll_img_s_n" name="<?php echo $_smarty_tpl->tpl_vars['gpi']->value['gpi_id'];?>
">
                    <img imgUrl="<?php echo $_smarty_tpl->tpl_vars['gpi']->value['gpi_img'];?>
" src=""/>
                </li>
                <?php
$_smarty_tpl->tpl_vars['gpi'] = $foreach_gpi_Sav;
}
?>
            </ul>
            <div class="goods_roll_right"></div>
        </div>
    </div>
    <div class="goods_info">
        <h2><?php echo $_smarty_tpl->tpl_vars['g']->value['g_name'];?>
</h2>
        <div class = "goods_price_value">
            <strong>￥ </strong><strong class="goods_price_value_v"></strong>
        </div>
        <div class="goods_info_price">
            <?php
$_from = $_smarty_tpl->tpl_vars['g']->value['GPrice'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['price'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['price']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['price']->key => $_smarty_tpl->tpl_vars['price']->value) {
$_smarty_tpl->tpl_vars['price']->_loop = true;
$foreach_price_Sav = $_smarty_tpl->tpl_vars['price'];
?>
            <div class="goods_info_price_s">
                <div class="goods_info_price_type"><?php echo $_smarty_tpl->tpl_vars['price']->key;?>
</div>
                <ul class="goods_info_price_ul">
                <?php
$_from = $_smarty_tpl->tpl_vars['price']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['prices'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['prices']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['prices']->value) {
$_smarty_tpl->tpl_vars['prices']->_loop = true;
$foreach_prices_Sav = $_smarty_tpl->tpl_vars['prices'];
?>
                    <li class ='goods_info_price_li goods_info_price_li_n' title="<?php echo $_smarty_tpl->tpl_vars['prices']->value['gp_name'];?>
" key="<?php echo $_smarty_tpl->tpl_vars['prices']->value['gp_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prices']->value['gp_name'];?>
</li>
                <?php
$_smarty_tpl->tpl_vars['prices'] = $foreach_prices_Sav;
}
?>
                </ul>
            </div>
            <?php
$_smarty_tpl->tpl_vars['price'] = $foreach_price_Sav;
}
?>
        </div>

        <div class="goods_info_sum">
            <input type="number" name="goods_sum" class="goods_info_sum_v" min="0" value="1" /><span>剩余数量 :</span><span class="goods_info_sum_sum"></span>
        </div>
        <div class = 'goods_info_util'>
           <div class="goods_info_buy">立即购买</div>
            <div class="goods_info_cart">加入购物车</div>
            <div class="goods_info_collect"> 收藏商品</div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="wrap">
    <div class="goods_content">
        <ul class="goods_content_nav">
            <li class="goods_content_description_nav li_select" for="goods_content_description"><a>详细介绍</a></li>
            <li class="goods_content_attr_nav" for="goods_content_attr"><a>规格参数</a></li>
            <li class="goods_content_comment_nav" for="goods_content_comment"><a>用户评论</a></li>
        </ul>
        <ul class="goods_content_val">
            <li class="goods_content_description"><?php echo $_smarty_tpl->tpl_vars['g']->value['g_text'];?>
</li>
            <li class="goods_content_attr">
                <?php
$_from = $_smarty_tpl->tpl_vars['g']->value['GAttr'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['attr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['attr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['attr']->key => $_smarty_tpl->tpl_vars['attr']->value) {
$_smarty_tpl->tpl_vars['attr']->_loop = true;
$foreach_attr_Sav = $_smarty_tpl->tpl_vars['attr'];
?>
                <div class="goods_content_attr_s">
                    <div class="goods_content_attr_type"><?php echo $_smarty_tpl->tpl_vars['attr']->key;?>
</div>
                    <?php
$_from = $_smarty_tpl->tpl_vars['attr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['attr_s'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['attr_s']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['attr_s']->value) {
$_smarty_tpl->tpl_vars['attr_s']->_loop = true;
$foreach_attr_s_Sav = $_smarty_tpl->tpl_vars['attr_s'];
?>
                    <div class="goods_content_attr_map">
                        <div class="goods_content_attr_name"><?php echo $_smarty_tpl->tpl_vars['attr_s']->value['gta_name'];?>
</div>
                        <div class="goods_content_attr_value"><?php echo $_smarty_tpl->tpl_vars['attr_s']->value['ga_value'];?>
</div>
                    </div>
                    <?php
$_smarty_tpl->tpl_vars['attr_s'] = $foreach_attr_s_Sav;
}
?>
                </div>
                <?php
$_smarty_tpl->tpl_vars['attr'] = $foreach_attr_Sav;
}
?>
            </li>
            <li class="goods_content_comment"><div></div></li>
        </ul>
    </div>
    <div class="goods_rigth">

    </div>
    <div class="clear"></div>
</div>

<?php echo '<script'; ?>
>
    window.h_main.push(function(){
        $('.goods_content_nav > li').click(function(){//详细导航
            if(!$(this).hasClass('li_select')){
                $(this).addClass('li_select').siblings().removeClass('li_select');
                $('.goods_content_val li.'+$(this).attr('for')).show().siblings().hide();
            }
        });

        $('.goods_info_price_li').each(function(){//价格名称大小
            if(this.offsetWidth < this.scrollWidth){
                $(this).css('width',this.scrollWidth);
            }
        });
        var ul_temp = 0;
        $('.goods_info_price_ul').each(function(){ //设定价格分类编号
            $(this).attr('type',++ul_temp);
        });

        var price_list = JSON.parse("<?php echo strtr($_smarty_tpl->tpl_vars['gpi_s']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
");
        var price_min = 1000000000;
        var price_max = 0;
        var price_arr = {};
        for(var pl in price_list){//找出最大最小价格
            var gpi_price = parseFloat(price_list[pl]['gpi_price']);
            if(gpi_price > price_max)price_max = gpi_price;
            if(gpi_price < price_min)price_min = gpi_price;
        }
        $('.goods_price_value_v').html(price_min+' - '+price_max);
        //商品价格选择
        var isSelect= function(){
            var list ={};//匹配数量
            for(var pl in price_list){
                list[price_list[pl]['gpi_id']] = 0;
                for(var pa in price_arr){//循环当前选定价格元素
                    for (var pll in price_list[pl]['list']){//判断是否在
                        if(price_arr[pa] ==  price_list[pl]['list'][pll]){
                            list[price_list[pl]['gpi_id']]++;
                            break;
                        }
                    }
                }
            }
            if(price_list[0]['list'].length === $('.goods_info_price_li_c').length){
                console.log(price_arr);
                var gpi_sum = 0;
                var gpi_id = '';
                for(var liss in list){
                    if (list[liss] >gpi_sum){
                        gpi_sum = list[liss];
                        gpi_id = liss;
                    }
                }
                $(".goods_roll_img_s_n[name='"+gpi_id+"']").trigger('click');
                for(var pai in price_list){
                    if(price_list[pai]['gpi_id'] == gpi_id){
                        $('.goods_price_value_v').html(price_list[pai]['gpi_price']);
                        $('.goods_info_sum_sum').html(price_list[pai]['gpi_sum']);
                        if(price_list[pai]['gpi_sum'] < $('.goods_info_sum_v').val()){
                            $('.goods_info_sum_v').val(price_list[pai]['gpi_sum']);
                        }
                        $('.goods_info_sum_v').attr('max',price_list[pai]['gpi_sum']);

                        break;
                    }
                }

            }else{
                $('.goods_price_value_v').html(price_min+' - '+price_max);
                $('.goods_info_sum_sum').html("");
            }
        };
        $('.goods_info_price_li').click(function(){
            if($(this).hasClass('goods_info_price_li_c')){
                price_arr[$(this).parents('ul').attr('type')] = null;
                $(this).removeClass('goods_info_price_li_c').addClass('goods_info_price_li_n');
            }else{
                price_arr[$(this).parents('ul').attr('type')] = $(this).attr('key');
                $(this).addClass('goods_info_price_li_c').removeClass('goods_info_price_li_n').siblings().removeClass('goods_info_price_li_c').addClass('goods_info_price_li_n');
            }
            isSelect();
        });

        //图片选商品
        $('.goods_roll_img_s').click(function(){
            if($(this).hasClass('goods_roll_img_s_c')){
                $(this).removeClass('goods_roll_img_s_c').addClass('goods_roll_img_s_n');
                $(this).parents('ul').removeAttr('img_s');
            }else{
                $(this).parents('ul').attr('img_s',"");
                $(this).addClass('goods_roll_img_s_c').removeClass('goods_roll_img_s_n').siblings().removeClass('goods_roll_img_s_c').addClass('goods_roll_img_s_n');
                $('.goods_show_img >img').attr('imgUrl',$(this).children('img').attr('imgUrl')).attr('src',h_util.imgLink($(this).children('img').attr('imgUrl'),'centre'));
                for(var pai in price_list){
                    console.log(price_list[pai]);
                    if(price_list[pai]['gpi_id'] == $(this).attr('name')){
                        $('.goods_price_value_v').html(price_list[pai]['gpi_price']);
                        for(var plpl in price_list[pai]['list']){
                            $('.goods_info_price_li_n[key="'+price_list[pai]['list'][plpl]+'"]').trigger('click');
                        }
                        break;
                    }
                }

            }
        });
        //小图浏览
        $('.goods_roll_img_s').mouseenter(function(){
            if(typeof ($(this).parents('ul').attr('img_s')) ==='undefined'){
                $('.goods_show_img >img').attr('imgUrl',$(this).children('img').attr('imgUrl')).attr('src',h_util.imgLink($(this).children('img').attr('imgUrl'),'centre'));
            }
        });

        var sum = $('.goods_roll_img >ul >li').length;
        $('.goods_roll_img >ul').css('width',sum*74);

        $('.goods_roll_left').click(function(){
            var u = $(this).siblings('ul');
            if(parseInt(u.css('left')) > -300){
                u.animate({'left':0},200);
                $(this).hide();
            }else{
                u.animate({'left':parseInt(u.css('left'))+300},200);
            }
        });

        $('.goods_roll_right').click(function(){
            var u = $(this).siblings('ul');
            if(-u.width() - parseInt(u.css('left')) > -700){
                u.animate({'left':-u.width()+400},200);
                $(this).hide();
            }else{
                u.animate({'left':parseInt(u.css('left'))-300},200);
            }
        });

        //是否显示左右滑块
        $('.goods_roll_img').mousemove(function(){
            var u = $(this).children('ul');
           // console.log(parseInt($(this).children('ul').css('left')));
            if(parseInt(u.css('left')) < -1){
                $('.goods_roll_left').show();
            }
            if(parseInt(u.css('left')) > (-u.width()+400)){
                $('.goods_roll_right').show();
            }

        }).mouseleave(function(){
            $('.goods_roll_left').hide();
            $('.goods_roll_right').hide();
        });

//        初始化图片
        $('.goods_show_img >img').attr('src',h_util.imgLink($('.goods_show_img >img').attr('imgUrl'),'centre'));
        $('.goods_roll_img_s >img').each(function(){
            $(this).attr('src',h_util.imgLink($(this).attr('imgUrl'),'min'));
        });
        //预览大图
        $('.goods_show_img').mouseenter(function(){
            $(this).children('.goods_view_img').show();
            $(this).children('.goods_max_img').css('background-image',"url('"+h_util.imgLink($(this).children('img').attr('imgUrl'),'max')+"')").show();
        }).mouseleave(function(){
            $(this).children('.goods_view_img').hide();
            $(this).children('.goods_max_img').hide();
        }).mousemove( function(e){
            var x =e.pageX-$(this).offset().left;
            var y=e.pageY-$(this).offset().top;
            var view = $(this).children('.goods_view_img');

            var vx = view.width()/2;
            var vy = view.height()/2;
            if(parseInt(x) <= vx){
                x =0
            }else if(parseInt(x) >= $(this).width()-vx){
                x= $(this).width()-vx*2;
            }else{
                x = x-vx;
            }
            if(parseInt(y) <= vy){
                y = 0;
            }else if(parseInt(y) >= $(this).height()-vy){
                y = $(this).height()-vy*2;
            }else{
                y = y-vy;
            }
            view.css('top',y).css('left',x);
            $(this).children('.goods_max_img').css('background-position',-x*2+'px '+ -y*2+'px');
        });
    });
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ('bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>