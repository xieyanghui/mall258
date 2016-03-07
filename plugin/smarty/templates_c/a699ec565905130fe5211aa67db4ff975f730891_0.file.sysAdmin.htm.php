<?php /* Smarty version 3.1.27, created on 2016-02-18 13:48:43
         compiled from "E:\xampp\mall258\admin\htmPc\sysAdmin.htm" */ ?>
<?php
/*%%SmartyHeaderCode:2172556c55b3b8a9a67_73738992%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a699ec565905130fe5211aa67db4ff975f730891' => 
    array (
      0 => 'E:\\xampp\\mall258\\admin\\htmPc\\sysAdmin.htm',
      1 => 1455774519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2172556c55b3b8a9a67_73738992',
  'variables' => 
  array (
    'pages' => 0,
    'row' => 0,
    'defaultImg' => 0,
    'adminAuth' => 0,
    'HTTP_HOST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56c55b3b9065e7_84738080',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c55b3b9065e7_84738080')) {
function content_56c55b3b9065e7_84738080 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2172556c55b3b8a9a67_73738992';
?>
<style type="text/css">
    #adminList li.list_row > span:first-child ,#adminList li.list_row_head > span:first-child {
        width: 150px;
    }

    #adminList li.list_row  > span:nth-child(2) ,#adminList li.list_row_head  > span:nth-child(2){
        width: 150px;
    }
    #adminList li.list_row >span:nth-child(3) , #adminList li.list_row_head >span:nth-child(3){
        width: 140px;
    }
    li.list_row >span.delete {
        width: 28px;
        height: 28px;
        color : red;
        float: left;
        display: block;
        text-align: center;
        line-height: 28px;
        font-size: 25px;
        font-weight: bold;
    }
    .delete:hover{
        cursor: pointer;
        background-color: #a94442;
    }
    .list_row>span {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        display: block;
        float: left;
        height: 28px;
        border: 1px solid #80E5F0;
        line-height: 28px;
        font-size: 18px;
    }
    div#addAdmin > div {
        width: 400px;
    }
    .list_row{
        overflow: hidden;
    }
    .list_row_hover{
        background-color: #80E5F0;
    }
    #adminList{
        margin-top: 10px;
        float: left;
    }
    li.list_row_head {
        text-align: center;
        background-color: #80E5F0;
        overflow: hidden;
        height: 30px;
        line-height: 30px;
        font-weight: bold;
    }
    li.list_row_head >span{
        font-size: 20px;
        display: block;
        float: left;

    }
    h1.list_head{
        height: 40px;
        display: block;
        background-color: #50D1DE;
        text-align: center;
        line-height: 40px;
        font-size: 30px;
        font-weight: bold;
        overflow: hidden;
    }

    li.list_row_search{
        margin: 4px;
        overflow: hidden;
    }
    li.list_row_search >div{
        float: left;
    }
    .list_search{
        height: 30px;
        font-size: 18px;
        
    }
</style>
<?php if ($_smarty_tpl->tpl_vars['pages']->value['count'] >= 1) {?>
<div id='adminList' class='win'>
    <h1 class="list_head">管理员列表</h1>
    <ul>
        <li class='list_row_head'>
            <span>登录账号</span>
            <span>姓名</span>
            <span>权限级别</span>
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
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['a_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['a_name'];?>
</span>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['a_nick'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['a_nick'];?>
</span>
            <span title="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_nick'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_nick'];?>
</span>
            <span class="delete" value="<?php echo $_smarty_tpl->tpl_vars['row']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['a_id'];?>
">×</span>
        </li>
        <?php endfor; endif; ?>

        <?php if ($_smarty_tpl->tpl_vars['pages']->value['count'] >= $_smarty_tpl->tpl_vars['pages']->value['pageRow']+1) {?>
        <li class="list_row_page">
            <div class="<?php if ($_smarty_tpl->tpl_vars['pages']->value['page'] >= 1) {?> pages button <?php } else { ?> pagesoff <?php }?>">上一页</div>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pages']->value['pages']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
            <div class="<?php if ($_smarty_tpl->tpl_vars['pages']->value['start']+$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'] == $_smarty_tpl->tpl_vars['pages']->value['page']) {?>
                pageis<?php }?>  pageSum button "><?php echo $_smarty_tpl->tpl_vars['pages']->value['start']+$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']+1;?>

            </div>
            <?php endfor; endif; ?>
            <div class="<?php if ($_smarty_tpl->tpl_vars['pages']->value['page']+1 < $_smarty_tpl->tpl_vars['pages']->value['countRow']) {?> pages button <?php } else { ?> pagesoff <?php }?>">下一页</div>
        </li>
        <?php }?>
        <li class="list_row_search">
            <div>
                <input type="text" class="forms" value="<?php echo $_smarty_tpl->tpl_vars['pages']->value['search'];?>
">
                <select id="search_select">
                    <option >登录账号</option>
                    <option>姓名</option>
                    <option>权限级别</option>
                </select>
            </div>
            <div class="list_search button">搜索</div>
            <div class="search_delete delete">×</div>
            <div class="pageRow">
                <div>每页显示</div>
                <span>3</span>
                <span>10</span>
                <span>15</span>
                <span>20</span>
            </div>
        </li>
    </ul>
</div>

<?php }?>
<form action="./server/adminAdd.php" method="post" id="addAdminForm">
    <div id='addAdmin' class='wins showwin'>
        <span class="win_head">添加管理员</span>
        <div class="win_con">
            <label class ="win_con_head">登录名</label>
            <div class ="win_con_input"><input tabindex="1" type="text" name="aName" class="forms"/></div>
        </div>
        <div class="win_con">
            <label class ="win_con_head">姓名</label>
            <div class ="win_con_input"><input tabindex="2" type="text" name="aNick" class="forms"/></div>
        </div>
        <div class="win_con">
            <label class ="win_con_head">密码</label>
            <div class ="win_con_input"><input tabindex="3" type="password" name="pwd" class="forms"/></div>
        </div>
        <div class ="win_conAuto">
            <label class ="win_con_head" >头像</label>
            <div class ="win_con_con">
                <div id="adminHeadImg">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['defaultImg']->value;?>
?imageView2/5/w/75/h/75"/>
                    <input  type="hidden" name="img"/>
                </div>
                <div class="uploadImg">
                    <div id="imgUp" class="button">选择图片</div>
                    <div class="bars"><div id="bar"></div></div>
                </div>
            </div>
        </div>
        <div class ="win_conAuto">
            <label class ="win_con_head" >管理员级别</label>
            <div class ="win_con_con">
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['index'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['adminAuth']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                <label title="<?php echo $_smarty_tpl->tpl_vars['adminAuth']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_remark'];?>
">
                    <input name="asminAuth" tabindex="4" type="radio" value="<?php echo $_smarty_tpl->tpl_vars['adminAuth']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_id'];?>
"/>
                    <?php echo $_smarty_tpl->tpl_vars['adminAuth']->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['aa_nick'];?>

                </label>
                <?php endfor; endif; ?>
            </div>
        </div>

        <div>
            <div class="submit button">提交</div>
        </div>
    </div>
</form>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/js/upload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    function succ(data) {
        toast(data.status, data.megs);
        $('#contents').load('./inc/sysAdmin.php');
    }
    $(function () {
        //新增管理员提交
        $('.submit').click(function () {
            $(this).parents("form").submit();
        });
        $('li.list_row:even ').css('background-color','#fff');
        $('li.list_row:odd').css('background-color','#E0F8FB');
        $('li.list_row').mouseover(function(){
            $(this).children().addClass('list_row_hover');
        });
        $('li.list_row').mouseout(function(){
            $(this).children().removeClass('list_row_hover');
        });
        //验证
        $.checks.checkform($('#addAdminForm'), {
            "async": {'success': succ},
            "aName": {
                "name": "登录名",
                "check": ["noSpechars", {"isLength": [4, 20]}, {"isAjax": ["/server/iskeySer.php"]}]
            }, "aNick": {
                "name": "姓名",
                "check": [{"isLength": [2, 20]}]
            }
        });


        //排序
        $("li.showlistle:first > span").click(function () {
            var $sort = "ASC";
            if ($(this).html() == $("#sortCache").attr("sortLine")) {
                if ($("#sortCache").val() == "ASC") {
                    $sort = "DESC";
                    $("#sortCache").val("DESC");
                } else {
                    $("#sortCache").val("ASC");
                }
            } else {
                $("#sortCache").attr("sortLine", $(this).html());
                $("#sortCache").val("ASC");
            }
            $('#contents').load('./inc/sysAdmin.php?sort=' + $sort + '&sortLine=' + $(this).html());
        });

        //列表搜索
        $("li.showlistle >div.search").click(function () {
            $('#contents').load('./inc/sysAdmin.php?page=0&searchLine='+$("#seacrhSelect").val()+'&search='+$(".searchtext >input[type='text']").val());
        });

        //列表取消搜索
        $("li.showlistle >div#searchDelete").click(function () {
            $('#contents').load('./inc/sysAdmin.php?page=0&searchDelete=true');
        });
        //列表每页多少汗设置
        $("li.showlistle >div.pageRow>span").click(function () {
            $('#contents').load('./inc/sysAdmin.php?page=0&pageRow=' + $(this).html());
        });
        //列表选页
        $("li.showlistle >div.pageSum").click(function () {
            $('#contents').load('./inc/sysAdmin.php?page=' + (parseInt($(this).html()) - 1));
        });
        //列表翻页
        $("li.showlistle >div.pages").click(function () {
            if ($(this).html() == "下一页") {
                $('#contents').load('./inc/sysAdmin.php?page=' + (parseInt($("li.showlistle >div.pageis").html())));
            } else {
                $('#contents').load('./inc/sysAdmin.php?page=' + (parseInt($("li.showlistle >div.pageis").html()) - 2));
            }
        });
        //管理员详情
        $("li.showListCons").click(function () {
            $.get("./inc/sysAdminUpdate.php", {'name': $(this).children('span.delete').attr("value")}, function (data) {
                $("body").append(data);
                $('#sysAdminUpdatewin').slideDown(500);
            });
        });

        //删除管理员
        $("li.showListCons >span.delete").click(function (e) {
            $slfe = $(this);
            showdielogue("删除权限组", "确定要删除该权限组吗？删除之后该权限组的所有管理员都将丧失所有权限", function () {
                $.get("./server/adminDelete.php", {'name': $slfe.attr("value")}, function (data) {
                    //alert(data);
                    toast(data.status, data.megs);
                    $("#contents").load("./inc/sysAdmin.php");
                }, "json");
            });
            e.stopPropagation();
        });

    });

    $(function(){
        //上传头像
        var up = uploads.getUplad();
        up.browse_button = "imgUp";
        //up.container = "adminHeadImg";
        up['init'].UploadProgress = function(up,file){
            $("#bar").css("width",file.percent+"%");
        };
        up['init'].FileUploaded = function (up, file, info) {
            var domain = up.getOption('domain');
            var res = JSON.parse(info);
            $("#adminHeadImg>img").attr("src", domain + "/" + res.key + "?imageView2/5/w/75/h/75");
            $("#adminHeadImg>input[name='img']").val(domain + "/" + res.key);
            $("#bar").css("background-color","#50D1DE");
        };
        var uploader = Qiniu.uploader(up);
    });
<?php echo '</script'; ?>
>
<?php }
}
?>