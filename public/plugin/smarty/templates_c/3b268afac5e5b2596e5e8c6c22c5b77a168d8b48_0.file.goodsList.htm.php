<?php /* Smarty version 3.1.27, created on 2016-05-23 03:49:26
         compiled from "/home/xiehui/work/mall258/tplPc/goodsList.htm" */ ?>
<?php
/*%%SmartyHeaderCode:85842557057420d46721072_41668613%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b268afac5e5b2596e5e8c6c22c5b77a168d8b48' => 
    array (
      0 => '/home/xiehui/work/mall258/tplPc/goodsList.htm',
      1 => 1463946562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85842557057420d46721072_41668613',
  'variables' => 
  array (
    'top' => 0,
    'g' => 0,
    'HTTP_HOST' => 0,
    'gs' => 0,
    'startPage' => 0,
    'page' => 0,
    'showLimit' => 0,
    'startLimit' => 0,
    'countPages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57420d467494f4_04219022',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57420d467494f4_04219022')) {
function content_57420d467494f4_04219022 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '85842557057420d46721072_41668613';
echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<div id ='top_div'>
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['top']->value)===null||$tmp==='' ? '' : $tmp);?>

</div>
<div class="wrap">
    <div class="clear"></div>
    <div class="goods_model">
        <?php
$_from = $_smarty_tpl->tpl_vars['g']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['gs'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['gs']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['gs']->value) {
$_smarty_tpl->tpl_vars['gs']->_loop = true;
$foreach_gs_Sav = $_smarty_tpl->tpl_vars['gs'];
?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goods.php?id=<?php echo $_smarty_tpl->tpl_vars['gs']->value['g_number'];?>
">
            <div class = 'goods_model_list'>
                <div class = 'goods_model_list_img'><img src ="<?php echo $_smarty_tpl->tpl_vars['gs']->value['g_img'];?>
"/></div>
                <div class="goods_model_list_name"><?php echo $_smarty_tpl->tpl_vars['gs']->value['g_name'];?>
</div>
                <div class = 'goods_model_list_price'><?php echo $_smarty_tpl->tpl_vars['gs']->value['g_price'];?>
</div>
            </div>
        </a>
        <?php
$_smarty_tpl->tpl_vars['gs'] = $foreach_gs_Sav;
}
?>
        <!--分页-->
        <ul class="goods_limit_ul clear">
            <li class="goods_limit_li">
                <a href="<?php if ($_smarty_tpl->tpl_vars['startPage']->value >= 1) {
echo $_smarty_tpl->tpl_vars['page']->value;?>
startPage=<?php echo $_smarty_tpl->tpl_vars['startPage']->value-1;
}?>" class="  page_move <?php if ($_smarty_tpl->tpl_vars['startPage']->value >= 1) {
} else { ?> page_off <?php }?>">上一页</a>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['showLimit']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
startPage=<?php echo $_smarty_tpl->tpl_vars['startLimit']->value+$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['startLimit']->value+$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'] == $_smarty_tpl->tpl_vars['startPage']->value) {?>
                    page_number_on<?php }?>  page_number"><?php echo $_smarty_tpl->tpl_vars['startLimit']->value+$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'];?>

                </a>
                <?php endfor; endif; ?>
                <a href="<?php if ($_smarty_tpl->tpl_vars['startPage']->value+1 < $_smarty_tpl->tpl_vars['countPages']->value) {
echo $_smarty_tpl->tpl_vars['page']->value;?>
startPage=<?php echo $_smarty_tpl->tpl_vars['startPage']->value+1;
}?>" class=" page_move <?php if ($_smarty_tpl->tpl_vars['startPage']->value+1 < $_smarty_tpl->tpl_vars['countPages']->value) {?>  page_on <?php } else { ?> page_off <?php }?>">下一页</a>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class = 'nva'>

    </div>
</div>
<?php echo '<script'; ?>
>
    h_main.push(function(){
    });
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ('bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>