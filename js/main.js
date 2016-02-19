
/**
* 吐司
* sru bool值 true为成功 false 为失败
* meg string 消息
* time 吐司时间 默认2秒
* */
function toast(sru, meg, time) {
    var time = time || 2000;
    if ($('#toast').length < 1) {
        $('body').append("<div id = 'toast'></div>")
    }
    if (sru) {
        $('#toast').attr('class', 'toastsuc');
    } else {
        $('#toast').attr('class', 'toasterr');
    }
    $('#toast').css("left", ($(window).width() / 2 - 100) + "px");
    $('#toast').html(meg).fadeIn(500, function () {
        setTimeout(function () {
            $('#toast').fadeOut(500);
        }, time);
    });
}

/**
* 初始化弹出窗口
* thiswidth int 需要弹出窗口的宽度
* top   string  弹出窗口的高度；
* */
function reset(thiswidth,top) {
    var top  =top || "200px";
    var thiswidth = thiswidth || 200;
    $(".backdrop").css("width", $(window).width() + "px");
    $(".backdrop").css("height", $(window).height() + "px");
    $('.show_win').css("top", top);
    $('.show_win').css("left", ($(window).width() / 2 - (thiswidth/2)) + "px");
}
/**
* 消息对话框
* title string  标题
* mage  string  详细
* fun   function  按确定之后执行的方法
* */
function showdielogue(title ,mage ,fun ){
    if ($('#showdielogue').length < 1) {
        $('body').append("<div id = 'showdielogue'><span></span><div></div>" +
            "<div><div class ='button'>取消</div><div class ='button'>确定</div></div></div>")
    }
    $("#showdielogue >span").html(title);
    $("#showdielogue >div:first").html(""+mage);
    $('#showdielogue').css("left", ($(window).width() / 2 - 200) + "px");
    $("#showdielogue").show();
    $("#showdielogue >div >div.button").click(function(){
        if($(this).html() == "确定"){
            $("#showdielogue").hide();
            fun();
        }else{
            $("#showdielogue").hide();
        }
    });
}

$(function(){
    $(".submit").click(function(){
        $(this).parents('form').submit();
    });
});
//上传模板
