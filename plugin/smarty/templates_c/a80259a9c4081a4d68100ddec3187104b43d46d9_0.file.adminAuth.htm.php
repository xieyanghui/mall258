<?php /* Smarty version 3.1.27, created on 2016-03-08 02:20:14
         compiled from "E:\xampp\mall258\admin\htmPc\adminAuth.htm" */ ?>
<?php
/*%%SmartyHeaderCode:3119756ddc65ed1b008_60856023%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a80259a9c4081a4d68100ddec3187104b43d46d9' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\adminAuth.htm',
      1 => 1457374487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3119756ddc65ed1b008_60856023',
  'variables' => 
  array (
    'page' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56ddc65ed5ba99_20556919',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56ddc65ed5ba99_20556919')) {
function content_56ddc65ed5ba99_20556919 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3119756ddc65ed1b008_60856023';
?>
<style type="text/css">
    #adminAuthList li.list_row > span:first-child ,#adminAuthList li.list_row_head > span:first-child {
        width: 150px;
    }

    #adminAuthList li.list_row  > span:nth-child(2) ,#adminAuthList li.list_row_head  > span:nth-child(2){
        width: 150px;
    }
    #adminAuthList{
        margin-top: 10px;
        float: left;
    }
</style>
<?php if ($_smarty_tpl->tpl_vars['page']->value['count'] >= 1 || $_smarty_tpl->tpl_vars['page']->value['search'] != '') {?>
<div id='adminAuthList' class='win'>
    <h1 class="list_head">权限组列表</h1>
    <ul>
        <li class='list_row_head'>
            <span>权限级别</span>
            <span>备注</span>
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
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_nick'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_nick'];?>
</span>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_remark'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_remark'];?>
</span>
            <span class="delete" value="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_id'];?>
">×</span>
        </li>
        <?php endfor; endif; ?>

        <?php echo $_smarty_tpl->getSubTemplate ('pageSearch.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </ul>
</div>
<?php }?>
<div  class="add_show_button button">增加权限组</div>

<?php echo '<script'; ?>
 type="text/javascript">
    $(function () {
        PageSearch('./inc/adminAuth.php');
        CRUD.add('./inc/adminAuthAdd.php',500);
        CRUD.update('./inc/adminAuthUpdate.php',500);
        CRUD.delete('./server/adminAuthDeleteSer.php','./inc/adminAuth.php','确定要删除吗?','删除之之后很严重哦');
    });
<?php echo '</script'; ?>
>
<?php }
}
?>