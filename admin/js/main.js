
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
//
// /**
//  * 初始化弹出窗口
//  * width int 需要弹出窗口的宽度
//  * top   string  弹出窗口的高度；
//  * */
// function showWinInit(width,top) {
//     var top  =top || 200;
//     var width = width || 200;
//     $(".backdrop").css("width", $(window).width() + "px");
//     $(".backdrop").css("height", $(window).height() + "px");
//     $('.show_win').css("top", top+'px');
//     $('.show_win').css("left", ($(window).width() / 2 - (width/2)) + "px");
// }
/**
 * 消息对话框
 * title string  标题
 * mage  string  详细
 * fun   function  按确定之后执行的方法
 * */
function showdielogue(title ,mage ,fun ){
    if ($('#showdielogue').length < 1) {
        $('body').append("<div id = 'showdielogue'><span></span><div></div>" +"<div><div class ='button'>取消</div><div class ='button'>确定</div></div></div>");
    }
    $("#showdielogue >span").html(title);
    $("#showdielogue >div:first").html(""+mage);
    $('#showdielogue').css("left", ($(window).width() / 2 - 200) + "px");
    $("#showdielogue").show();
    $("#showdielogue >div >div.button").unbind();
    $("#showdielogue >div >div.button").click(function(){
        if($(this).html() == "确定"){
            $("#showdielogue").hide();
            fun();
        }else{
            $("#showdielogue").hide();
        }
    });
}

//页面刷新
var Resize = (function() {
    var resizeFuns = [];
    var resizeWin=function(fun){
        if(!in_array(fun,resizeFuns)){
            resizeFuns.push(fun);
        }
    };
    var in_array = function(stringToSearch, arrayToSearch) {
        for (var s = 0; s < arrayToSearch.length; s++) {
            if (stringToSearch == arrayToSearch[s]) {
                return true;
            }
        }
        return false;
    };
    return {
        resizeRun:function(){
            for (var fun in resizeFuns){
                resizeFuns[fun]();
            }
        },
        resizeF5:function(url){
            $('#contents').load(url);
            $('#CRUD').children().remove();
            $('.backdrop').hide();
        },
        resizeAdd:function(width,top){
            showWinInit(width,top);
            $(".backdrop").show();
            resizeWin(function(){
                showWinInit(width,top);
            });
            $('.show_win_close ,.cancel').click(function(){
                $('#CRUD').children().remove();
                $('.backdrop').hide();
            });
        }
    }
})();
$(window).resize(Resize.resizeRun);

//上传模板
function getUpload(){
    var upload ={
        filters :{
            mime_types : [ //只允许上传图片和zip文件
                { title : "img", extensions : "jpg,png,gif" }
            ]
        },
        multi_selection:false,
        runtimes: 'html5,flash,html4',    //上传模式,依次退化
        browse_button: 'pickfiles',       //上传选择的点选按钮，**必需**
        uptoken_url: '/server/qiniuKeySer.php?time='+new Date().getTime(),
        //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
        // uptoken : '<Your upload token>',
        //若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
        unique_names: true,
        // 默认 false，key为文件名。若开启该选项，SDK会为每个文件自动生成key（文件名）
        // save_key: true,
        // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK在前端将不对key进行任何处理
        domain: 'http://7xkkh3.com1.z0.glb.clouddn.com',
        //bucket 域名，下载资源时用到，**必需**
        // container: 'container',           //上传区域DOM ID，默认是browser_button的父元素，
        max_file_size: '100mb',           //最大文件体积限制
        flash_swf_url: './js/plupload/Moxie.swf',  //引入flash,相对路径
        max_retries: 3,                   //上传失败最大重试次数
        dragdrop: false,                   //开启可拖曳上传
        //drop_element: 'container',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
        chunk_size: '4mb',                //分块上传时，每片的体积
        auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
        init: {
            'FilesAdded': function(up, files) {
                plupload.each(files, function(file) {
                    // 文件添加进队列后,处理相关的事情
                });
            },
            'BeforeUpload': function(up, file) {
                // 每个文件上传前,处理相关的事情
            },
            'UploadProgress': function(up, file) {
                // 每个文件上传时,处理相关的事情
            },
            'FileUploaded': function(up, file, info) {
                // 每个文件上传成功后,处理相关的事情
                // 其中 info 是文件上传成功后，服务端返回的json，形式如
                // {
                //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                //    "key": "gogopher.jpg"
                //  }
                // 参考http://developer.qiniu.com/docs/v6/api/overview/up/response/simple-response.html
                // var domain = up.getOption('domain');
                // var res = JSON.parse(info);
                // $("#imggg").attr('src',domain+"/"+res.key); //获取上传成功后的文件的Url
            },
            'Error': function(up, err, errTip) {
                //上传出错时,处理相关的事情
            },
            'UploadComplete': function() {
                //队列文件处理完毕后,处理相关的事情
            },
            'Key': function(up, file) {
                // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                // 该配置必须要在 unique_names: false , save_key: false 时才生效
                var key = "";
                // do something with key here
                return key
            }
        }
    };
   // function f(){};
  //   f.prototype=upload;
  // //  return new upload.constructor;
  //   var f1 = new f();
  //   f1.init = upload.init;
  //   return f1;
    var u ={};
    $.extend(u,upload);
    return u;
}

