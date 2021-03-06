
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
 * 消息对话框
 * title string  标题
 * mage  string  详细
 * fun   function  按确定之后执行的方法
 * */
function dialogue(fun,title  ,mage  ){
    if ($('#dialogue').length < 1) {
        $('body').append("<div id = 'dialogue'><h6 class='dia_title'></h6><div class='dia_megs'></div><div class ='dia_no button'>取消</div><div class ='dia_ok button'>确定</div></div>");
        $('#dialogue > .dia_no').click(function(){
            $("#dialogue").hide();
        });
        $('#dialogue > .dia_ok').click(function(){
            $("#dialogue").hide();
            $(this).trigger('trig');
        });
    }
    $("#dialogue >h6").html(title ||"确定要删除吗");
    $("#dialogue >div:first").html(mage || "删除后后果自负");
    $('#dialogue').css("left", ($(window).width() / 2 - 200) + "px");
    $("#dialogue").show();
    $('#dialogue >div.dia_ok').unbind('trig').bind('trig',fun);
}


/*加载画面*/
var loading = {
    start:function(){
        $('#loading_back').show(100);
    },
    end:function(){
        $('#loading_back').hide();
    }
};

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
        domain: '//7xsiy4.com1.z0.glb.clouddn.com',
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
    var load =function(win){
        win.parent().load(page_url,win.find('.list_form').serialize());
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

    //排序
    $("li.list_row_head > span").click(function () {
        var par = $(this).parents('.win');
        var name = $(this).attr('value') || $(this).attr('name');
        var sortLine = par.find('.list_form').children("input[name='sortLine']");
        var sort = par.find('.list_form').children("input[name='sort']");
        if(sortLine.val() == name){
            if(sort.val() == "DESC"){
                sort.val("ASC");
            }else{
                sort.val("DESC");
            }
        }else{
            sortLine.val(name);
            sort.val("DESC");
        }
        load($(this).parents('.win'));
    });

    //列表搜索
    $(".list_search").click(function () {
        var par = $(this).parents('.win');
        if(par.find('.search_value').val() !=""){
            par.find('.list_form').children("input[name='page']").val('0');
            par.find('.list_form').children("input[name='searchLine']").val(par.find(".search_select").val());
            par.find('.list_form').children("input[name='search']").val(par.find('.search_value').val());
            load(par);
        }
    });
    $("div.search_delete").click(function () {
        var par = $(this).parents('.win');
        par.find('.list_form').children("input[name='search']").val("");
        load(par);
    });
    //列表每页多少汗设置
    $("span.list_row_sum").click(function () {
        var par = $(this).parents('.win');
        par.find('.list_form').children("input[name='page']").val("0");
        par.find('.list_form').children("input[name='pageRow']").val($(this).html());
        load(par);
    });
    //列表选页
    $("div.pageNumber").click(function () {

        var par = $(this).parents('.win');
        par.find('.list_form').children("input[name='page']").val(parseInt($(this).html()) - 1);
        load(par);
    });
    //列表翻页
    $("div.pageButton").click(function () {
        var par = $(this).parents('.win');
        if($(this).hasClass('pageOff')){
            return;
        }
        if ($(this).html() == "下一页") {
            par.find('.list_form').children("input[name='page']").val($("div.pageOn").html());
        } else {
            par.find('.list_form').children("input[name='page']").val(parseInt($("div.pageOn").html()) - 2);
        }
        load(par);
    });
}



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
    if(typeof(preview) ==='undefined' || preview ==""){
        if($(this).children('img').length ===0){
            preview =$(this);
        }else{
            preview =$(this).children('img');
        }

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
        $.getJSON('../server/adminImgSpaceAddSer.php',{'ais_img_url':domain + "/" + res.key,'ais_name':file.name.substr(0,file.name.lastIndexOf('.')),'ait_id':space_type},function(data){
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
        $("#img_space_div").load('./adminImgSpace.php?select=true&img_link='+img_link+'&space_img='+space_img);
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

$('body').on('click',".ajax_menu",function(){
    var url = $(this).attr('href');
    history.pushState({foo:'bar'},"aaa",$(this).attr('href'));
    var self;
    if(url.substr(url.lastIndexOf('/')+1,4) =='menu'){
        self=  $('#con');
    }else{
        self =  $('#contents');
    }
    loading.start();
    self.load(url,function(){
        loading.end();
    });
});

$('body').on('click','.select_goods',function(){
    if($("#goods_select_div").length >0){
        $("#goods_select_div").remove();
    }
    $('body').append("<div id='goods_select_div'></div>");
    $("#goods_select_div").load('./goodsInfo.php?float='+$(this).attr('id'));
    loading.start();

});
$('body').on('click','.submit',function () {
    $(this).parents("form").submit();
});
$('body').on('click','.history_back',function(){
    history.back();
});
$(window).resize(function(){
    $('#load_back').width($(document).width());
    $('#load_back').height($(document).height());

});
window.addEventListener('popstate', function() {
    var url = document.location.toString();
    var self= null;
    if(url.substr(url.lastIndexOf('/')+1,4) =='menu'){
        self=  $('#con');
    }else{
        self =  $('#contents');
    }
    loading.start();
    self.load(url,function(){
        loading.end();
    });
});

