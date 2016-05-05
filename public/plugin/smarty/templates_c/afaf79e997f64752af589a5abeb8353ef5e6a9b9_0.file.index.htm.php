<?php /* Smarty version 3.1.27, created on 2016-05-02 00:11:47
         compiled from "/home/xiehui/work/phpstorm/mall258/tplPc/index.htm" */ ?>
<?php
/*%%SmartyHeaderCode:141578905557262ac3eaed00_58475316%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afaf79e997f64752af589a5abeb8353ef5e6a9b9' => 
    array (
      0 => '/home/xiehui/work/phpstorm/mall258/tplPc/index.htm',
      1 => 1462119106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141578905557262ac3eaed00_58475316',
  'variables' => 
  array (
    'top' => 0,
    'ro' => 0,
    'HTTP_HOST' => 0,
    'o' => 0,
    'im' => 0,
    'm' => 0,
    'ms' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57262ac3ed0358_01826481',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57262ac3ed0358_01826481')) {
function content_57262ac3ed0358_01826481 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '141578905557262ac3eaed00_58475316';
echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div id ='top_div'>
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['top']->value)===null||$tmp==='' ? '' : $tmp);?>

</div>


<div class="wrap">
    <div class ='index_roll'>
        <ul class ='roll_ul'>
            <?php
$_from = $_smarty_tpl->tpl_vars['ro']->value['IndexGoods'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['o']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
$foreach_o_Sav = $_smarty_tpl->tpl_vars['o'];
?>
            <li class = 'roll_li'><a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goods.php?id=<?php echo $_smarty_tpl->tpl_vars['o']->value['g_number'];?>
"><img class="roll_li_img" src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['o']->value['ig_img'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['o']->value['g_img'] : $tmp);?>
" /></a></li>
            <?php
$_smarty_tpl->tpl_vars['o'] = $foreach_o_Sav;
}
?>
        </ul>
        <ul class="roll_key"></ul>
    </div>
</div>

<div class="wrap">
    <div class="content">
        <?php
$_from = $_smarty_tpl->tpl_vars['im']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['m']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
$foreach_m_Sav = $_smarty_tpl->tpl_vars['m'];
?>
        <div class="goods_model">
            <div class = 'goods_model_head'><?php echo $_smarty_tpl->tpl_vars['m']->value['im_name'];?>
</div>
            <?php
$_from = $_smarty_tpl->tpl_vars['m']->value['IndexGoods'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ms'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ms']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ms']->value) {
$_smarty_tpl->tpl_vars['ms']->_loop = true;
$foreach_ms_Sav = $_smarty_tpl->tpl_vars['ms'];
?>
            <div class ='goods_model_body'>
                <a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goods.php?id=<?php echo $_smarty_tpl->tpl_vars['ms']->value['g_number'];?>
">
                    <div class = 'goods_model_list'>
                        <div class = 'goods_model_list_img'><img src ="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['ms']->value['ig_img'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['ms']->value['g_img'] : $tmp);?>
"/></div>
                        <div class="goods_model_list_name"><?php echo $_smarty_tpl->tpl_vars['ms']->value['g_name'];?>
</div>
                        <div class = 'goods_model_list_price'><?php echo $_smarty_tpl->tpl_vars['ms']->value['g_price'];?>
</div>
                    </div>
                </a>
            </div>
            <?php
$_smarty_tpl->tpl_vars['ms'] = $foreach_ms_Sav;
}
?>
        </div>
        <?php
$_smarty_tpl->tpl_vars['m'] = $foreach_m_Sav;
}
?>
    </div>
    <div class = 'nva'>

    </div>
</div>

<?php echo '<script'; ?>
>
    window.h_main.push(function(){
        var roll =function (sum){
            var left = parseInt($('.roll_ul').css('left'));
            var h_sum= Math.floor(Math.abs(left)/li_width)+1;
            if(h_sum >= li_sum){ h_sum = 0; }
            if(typeof sum !=='undefined'){
                clearInterval(sl);
                sl = setInterval(arguments.callee,8000);
                h_sum = sum;
            }
            $('.roll_key_li').removeClass('roll_key_li_sel');
            $('.roll_key_li[key="'+h_sum+'"]').addClass('roll_key_li_sel');
            $('.roll_ul').animate({'left':-h_sum*li_width},500);
        };
        var li_sum =  $('.roll_li').length;
        var li_width = $('.roll_li').first().width();
        $('.roll_ul').css('width', li_width* li_sum);
        var i = 0;
        while (i < li_sum){$('.roll_key').append('<li class="roll_key_li" key="'+i+'"></li>');i++;}
        $('.roll_key_li').first().addClass('roll_key_li_sel');
        $('.roll_key_li').click(function(){
            roll($(this).attr('key'));
        });
        var sl = setInterval(roll,8000);

    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ('bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>