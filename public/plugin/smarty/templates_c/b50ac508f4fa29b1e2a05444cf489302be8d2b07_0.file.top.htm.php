<?php /* Smarty version 3.1.27, created on 2016-05-05 04:00:08
         compiled from "/home/xiehui/work/mall258/tplPc/top.htm" */ ?>
<?php
/*%%SmartyHeaderCode:2022118885572a54c83be837_39586747%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b50ac508f4fa29b1e2a05444cf489302be8d2b07' => 
    array (
      0 => '/home/xiehui/work/mall258/tplPc/top.htm',
      1 => 1462392000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2022118885572a54c83be837_39586747',
  'variables' => 
  array (
    'user' => 0,
    'HTTP_HOST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_572a54c83c5d26_90336983',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_572a54c83c5d26_90336983')) {
function content_572a54c83c5d26_90336983 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2022118885572a54c83be837_39586747';
?>
<!--顶部-->
<div class="header_top">
    <div class="wrap">
        <div class="header_top_left">
            <ul>
                <?php if (!empty($_smarty_tpl->tpl_vars['user']->value)) {?>
                <li><a><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['u_nick'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['u_name'] : $tmp);?>
</a></li>
                <li>&nbsp;欢迎回来</li>
                <?php } else { ?>
                <li>欢迎光临星火数码</li><span>|</span>
                <li><a class="show_float_div" float_id="login" href="javascript:void(0)" >登录</a></li><span>|</span>
                <li><a <a class="show_float_div" float_id="register" href="javascript:void(0)" >注册</a></li>
                <?php }?>
            </ul>
        </div>
        <div class="header_top_right">
            <ul>
                <?php if (!empty($_smarty_tpl->tpl_vars['user']->value)) {?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/exitSer.php">安全退出</a></li><span>|</span>
                <?php }?>
                <li><a>随机逛逛</a></li><span>|</span>
                <li><a>联系我们</a></li>
            </ul>
        </div>
    </div>
</div>
<!--导航搜索购物车收藏夹-->
<div class="header_bottom wrap ">
    <div class="header_bottom_left">
        <div class="logo">
            <a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
">
                <img src="http://7xsiy9.com2.z0.glb.clouddn.com/mall258.png">
            </a>
        </div>
        <ul class="menu">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goodsList.php">全部商品</a></li>
            <li><a href="">手机</a></li>
            <li><a href="">笔记本</a></li>
            <li><a href="">电视</a></li>
            <li><a href="">相机</a></li>
            <li><a href="">周边</a></li>
        </ul>
    </div>
    <div class="header_bottom_right">
        <div class="search">
            <input type="text" class = 'search_text' placeholder="搜索商品" >
            <div class = 'search_submit'></div>
        </div>
        <div class="collect">

        </div>

        <div class="cart">

        </div>
    </div>
</div>
<?php if (empty($_smarty_tpl->tpl_vars['user']->value)) {?>
<div id ='login' class="float_div">
    <div class="float_head">登录  <div class="float_div_close close_float_div">×</div></div>
    <form method="post" id="loginForm" action="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/userLoginSer.php">
        <div class="float_row">
            <label class="float_row_head" for="l_name">用户名: </label>
            <div class="float_row_input">
                <input type="text" name="u_name" id="l_name" class="form_div" />
            </div>
        </div>
        <div class="float_row">
            <label class="float_row_head" for="l_pwd">密码: </label>
            <div class="float_row_input">
                <input type="password" name="u_pwd" id="l_pwd" class="form_div" />
            </div>
        </div>
        <div class="float_row verify_row">
            <label class="float_row_head" for="l_verify">验证码: </label>
            <div class="float_row_input">
                <input type="text" name="u_verify" id="l_verify" class="form_div_verify"/>
                <div class="verify_img"><img src="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/validateSer.php?name=login_verify" /> </div>

            </div>
        </div>
        <div class="float_row">
            <div class="button_left close_float_div">取消</div>
            <div class="button_right submit">登录</div>
        </div>
    </form>
</div>
<div id="register" class="float_div">
    <div class="float_head">注册 <div class="float_div_close close_float_div">×</div></div>
    <form action="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/userRegisterSer.php" method="post" id="registerForm">
        <input type="hidden" name="u_address" />
        <div class="float_row">
            <label class="float_row_head" for="r_name">用户名: </label>
            <div class="float_row_input">
                <input type="text" name="u_name" id="r_name" class="form_div"/>
            </div>
        </div>
        <div class="float_row">
            <label class="float_row_head" for="r_pwd">密码: </label>
            <div class="float_row_input">
                <input type="password" name="u_pwd" id="r_pwd" class="form_div"/>
            </div>
        </div>
        <div class="float_row">
            <label class="float_row_head" for="rs_pwd">重复密码: </label>
            <div class="float_row_input">
                <input type="password" name="us_pwd" id="rs_pwd" class="form_div"/>
            </div>
        </div>
        <div class="float_row">
            <label class="float_row_head" >地址: </label>
            <div class="float_row_input">
                <div class="address address_start" size="3" ><span class="address_title">省/直辖市</span>
                    <ul></ul>
                </div>
            </div>
        </div>
        <div class="float_row">
            <label class="float_row_head" for="r_nick">昵称: </label>
            <div class="float_row_input">
                <input type="text" name="u_nick" id="r_nick" class="form_div"/>
            </div>
        </div>
        <div class="float_row">
            <label class="float_row_head" for="r_phone">手机号码: </label>
            <div class="float_row_input">
                <input type="text" name="u_phone" id="r_phone" class="form_div"/>
            </div>
        </div>
        <div class="float_row">
            <label class="float_row_head" for="r_email">email: </label>
            <div class="float_row_input">
                <input type="text" name="u_email" id="r_email" class="form_div"/>
            </div>
        </div>
        <div class="float_row">
            <label class="float_row_head" for="r_img">头像: </label>
            <div class="float_row_input">
                <input type="text" name="u_img" id="r_img" class="form_div"/>
            </div>
        </div>
        <div class="float_row">
            <div class="button_left close_float_div">取消</div>
            <div class="button_right submit">登录</div>
        </div>
    </form>
</div>
<?php }?>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
    h_main.push(['verify',function(v){
        //默认不开启验证码
        if(h_util.getCookie('login_verify') ==='' ||  h_util.getCookie('login_verify') <= 1 ){
            $('.verify_row').hide();
        }

        //注册验证
        v.verifyForm('registerForm',{
            u_name: {
                name: "用户名",
                check: ["noSpechars", {"length": [4,20],"ajax": ["/server/iskeySer.php"]}]
            },
            u_pwd:{
                name: "密码",
                check: [{"length": [6,20]}]
            },
            us_pwd:{
                name: "重复密码",
                check: [{"length": [6,20],'contrast':['u_pwd']}]
            },
            u_phone:{
                name: "手机号码",
                check: ['phone',{"ajax":["/server/iskeySer.php"]}]
            },
            u_email:{
                name: "电子邮件",
                check: ['email',{"ajax":["/server/iskeySer.php"]}]
            }
        },{
            'success':function(data){
            h_util.toast(data);
            if(data.status){
                h_util.closeFloatDiv('#register');
            }else{
                
            }
        },
            'beforeSend':function(){
                if(typeof($('#registerForm .address_start').attr('address')) !=='undefined'){
                $('#registerForm') .find("input[name='u_address']").val($('#registerForm .address_start').attr('address'));
                }
            }});

        //登录验证
        v.verifyForm('loginForm',{
            u_name: {
                name: "用户名",
                check: ["noSpechars", {"length": [4,20]}]
            },
            u_pwd:{
                name: "密码",
                check: [{"length": [6,20]}]
            },
            u_verify:{
                name: "验证码",
                location:function(){
                    var ret = $("<div class='verify_megs'> </div>");
                    $(this).parent().append(ret);
                    return ret;
                },
                check:['noSpechars',{'length':[4,4]}]
            }
        },{
            'success':function(data){
                h_util.toast(data);
                if(data.status){
                    $('#top_div').load('<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/top.php');
                    h_util.closeFloatDiv('login');
                }else{
                    $('#loginForm').find('input[name="u_pwd"]').val("");
                }
                if(typeof data.verify !=='undefined'){
                    $('.verify_row').show();
                    $('.verify_img >img').trigger('click');
                }
            }
        });

        //验证码刷新
        $('.verify_img >img').click(function(){
            var src = $(this).attr('src');
            src = src.indexOf('&time')=== -1?src:src.substr(0, src.indexOf('&time'));
            $(this).attr('src',src+'&time='+new Date().getTime());
        });

        //有注册就开启地址
        $('#register').on('show',function(){
            h_util.addressSelect($(this));
        });


    }]);
//    window.onload = function(){
//        require(['verify','main'],function(v){
//
//            $('.address').mouseover(function(){
//                $(this).children('ul').show();
//            }).mouseout(function(){
//                $(this).children('ul').hide();
//            });
//
//            $('body').on('click','.address li',function(){
//                var self = $(this).parents('.address');
//                self.attr('address',$(this).attr('value'));
//                self.children('span.address_title').hide();
//                self.children('span.address_name').show().html($(this).html());
//                self.nextAll().children('span.address_name').hide();
//                self.nextAll().children('span.address_title').show();
//                self.nextAll().find('li').remove();
//                if(self.next().length >0){
//                    var s = self.next();
//                    $.getJSON('//aws.mall258.com/getAddress.php?add_number='+$(this).attr('value')+'&callback=?',function(data){
//                        for (var el in data){
//                            s.children('ul').append("<li value='"+data[el]['add_number']+"' title='"+data[el]['add_name']+"'> "+data[el]['add_name']+"</li>");
//                        }
//                        if(data.length >5){
//                            s.children('ul').css('width',parseInt(s.find('li').first().width())*5+10);
//                        }
//                    });
//                }
//                self.children('ul').hide();
//            });


//
//            $('.float_div').each(function(){$(this).appendTo($('body')); });
//
//            if(h_util.getCookie('login_verify') ==='' ||  h_util.getCookie('login_verify') <= 1 ){
//                $('.verify_row').hide();
//            }
//
//            //注册验证
//            v.verifyForm('registerForm',{
//                u_name: {
//                    name: "用户名",
//                    check: ["noSpechars", {"length": [4,20],"ajax": ["/server/iskeySer.php"]}]
//                },
//                u_pwd:{
//                    name: "密码",
//                    check: [{"length": [6,20]}]
//                },
//                us_pwd:{
//                    name: "重复密码",
//                    check: [{"length": [6,20],'contrast':['u_pwd']}]
//                },
//                u_phone:{
//                    name: "手机号码",
//                    check: ['phone',{"ajax":["/server/iskeySer.php"]}]
//                },
//                u_email:{
//                    name: "电子邮件",
//                    check: ['email',{"ajax":["/server/iskeySer.php"]}]
//                }
//            },{'success':function(data){
//                h_util.toast(data);
//                if(data.status){
//                    $('#register').hide();
//                }
//            }});
//            //登录验证
//            v.verifyForm('loginForm',{
//                u_name: {
//                    name: "用户名",
//                    check: ["noSpechars", {"length": [4,20]}]
//                },
//                u_pwd:{
//                    name: "密码",
//                    check: [{"length": [6,20]}]
//                },
//                u_verify:{
//                    name: "验证码",
//                    check:['noSpechars',{'length':[4,4]}]
//                }
//            },{
//                'success':function(data){
//                    h_util.toast(data);
//                    if(data.status){
//                        $('#top_div').load('<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/top.php');
//                        h_util.closeFloatDiv('login');
//                    }
//                    if(typeof data.verify !=='undefined'){
//                        $('.verify_row').show();
//                        $('.verify_img >img').trigger('click');
//                    }
//                }});
//
//            //验证码刷新
//            $('.verify_img >img').click(function(){
//                var src = $(this).attr('src');
//                src = src.indexOf('&time')=== -1?src:src.substr(0, src.indexOf('&time'));
//                $(this).attr('src',src+'&time='+new Date().getTime());
//            });
//
//        });
//
//    };
<?php echo '</script'; ?>
>
<!--<div id="top">-->
    <!--<div class="top_util">-->
        <!--<div class="top_left">-->
            <!--<?php if (!empty($_smarty_tpl->tpl_vars['user']->value)) {?>-->
            <!--<?php echo $_smarty_tpl->tpl_vars['user']->value['u_nick'];?>
-->
            <!--<a href="/server/exitSer.php">安全退出</a>-->
            <!--<?php } else { ?>-->
                <!--<div>-->
                   <!--欢迎光临![<a class="show_float_div" float_id="login" href="javascript:void(0)">请登录</a>] [<a class="show_float_div" float_id="register" href="javascript:void(0)">注册</a>]-->
                <!--</div>-->
            <!--<?php }?>-->
        <!--</div>-->
        <!--<div class="top_center">-->
            <!--<input name="search" type="text" id="search" />-->
            <!--<div><a>搜索</a></div>-->
        <!--</div>-->
        <!--<div class="top_right">-->
            <!--<ul>-->
                <!--<li><a>购物车</a></li><span>|</span>-->
                <!--<li><a>收藏夹</a></li><span>|</span>-->
                <!--<li><a>随便逛逛</a></li><span>|</span>-->
                <!--<li><a>联系我们</a></li>-->
            <!--</ul>-->
        <!--</div>-->
    <!--</div>-->
<!--</div>--><?php }
}
?>