function PageSearch(page_url){
    var load =function(){
        $('#contents').load(page_url,$('#list_form').serialize());
    }
    //列表背景颜色
    $('li.list_row:even ').addClass('list_row_even');
    $('li.list_row:odd').addClass('list_row_odd');
    $('li.list_row').mouseover(function(){
        $(this).children().addClass('list_row_hover');
    });
    $('li.list_row').mouseout(function(){
        $(this).children().removeClass('list_row_hover');
    });

    $("span.list_row_sum").map(function(){
        if($(this).html() ==$('#list_form').children("input[name='pageRow']").val()){
            $(this).addClass("list_row_sumOn");
        }
    });
    //
    //$('#search_select >option').map(function(){
    //    if($(this).html() ==$('#list_form').children("input[name='searchLine']").val()){
    //        $(this).parent().val($(this).html());
    //    }
    //});
    //排序
    $("li.list_row_head > span").click(function () {
        var sortLine = $('#list_form').children("input[name='sortLine']");
        var sort = $('#list_form').children("input[name='sort']");
        if(sortLine.val() == $(this).attr('name')){
            if(sort.val() == "DESC"){
                sort.val("ASC");
            }else{
                sort.val("DESC");
            }
        }else{
            sortLine.val($(this).attr('name'));
            sort.val("DESC");
        }
        load();
    });
    //列表搜索
    // $("#list_search").unbind();
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
}

var CRUD = {
    add:function(url,width,top){
        $('.add_show_button').click(function(){
            $.get(url,function(data){
                try{
                    var j = JSON.parse(data);
                    toast(j.status, j.megs);
                }catch(error){
                    $('#CRUD').html(data);
                    Resize.resizeAdd(width,top);
                }
            });
        });
    },
    update:function(url,width,top){
        $('.list_row').click(function(){
            $('#CRUD').load(url+'?name='+$(this).children('span.delete').attr('value'),function(data){
                try{
                    var j = JSON.parse(data);
                    toast(j.status, j.megs);
                }catch(error){
                    $('#CRUD').html(data);
                    Resize.resizeAdd(width,top);
                }
            });
        });
    },
    delete:function(url,loal_url,title,megs){
        $('.list_row > span.delete').click(function(e){
            var self = $(this);
            showdielogue(title,megs,function(){
                $.getJSON(url+"?name="+self.attr('value'),function(data){
                    toast(data.status,data.megs);
                    $('#contents').load(loal_url,$('#list_form').serialize());
                });
            });
            e.stopPropagation();
        });
    }
};

function getRandomString(len) {
    len = len || 32;
    var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678'; // 默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1
    var maxPos = $chars.length;
    var pwd = '';
    for (i = 0; i < len; i++) {
        pwd += $chars.charAt(Math.floor(Math.random() * maxPos));
    }
    return pwd;
}

//
$('body').click(function(){
    if($('#select_img').length >0){
        $('#select_img').hide();
    }
});
/**
 * 上传或去图库选择图片
 * progress 属性配置 默认进度条元素选择 默认本身
 * preview 属性配置 预览图元素 默认本身
 * space_type 属性配置 空间属性ID 默认商品图片
 * multi  属性配置  是否多选
 * */
