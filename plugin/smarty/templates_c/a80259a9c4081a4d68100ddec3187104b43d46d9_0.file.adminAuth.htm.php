<?php /* Smarty version 3.1.27, created on 2016-02-28 02:56:45
         compiled from "E:\xampp\mall258\admin\htmPc\adminAuth.htm" */ ?>
<?php
/*%%SmartyHeaderCode:715356d1f16d076e67_79623320%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a80259a9c4081a4d68100ddec3187104b43d46d9' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\adminAuth.htm',
      1 => 1456599018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '715356d1f16d076e67_79623320',
  'variables' => 
  array (
    'page' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d1f16d0cba96_85976716',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d1f16d0cba96_85976716')) {
function content_56d1f16d0cba96_85976716 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '715356d1f16d076e67_79623320';
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

    #adminAuthAddShow{
        width: 200px;
        float: left;
        margin: 10px 20px;
    }

</style>
<?php if ($_smarty_tpl->tpl_vars['page']->value['count'] >= 1 || $_smarty_tpl->tpl_vars['page']->value['search'] != '') {?>
<div id='adminAuthList' class='win'>
    <h1 class="list_head">权限组列表</h1>
    <form id = 'list_form'>
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

        <!--分页-->
        <?php if ($_smarty_tpl->tpl_vars['page']->value['count'] >= $_smarty_tpl->tpl_vars['page']->value['pageRow']+1) {?>
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

        <!--搜索-->
        <li class="list_row_search">
            <input type="text" id="search_value" class="form_div" placeholder="搜索关键字" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['search']['key'];?>
">
            <div id = "list_search" class="button">搜索</div>
            <div id = "search_delete" class="delete">×</div>
            <span class="list_row_sum" title="每页显示3行">3</span>
            <span class="list_row_sum" title="每页显示10行">10</span>
            <span class="list_row_sum" title="每页显示15行">15</span>
            <span class="list_row_sum" title="每页显示20行">20</span>
        </li>

    </ul>
</div>
<?php }?>
<div id="adminAuthAddShow" class="button">增加权限组</div>

<?php echo '<script'; ?>
 type="text/javascript">


    $(function () {
        var load =function(){
            $('#contents').load('./inc/adminAuth.php',$('#list_form').serialize());
        }
        $('li.list_row:even ').addClass('list_row_even');
        $('li.list_row:odd').addClass('list_row_odd');
        $('li.list_row').mouseover(function(){
            $(this).children().addClass('list_row_hover');
        });
        $('li.list_row').mouseout(function(){
            $(this).children().removeClass('list_row_hover');
        });

        //设置每页显示默认值
        $("span.list_row_sum").map(function(){
            if($(this).html() ==$('#list_form').children("input[name='pageRow']").val()){
                $(this).addClass("list_row_sumOn");
            }
        });
        //设置搜索列默认值
        $('#search_select >option').map(function(){
            if($(this).html() ==$('#list_form').children("input[name='searchLine']").val()){
                $(this).parent().val($(this).html());
            }
        });
        //排序
        $("li.list_row_head > span").click(function () {
            var sortLine = $('#list_form').children("input[name='sortLine']");
            var sort = $('#list_form').children("input[name='sort']");
            if(sortLine.val() == $(this).html()){
                if(sort.val() == "DESC"){
                    sort.val("ASC");
                }else{
                    sort.val("DESC");
                }
            }else{
                sortLine.val($(this).html());
                sort.val("DESC");
            }
            load();
        });

        //列表搜索
        $("#list_search").click(function () {
            if($('#search_value').val() !=""){
                $('#list_form').children("input[name='page']").val('0');
                $('#list_form').children("input[name='searchLine']").val($("#search_select").val());
                $('#list_form').children("input[name='search']").val($('#search_value').val());
                load();
            }
        });

        //列表取消搜索
        $("div#search_delete").click(function () {
            $('#list_form').children("input[name='search']").val("");
            load();
        });
        //列表每页多少汗设置
        $("span.list_row_sum").click(function () {
            $('#list_form').children("input[name='page']").val("0");
            $('#list_form').children("input[name='pageRow']").val($(this).html());
            load();
        });
        //列表选页
        $("div.pageNumber").click(function () {
            $('#list_form').children("input[name='page']").val(parseInt($(this).html()) - 1);
            load();
        });
        //列表翻页
        $("div.pageButton").click(function () {
            if($(this).hasClass('pageOff')){
                return;
            }
            if ($(this).html() == "下一页") {
                $('#list_form').children("input[name='page']").val($("div.pageOn").html());
            } else {
                $('#list_form').children("input[name='page']").val(parseInt($("div.pageOn").html()) - 2);
            }
            load();
        });


    });
    $(function(){
        //增加
        $('#adminAuthAddShow').click(function(){
            $('#CRUD').load('./inc/adminAuthAdd.php',function(){
                Resize.resizeAdd(500);
            });
        });

        //删除
        $('.list_row > span.delete').click(function(e){
            var self = $(this);
            showdielogue('确定要删除吗?','删除之之后很严重哦',function(){
                $.getJSON("./server/adminAuthDeleteSer.php?name="+self.attr('value'),function(data){
                    toast(data.status,data.megs);
                    $('#contents').load('./inc/adminAuth.php',$('#list_form').serialize());
                });
            });
            e.stopPropagation();
        });

        //修改
        $('.list_row').click(function(){
            $('#CRUD').load('./inc/adminAuthUpdate.php?name='+$(this).children('span.delete').attr('value'),function(){
                Resize.resizeAdd(500);
            });
        });
    });
<?php echo '</script'; ?>
>
<?php }
}
?>