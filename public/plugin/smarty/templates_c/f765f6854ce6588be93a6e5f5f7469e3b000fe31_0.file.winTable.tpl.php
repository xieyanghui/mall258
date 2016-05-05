<?php /* Smarty version 3.1.27, created on 2016-05-02 15:35:50
         compiled from "/home/xiehui/work/mall258/admin/tplPc/winTable.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17590529695727035648f818_08026641%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f765f6854ce6588be93a6e5f5f7469e3b000fe31' => 
    array (
      0 => '/home/xiehui/work/mall258/admin/tplPc/winTable.tpl',
      1 => 1462174534,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17590529695727035648f818_08026641',
  'variables' => 
  array (
    'page' => 0,
    'view' => 0,
    'column' => 0,
    'data' => 0,
    'row' => 0,
    'c1' => 0,
    'c2' => 0,
    'HTTP_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_572703564b7346_25012267',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_572703564b7346_25012267')) {
function content_572703564b7346_25012267 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17590529695727035648f818_08026641';
if ($_smarty_tpl->tpl_vars['page']->value['count'] >= 1 || $_smarty_tpl->tpl_vars['page']->value['search'] != '') {?>
<div class=" <?php if (!empty($_smarty_tpl->tpl_vars['page']->value['float'])) {?>float_win<?php }?> win">
    <h1 class="win_head"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['view']->value['table']['title'])===null||$tmp==='' ? '列表' : $tmp);
if (!empty($_smarty_tpl->tpl_vars['page']->value['float'])) {?><div class="show_win_close">×</div><?php }?></h1>
    <ul>
        <li class='list_row_head'>
            <?php
$_from = $_smarty_tpl->tpl_vars['view']->value['table']['column'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['column'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['column']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
$foreach_column_Sav = $_smarty_tpl->tpl_vars['column'];
?>
            <span name="<?php echo $_smarty_tpl->tpl_vars['column']->value['key'];?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['column']->value['value'])===null||$tmp==='' ? '' : $tmp);?>
"  style="width:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['column']->value['width'])===null||$tmp==='' ? '100' : $tmp);?>
px"><?php echo $_smarty_tpl->tpl_vars['column']->value['name'];?>
</span>
            <?php
$_smarty_tpl->tpl_vars['column'] = $foreach_column_Sav;
}
?>
        </li>
        <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$foreach_row_Sav = $_smarty_tpl->tpl_vars['row'];
?>
        <li class='list_row' name="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['view']->value['table']['id']];?>
">
            <?php
$_from = $_smarty_tpl->tpl_vars['view']->value['table']['column'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['c1'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['c1']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['c1']->value) {
$_smarty_tpl->tpl_vars['c1']->_loop = true;
$foreach_c1_Sav = $_smarty_tpl->tpl_vars['c1'];
?>
                <span name="<?php echo $_smarty_tpl->tpl_vars['c1']->value['key'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['c1']->value['key']];?>
"  style="width:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['c1']->value['width'])===null||$tmp==='' ? '100' : $tmp);?>
px"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->tpl_vars['c1']->value['key']];?>
</span>
            <?php
$_smarty_tpl->tpl_vars['c1'] = $foreach_c1_Sav;
}
?>
            <?php if (empty($_smarty_tpl->tpl_vars['page']->value['float'])) {?>
            <?php if (!empty($_smarty_tpl->tpl_vars['view']->value['delete'])) {?>
            <span class="list_delete" >×</span>
            <?php }?>
            <?php }?>

        </li>
        <?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
?>

        <!--分页搜索-->
        <form class = 'list_form'>
            <input type="hidden" name="float" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['float'];?>
" />
            <input type="hidden" name="sort" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['sort']['key'];?>
" />
            <input type="hidden" name="sortLine" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['sort']['sortLine'];?>
" />
            <input type="hidden" name="search" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['search']['key'];?>
" />
            <input type="hidden" name="searchLine" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['search']['searchLine'];?>
" />
            <input type="hidden" name="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['page'];?>
" />
            <input type="hidden" name="pageRow" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['pageRow'];?>
" />
        </form>
        <?php if ($_smarty_tpl->tpl_vars['page']->value['count'] >= $_smarty_tpl->tpl_vars['page']->value['pageRow']+1) {?>
        <!--分页-->
        <li class="list_row_page">
            <div class="  pageButton  <?php if ($_smarty_tpl->tpl_vars['page']->value['page'] >= 1) {?>button<?php } else { ?> pageOff <?php }?>">上一页</div>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page']->value['pages']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
            <div class="<?php if ($_smarty_tpl->tpl_vars['page']->value['start']+$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'] == $_smarty_tpl->tpl_vars['page']->value['page']) {?>
                pageOn<?php }?>  pageNumber"><?php echo $_smarty_tpl->tpl_vars['page']->value['start']+$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']+1;?>

            </div>
            <?php endfor; endif; ?>
            <div class=" pageButton <?php if ($_smarty_tpl->tpl_vars['page']->value['page']+1 < $_smarty_tpl->tpl_vars['page']->value['countPages']) {?>  button<?php } else { ?> pageOff <?php }?>">下一页</div>
        </li>
        <?php }?>

        <?php if (empty($_smarty_tpl->tpl_vars['view']->value['table']['noSearch'])) {?>
        <!--搜索-->
        <li class="list_row_search">
            <input type="text"  class="form_div search_value" placeholder="搜索关键字" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['search']['key'];?>
">
            <?php if (!empty($_smarty_tpl->tpl_vars['view']->value['table']['search'])) {?>
            <select  class="search_select form_div">
                <?php
$_from = $_smarty_tpl->tpl_vars['view']->value['table']['column'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['c2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['c2']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['c2']->value) {
$_smarty_tpl->tpl_vars['c2']->_loop = true;
$foreach_c2_Sav = $_smarty_tpl->tpl_vars['c2'];
?>
                    <?php if (empty($_smarty_tpl->tpl_vars['c2']->value['noSearch']) || !$_smarty_tpl->tpl_vars['c2']->value['noSearch']) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['c2']->value['key'];?>
"><?php echo $_smarty_tpl->tpl_vars['c2']->value['name'];?>
</option>
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars['c2'] = $foreach_c2_Sav;
}
?>
            </select>
            <?php }?>
            <div class="list_search button">搜索</div>
            <div  class="search_delete delete">×</div>
            <span class="list_row_sum" title="每页显示3行">3</span>
            <span class="list_row_sum" title="每页显示10行">10</span>
            <span class="list_row_sum" title="每页显示15行">15</span>
            <span class="list_row_sum" title="每页显示20行">20</span>
        </li>
        <?php }?>
    </ul>


    <!--增加-->
    <?php if (empty($_smarty_tpl->tpl_vars['page']->value['float'])) {?>
    <?php if (!empty($_smarty_tpl->tpl_vars['view']->value['add'])) {?>
    <div class="add_button ajax_menu" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;
echo $_smarty_tpl->tpl_vars['view']->value['add'];?>
">+</div>
    <?php }?>
    <?php }?>
</div>
<?php }?>


<?php if (empty($_smarty_tpl->tpl_vars['page']->value['float'])) {?>
<!--删除-->
<?php if (!empty($_smarty_tpl->tpl_vars['view']->value['delete'])) {?>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $('.win').on('click','.list_row > span.list_delete',function(e){
            var self = $(this);
            dialogue(function(){
                $.getJSON("<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;
echo $_smarty_tpl->tpl_vars['view']->value['delete'];?>
?id="+self.parents('.list_row').attr('name'),function(data){
                    toast(data.status,data.megs);
                    $(this).parents('.win').parent().load("<?php echo $_smarty_tpl->tpl_vars['page']->value['url'];?>
",$('#list_form').serialize());
                });
            });
            e.stopPropagation();
        });
    });
<?php echo '</script'; ?>
>
<?php }?>
<!--更新-->
<?php if (!empty($_smarty_tpl->tpl_vars['view']->value['update'])) {?>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $('.list_row').each(function(){
            $(this).attr('href','<?php echo $_smarty_tpl->tpl_vars['HTTP_MODEL']->value;
echo $_smarty_tpl->tpl_vars['view']->value['update'];?>
?id='+$(this).attr('name'));
            $(this).addClass('ajax_menu');
        });
    });
<?php echo '</script'; ?>
>
<?php }?>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){
            PageSearch(document.URL);
        });
    <?php echo '</script'; ?>
>
<?php } else { ?>
<?php echo '<script'; ?>
>
    $(function(){
        var callback = $("#"+"<?php echo $_smarty_tpl->tpl_vars['page']->value['float'];?>
");
        var args = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['view']->value['table']['float_args'])===null||$tmp==='' ? '' : $tmp);?>
";
        $('.list_row').dblclick(function(){
            var x = new Object();
            x.id = $(this).attr('name');
            args = args.split(',');
            for(var a in args){
                x[args[a]] = $(this).find("[name='"+args[a]+"']").html();
            }
            callback.trigger('call',x);
            $(this).parents('.win').hide();
            loading.end();
        });

        $('.show_win_close').click(function(){
            $(this).parents('.win').hide();
            loading.end();
        });
    });
<?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(function(){
            PageSearch("<?php echo $_smarty_tpl->tpl_vars['page']->value['url'];?>
");
        });
    <?php echo '</script'; ?>
>
<?php }?>



<?php }
}
?>