$('body').on('click','.select_img',function(e){
    var self = $(this);
    if($('#select_img').length ==0){
        $("body").append("<div id='select_img'><div id='upload_img' class='button'>上传图片</div><div id = 'space_img' class='button'>空间选择</div></div>");
    }
    $('#select_img').css('top',e.clientY -($('#select_img').height()/2)+$(document).scrollTop());
    $('#select_img').css('left',e.clientX -($('#select_img').width()/2));
    if(typeof(uploader) =='object'){
        uploader.destroy();
    }
    var up = getUpload();
    var progress =$(this).attr('progress');// 默认进度条
    var space_type = $(this).attr('space_type');//空间类型
    var preview = $(this).attr('preview');//预览图
    //空间选择时回调
    $(this).attr('space_img',getRandomString());
    $('#select_img').attr('space_img',$(this).attr('space_img'));

    if(typeof(space_type) =='undefined' || space_type ==""){
        space_type =null;
    }
    if(typeof(progress) =='undefined' || progress ==""){
        progress = $("<div class='progress'></div>");
        progress.appendTo($(this));
    }else{ progress =$(progress);}
    if(typeof(preview) =='undefined' || preview ==""){
        preview =$(this).children('img');
    }else{
        preview =$(preview);
    }
    preview.attr('img_link',getRandomString());
    $('#select_img').attr('img_link',preview.attr('img_link'));

    //是否多选
    if(typeof ($(this).attr('multi')) !='undefined'){
        up.multi_selection =true;
    }
    up.browse_button = "upload_img";
    up['init'].UploadProgress = function(up,file){
        progress.css("width",file.percent+"%");
    };
    up['init'].FileUploaded = function (up, file, info) {
        progress.remove();
        var domain = up.getOption('domain');
        var res = JSON.parse(info);
        $.getJSON('./server/adminImgSpaceAddSer.php',{'ais_img_url':domain + "/" + res.key,'ais_name':file.name.substr(0,file.name.lastIndexOf('.')),'ait_id':space_type},function(data){
        });
        if(!(typeof (self.attr('callback'))=='undefined' || self.attr('callback') == "")){
            self.attr('img_url',domain + "/" + res.key);
            self.trigger(self.attr('callback'));
        }else{
            preview.attr("img_url",domain + "/" + res.key);
            var w = preview.parent().width();
            var h = preview.parent().height();
            preview.attr("src", domain + "/" + res.key + "?imageView2/5/w/"+w+"/h/"+h);
        }
    };
    uploader = Qiniu.uploader(up);
    $('#select_img').show();
    e.stopPropagation();
});

//图库选择图片
$('body').on('click','#space_img',function(e){
    var img_link = $(this).parent().attr('img_link');
    var space_img = $(this).parent().attr('space_img');
    if($("#img_space_div").length ==0){
        $('body').append("<div id='img_space_div'></div>");
        $("#img_space_div").load('./inc/adminImgSpace.php?select=true&img_link='+img_link+'&space_img='+space_img);
    }else{
        $("#img_space_div input[name='img_link']").val(img_link);
        $("#img_space_div input[name='space_img']").val(space_img);
        $("#img_space_div").show();
    }
});

//图片预览
$('body').on('mouseenter','.preview_img',function(e){
    $(this).attr('leave','false');
    var self = $(this);
    setTimeout(function(){
        if(self.attr('leave') =='false'){
            var ss = typeof (self.attr('preview')) !='undefined'? $(self.attr('preview')):self; //图片来源默认本身

            if($('#preview_img').length ==0){
                $("body").append("<div id='preview_img'><img /></div>");
            }
            var src = typeof (ss.attr('src')) !='undefined'? ss.attr('src'):"";
            src = src.indexOf('?')!= -1 ?src.substr(0,src.lastIndexOf('?')): src;
            var off = self.offset();
            $('#preview_img').css('left',off.left+self.width());
            $('#preview_img').css('top',off.top);
            var width = typeof (self.attr('preview_width')) !='undefined'?self.attr('preview_width'):$('#preview_img').width(); //图片来源默认本身
            var height = typeof (self.attr('preview_height')) !='undefined'?self.attr('preview_height'):$('#preview_img').height(); //图片来源默认本身
            $('#preview_img >img').attr('src',src+"?imageMogr2/thumbnail/"+parseInt(width)+"x"+parseInt(height));

            $('#preview_img').show();
        }
    },1000);
});
$('body').on('mouseleave','.preview_img',function(e){
    $(this).attr('leave','true');
    $('#preview_img').hide();
});


$('body').on('click','.left_menu',function(){
    if($('#con').attr('href') ==""){
        history.pushState({foo:'bar'},"",$(this).attr('href'));
    }
    $('#loading_back').show(100);
    $("#contents").load($(this).attr('href'),function(){
        $('#loading_back').hide();
    });
});
$(window).resize(function(){
    $('#load_back').width($(document).width());
    $('#load_back').height($(document).height());

});
