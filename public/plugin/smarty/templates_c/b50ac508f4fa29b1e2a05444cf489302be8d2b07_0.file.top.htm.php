<?php /* Smarty version 3.1.27, created on 2016-05-21 16:20:36
         compiled from "/home/xiehui/work/mall258/tplPc/top.htm" */ ?>
<?php
/*%%SmartyHeaderCode:76106419857401a547ba9b2_02584657%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b50ac508f4fa29b1e2a05444cf489302be8d2b07' => 
    array (
      0 => '/home/xiehui/work/mall258/tplPc/top.htm',
      1 => 1463818831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76106419857401a547ba9b2_02584657',
  'variables' => 
  array (
    'user' => 0,
    'HTTP_HOST' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57401a547e5862_06729475',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57401a547e5862_06729475')) {
function content_57401a547e5862_06729475 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '76106419857401a547ba9b2_02584657';
?>
<!--顶部-->
<div class="header_top">
    <div class="wrap">
        <div class="header_top_left">
            <ul>
                <?php if (!empty($_smarty_tpl->tpl_vars['user']->value)) {?>
                <li id="user"><a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/user.php"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['u_nick'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['user']->value['u_name'] : $tmp);?>
</a></li>
                <li>&nbsp;欢迎回来</li>
                <?php } else { ?>
                <li>欢迎光临星火数码</li><span>|</span>
                <li><a class="show_float_div" float_id="login" href="javascript:void(0)" >登录</a></li><span>|</span>
                <li><a class="show_float_div" float_id="register" href="javascript:void(0)" >注册</a></li>
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
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goodsList.php?gt_id=1">手机</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goodsList.php?gt_id=2">笔记本</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goodsList.php?gt_id=4">电视</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goodsList.php?gt_id=3">相机</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goodsList.php">周边</a></li>
        </ul>
    </div>
    <div class="header_bottom_right">
        <div class="search">
            <input type="text" class = 'search_text' placeholder="搜索商品" >
            <div class = 'search_submit'></div>
        </div>
        <div class="collect c_c">
            <div title="收藏夹"  class="c_c_img"><div class="c_c_sum"></div></div>
            <ul class="c_c_ul">
                <li class="c_c_li null">
                    您还没收藏过商品
                </li>
            </ul>
        </div>

        <div class="cart c_c">
            <div title="购物车"  class="c_c_img"><div class="c_c_sum"></div></div>
            <ul class="c_c_ul">
                <li class="c_c_li null">
                    购物车是空的
                </li>
            </ul>
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
            },'before':function(){
                if(typeof($('#registerForm .address_start').attr('address')) !=='undefined'){
                    $('#registerForm') .find("input[name='u_address']").val($('#registerForm .address_start').attr('address'));
                }
            }
        });

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
/view/top.php',function(){

                    });
                    h_util.closeFloatDiv('login');
//                    同步收藏夹
                    if(localStorage.getItem('collect')){
                        var collect = JSON.parse(localStorage.getItem('collect'));
                        var g_ids ='';
                        for(var x in collect){
                            g_ids +=collect[x]['g_id']+',';
                        }
                        g_ids = g_ids.replace(/,$/,'');
                        $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/collectAddSer.php?login=true&g_id='+g_ids,function(data){
                            if(data.status){
                                h_util.setStorage('collect',JSON.stringify(data['goods']))
                            }
                        });
                    }else{
                        $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/collectAddSer.php?login=true',function(data){
                            if(data.status){
                                h_util.setStorage('collect',JSON.stringify(data['goods']))
                            }
                        });
                    }
//                    同步购物车
                    if(localStorage.getItem('cart')){
                        var cart = JSON.parse(localStorage.getItem('cart'));
                        var gpi_ids ='{';
                        for(var x in cart){
                            gpi_ids +='"'+cart[x]['gpi_id']+'":"'+cart[x]['sum']+'",';
                        }
                        gpi_ids = gpi_ids.replace(/,$/,'}');

                        $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/cartAddSer.php',{'gpi':JSON.parse(gpi_ids),'login':true},function(data){
                            if(data.status){
                                h_util.setStorage('cart',JSON.stringify(data['gpi']))
                            }
                        });
                    }else{
                        $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/cartAddSer.php?login=true',function(data){
                            if(data.status){
                                h_util.setStorage('cart',JSON.stringify(data['gpi']))
                            }
                        });
                    }
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
<?php echo '</script'; ?>
>
<?php }?>
<?php echo '<script'; ?>
>
    h_main.push(function(){

//        删除收藏夹
        $('body').on('click','.collect_remove',function(){
            var g_id = $(this).parents('.c_c_li').attr('g_id');
            var collect = JSON.parse(localStorage.getItem('collect'));
            for(var x in collect){
                if(collect[x]['g_id'] == g_id){
                    collect.splice(x,1);
                    break;
                }
            }
            if ($('#user').length ===1){
                $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/collectDeleteSer.php?g_id='+g_id,function(data){
                    if(!data.status){
                        h_util.toast(data);
                    }else{
                        if(collect.length === 0){
                            h_util.removeStorage('collect');
                        }else{
                            h_util.setStorage('collect',JSON.stringify(collect));
                        }
                    }
                });
            }else{
                if(collect.length === 0){
                    h_util.removeStorage('collect');
                }else{
                    h_util.setStorage('collect',JSON.stringify(collect));
                }
            }

        });

//        删除购物车
        $('body').on('click','.cart_remove',function(){
            var gpi_id = $(this).parents('.c_c_li').attr('gpi_id');
            var cart = JSON.parse(localStorage.getItem('cart'));
            for(var x in cart){
                if(cart[x]['gpi_id'] == gpi_id){
                    cart.splice(x,1);
                    break;
                }
            }
            if ($('#user').length ===1){
                $.getJSON('<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/server/cartDeleteSer.php?gpi_id='+gpi_id,function(data){
                    if(!data.status){
                        h_util.toast(data);
                    }else{
                        if(cart.length === 0){
                            h_util.removeStorage('cart');
                        }else{
                            h_util.setStorage('cart',JSON.stringify(cart));
                        }
                    }
                });
            }else{
                if(cart.length === 0){
                    h_util.removeStorage('cart');
                }else{
                    h_util.setStorage('cart',JSON.stringify(cart));
                }
            }

        });

        //初始化本地存储
        var StorageInit =function(){
            //收藏夹
            $('.collect >ul >li[g_id]').remove();
            if(localStorage.getItem('collect')){
                $('.collect >ul >li.null').hide();
                var collect = JSON.parse(localStorage.getItem('collect'));
                for(var x in collect){
                    var g_name = h_util.gblen(collect[x]['g_name'],28,'<br/>',2);
                    $('<li class="c_c_li" g_id ="'+collect[x]['g_id']+'"><a title="'+collect[x]['g_name']+'" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goods.php?id='+collect[x]['g_number']+'"><img src="'+h_util.imgLink(collect[x]['g_img'],'min')+'"/>' +
                            '<div class="c_c_div"><a title="'+collect[x]['g_name']+'" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goods.php?id='+collect[x]['g_number']+'">'+g_name+'</a></div>' +
                            '<div class ="c_c_util"><a title="'+collect[x]['g_name']+'" class="collect_remove" href="javascript:void(0)">删除</a></div></li>').appendTo($('.collect >ul'));
                }
                $('.collect .c_c_sum').html(collect.length).show();

            }else{
                $('.collect .c_c_sum').html("").hide();
                $('.collect >ul >li.null').show();
            }
            //购物车
            $('.cart >ul >li[gpi_id]').remove();
            if(localStorage.getItem('cart')){
                $('.cart >ul >li.null').hide();
                var cart = JSON.parse(localStorage.getItem('cart'));
                for(var x in cart){
                    var attr = "";
                    for(var x1 in cart[x]['GPriceList']){
                        attr+='&nbsp;&nbsp;'+cart[x]['GPriceList'][x1]['gtp_name']+':'+cart[x]['GPriceList'][x1]['gp_name'];
                    }
                    $('<li class="c_c_li" gpi_id ="'+cart[x]['gpi_id']+'"><a title="'+cart[x]['g_name']+'" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goods.php?id='+cart[x]['g_number']+'&gpi_id='+cart[x]['gpi_id']+'"><img src="'+h_util.imgLink(cart[x]['gpi_img'],'min')+'"/>' +
                            '<div class="c_c_div"><a title="'+cart[x]['g_name']+'" href="<?php echo $_smarty_tpl->tpl_vars['HTTP_HOST']->value;?>
/view/goods.php?id='+cart[x]['g_number']+'&gpi_id='+cart[x]['gpi_id']+'" >'+cart[x]['g_name']+'</a>' +
                            '<br>数量：'+cart[x]['sum']+'&nbsp;&nbsp;价格：'+cart[x]['gpi_price']+'<span title="'+attr+'">'+attr+'</span></div>' +
                            '<div class ="c_c_util"><a  class="cart_remove" href="javascript:void(0)">删除</a></div></li>').appendTo($('.cart >ul'));
                }
                $('.cart .c_c_sum').html(cart.length).show();

            }else{
                $('.cart .c_c_sum').html("").hide();
                $('.cart >ul >li.null').show();
            }

        };
        h_util.addStorageEven(StorageInit);
        StorageInit();

        $('.c_c').mouseleave(function(){
            $(this).children('ul').hide();
        }).mouseenter(function(){
            $(this).children('ul').show();
        });
    });
<?php echo '</script'; ?>
>

<?php }
}
?>