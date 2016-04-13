/**
 * Created by PC-SHITING on 2016/4/13.
 */
define('main',['jquery-ui'],function(){
    //监听提交所有的按钮 可先帮定方法
    $('body').on('click','.submit',function(){
        if(typeof $(this).attr('callback') !=='undefined'){
            $(this).trigger($(this).attr('callback'));
        }
        $(this).parents('form').submit();
    });

    //监听键盘事件
    $(document).keydown(function(e){
        var enter=function(e){//enter 如果有焦点就提交
            if($("input:focus").length >0 && $("input:focus").parents('form').length >0){
                $("input:focus").parents('form').submit();
            }
        };
        switch (e.keyCode){
            case 13:
                enter(e);
                break;
        }
    });

    //打开浮动窗口
    $('body').on('click','.show_float_div',function(){
        h_util.showFloatDiv($(this).attr('float_id'));
    });
    //关闭浮动窗口
    $('body').on('click','.close_float_div',function(){
        if($(this).parents('.float_div').length >0 ){
            h_util.closeFloatDiv($(this).parents('.float_div').attr('id'));
        }else{
            h_util.closeFloatDiv($(this).attr('float_id'));
        }

    });
    //浮动窗口移动
    $( ".float_div" ).draggable({ handle: ".float_head" , containment:'#float_back'});

    //窗口变化初始化
    function init(e){
        $('.float_div').each(function(){
            $(this).css('left',$(window).width()/2-$(this).width()/2+'px');
        });
        $('#float_back').css('width',$(window).width());
        $('#float_back').css('height',$(window).height());
    }
    init();
    $(window).resize(init);

    window.h_util = {
        /**
         * 吐司
         * status bool|object true为成功 false 为失败
         * meg string 消息
         * time 吐司时间 默认2秒
         * */
        toast:function(status,megs,time){
            if(typeof status ==='object'){
                megs = status.megs;
                status = status.status;
            }
            var time = time || 2000;
            if ($('#toast').length < 1) {
                $('body').append("<div id = 'toast'></div>")
            }
            if (status) {
                $('#toast').attr('class', 'toast_su');
            } else {
                $('#toast').attr('class', 'toast_er');
            }
            $('#toast').css("left", ($(window).width() / 2 - 100) + "px");
            $('#toast').html(megs).fadeIn(500, function () {
                setTimeout(function () {
                    $('#toast').fadeOut(500);
                }, time);
            });
        },

        /**
         * 消息对话框
         * fun   function  按确定之后执行的方法
         * title string  标题
         * mage  string  详细
         * */
        dialogue:function(fun,title,mage){
            if ($('#dialogue').length < 1) {
                $('body').append("<div id = 'dialogue'><h6 class='dia_title'></h6><div class='dia_megs'></div><div class ='dia_no button_left'>取消</div><div class ='dia_ok button_right'>确定</div></div>");
                $('#dialogue > .dia_no').click(function(){
                    $("#dialogue").hide();
                });
                $('#dialogue > .dia_ok').click(function(){
                    $("#dialogue").hide();
                    $(this).trigger('trig');
                });
            }
            $("#dialogue >.dia_title").html(title ||"确定要删除吗");
            $("#dialogue >.dia_megs").html(mage || "删除后后果自负");
            $('#dialogue').css("left", ($(window).width() / 2 - 200) + "px");
            $("#dialogue").show();
            $('#dialogue >div.dia_ok').unbind('trig').bind('trig',fun);
        },


        getCookie:function(c_name){
            if (document.cookie.length>0){
                var c_start=document.cookie.indexOf(c_name + "=");
                if (c_start!=-1) {
                    c_start=c_start + c_name.length+1;
                    var c_end=document.cookie.indexOf(";",c_start);
                    if (c_end==-1) c_end=document.cookie.length;
                    return decodeURIComponent(document.cookie.substring(c_start,c_end))
                }
            }
            return ""
        },
        setCookie:function(c_name,value,time,path){
            if(typeof time !=='undefined'){
                var date=new Date();
                date.setTime(date.getTime()+time);
                time = ";expires="+date.toUTCString();
            }else{ time="";}
            path = typeof path !=='undefined'?";path="+path:";path=/";
            document.cookie=c_name+ "=" +decodeURI(value)+time+path;
        },

        showFloatDiv:function(divId){
            $('#float_back').show();
            $('#'+divId).show();
        },
        closeFloatDiv:function(divId){
            $('#float_back').hide();
            $('#'+divId).hide();
        }


    };
});
