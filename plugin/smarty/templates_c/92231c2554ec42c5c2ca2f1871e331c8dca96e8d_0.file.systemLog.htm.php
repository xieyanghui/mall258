<?php /* Smarty version 3.1.27, created on 2016-03-09 21:09:11
         compiled from "E:\xampp\mall258\admin\htmPc\systemLog.htm" */ ?>
<?php
/*%%SmartyHeaderCode:109456e02077ea1e77_16131493%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92231c2554ec42c5c2ca2f1871e331c8dca96e8d' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\systemLog.htm',
      1 => 1457460592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109456e02077ea1e77_16131493',
  'variables' => 
  array (
    'page' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e020781677f1_91535217',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e020781677f1_91535217')) {
function content_56e020781677f1_91535217 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '109456e02077ea1e77_16131493';
?>
<style type="text/css">
    #adminList li.list_row > span:first-child ,#adminList li.list_row_head > span:first-child {
        width: 120px;
    }

    #adminList li.list_row  > span:nth-child(2) ,#adminList li.list_row_head  > span:nth-child(2){
        width: 100px;
    }

    #adminList li.list_row >span:nth-child(3) , #adminList li.list_row_head >span:nth-child(3){
        width: 200px;
    }

    #adminList li.list_row >span:nth-child(4) , #adminList li.list_row_head >span:nth-child(4){
        width: 400px;
    }

    #adminList{
        margin-top: 10px;
        float: left;
    }
</style>
<?php if ($_smarty_tpl->tpl_vars['page']->value['count'] >= 1 || $_smarty_tpl->tpl_vars['page']->value['search'] != '') {?>
<div id='adminList' class='win'>
    <h1 class="list_head">管理员列表</h1>
    <ul>
        <li class='list_row_head'>
            <span>事件</span>
            <span>管理员</span>
            <span>时间</span>
            <span>详细内容</span>
        </li>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['index'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['row']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
        <li class='list_row'>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['sl_key'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['sl_key'];?>
</span>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['a_nick'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['a_nick'];?>
</span>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['sl_date'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['sl_date'];?>
</span>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['sl_content'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['sl_content'];?>
</span>
        </li>
        <?php endfor; endif; ?>
        <?php echo $_smarty_tpl->getSubTemplate ('pageSearch.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </ul>
</div>
<?php }?>
<?php echo '<script'; ?>
 type="text/javascript">
    PageSearch('./inc/systemLog.php');
<?php echo '</script'; ?>
>
<?php }
}
?>