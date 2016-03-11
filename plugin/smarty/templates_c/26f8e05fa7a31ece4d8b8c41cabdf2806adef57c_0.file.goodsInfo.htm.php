<?php /* Smarty version 3.1.27, created on 2016-03-09 21:09:17
         compiled from "E:\xampp\mall258\admin\htmPc\goodsInfo.htm" */ ?>
<?php
/*%%SmartyHeaderCode:2949256e0207d493b77_94760312%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26f8e05fa7a31ece4d8b8c41cabdf2806adef57c' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\goodsInfo.htm',
      1 => 1457460592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2949256e0207d493b77_94760312',
  'variables' => 
  array (
    'page' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e0207d4ff2f0_82342346',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e0207d4ff2f0_82342346')) {
function content_56e0207d4ff2f0_82342346 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2949256e0207d493b77_94760312';
?>
<style type="text/css">
    #goodsList li.list_row > span:first-child ,#goodsList li.list_row_head > span:first-child {
        width: 100px;
    }

    #goodsList li.list_row  > span:nth-child(2) ,#goodsList li.list_row_head  > span:nth-child(2){
        width: 200px;
    }
    #goodsList li.list_row  > span:nth-child(3) ,#goodsList li.list_row_head  > span:nth-child(3){
        width: 150px;
    }
    #goodsList li.list_row  > span:nth-child(4) ,#goodsList li.list_row_head  > span:nth-child(4){
        width: 100px;
    }
    }
    #goodsList li.list_row  > span:nth-child(5) ,#goodsList li.list_row_head  > span:nth-child(5){
        width: 200px;
    }

    #goodsList{
        margin-top: 10px;
        float: left;
    }

    #goodsAddShow{
        width: 200px;
        float: left;
        margin: 10px 20px;
    }

</style>
<?php if ($_smarty_tpl->tpl_vars['page']->value['count'] >= 1 || $_smarty_tpl->tpl_vars['page']->value['search'] != '') {?>
<div id='goodsList' class='win'>
    <h1 class="list_head">商品类型列表</h1>
    <ul>
        <li class='list_row_head'>
            <span>商品编号</span>
            <span>商品名</span>
            <span>所属类型</span>
            <span>状态</span>
            <span>添加时间</span>
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
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['g_number'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['g_number'];?>
</span>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['g_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['g_name'];?>
</span>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['gt_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['gt_name'];?>
</span>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['g_status'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['g_status'];?>
</span>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['g_reg'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['g_reg'];?>
</span>
            <span class="delete" value="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['g_id'];?>
">×</span>
        </li>
        <?php endfor; endif; ?>
        <?php echo $_smarty_tpl->getSubTemplate ('pageSearch.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </ul>
</div>
<?php }?>
<div class="add_show_button button">增加商品</div>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function () {
        PageSearch('./inc/goodsInfo.php');
        CRUD.add('./inc/goodsAdd.php',500);
        CRUD.update('./inc/goodsUpdate.php',500);
        CRUD.delete('./server/goodsDeleteSer.php','./inc/goodsInfo.php','确定要删除吗?','删除之之后很严重哦');
    });
<?php echo '</script'; ?>
><?php }
}
?>