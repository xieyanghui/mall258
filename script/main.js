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
       // console.log(e.keyCode);
        switch (e.keyCode){
            case 13:             //提交按钮
                enter(e);
                break;
            case 27:            //关闭浮动窗口
                h_util.closeFloatDiv($('.float_div:visible').attr('id'));
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
    //浮动窗口
    $('.float_div').appendTo($('body'));



    //窗口变化初始化
    function init(e){
        $('.float_div').each(function(){
            $(this).css('left',$(window).width()/2-$(this).width()/2+'px');
            $(this).css('top',$(window).height()/2-$(this).height()/2+'px');
        });
        $('#float_back').css('width',$(window).width());
        $('#float_back').css('height',$(window).height());
        if($(window).width() > 800 && $(window).width() < 1200){
            $('.wrap').css('width',$(window).width());
        }else if($(window).width() > 1200){
            $('.wrap').css('width',1200);
        }
    }
    $(window).resize(init);
    //地址选择
    $('body').on('mouseenter','.address',function(){
        $(this).children('ul').show();
    });
    $('body').on('mouseleave','.address',function(){
        $(this).children('ul').hide();
    });
    $('body').on('click','.address li',function(){
        var self = $(this).parents('.address');
        self.children('span.address_title').html($(this).html()).attr('title',$(this).html());
        self.nextAll().remove();
        var addStr = self.hasClass('address_start')? self:self.siblings('.address_start');
        addStr.attr('address',$(this).attr('value'));
        var address_title  ='';
        var j = 0;
        var v = $(this).attr('value');
        console.log(v);
        if(/0{10}$/.test(v)){
            if(/(^11)|(^12)|(^50)|(^31)/.test(v)){
                address_title = '区/县';
                j =2;
            }else{
                address_title = '市';
                j=1;
            }
        }else if(/0{8}$/.test(v)){
            address_title = '区/县';
            j=2;
        }else if(/0{6}$/.test(v)){
            address_title = '街道/镇';
            j=3;
        }else if(/0{3}$/.test(v)){
            address_title = '居委会/村';
            j=4;
        }
        if(addStr.attr('size') > j){
            var s =$('<div class="address"><span class="address_title">'+address_title+'</span><ul></ul> </div>');
            self.after(s);
            h_util.addressSelect($(this));
        }
        self.children('ul').hide();
    });


    window.addEventListener("storage", function(e){
        console.log(e);
        for (var x in h_util.StorageEvenList){
            h_util.StorageEvenList[x](e);
        }
    });

    window.h_util = {
        StorageEvenList:[],
        // 选择地址
        addressSelect:function(form){
            var d = "?";
            if(form[0].tagName =='LI'){
                d ='?add_number='+form.attr('value')+'&';
                form = form.parents('.address').next();
            }
            var e = form.find('ul');

            $.getJSON('//aws.mall258.com/getAddress.php'+d+'callback=?',function(data){
                console.log(data);
                for (var el in data){
                    e.append("<li value='"+data[el]['add_number']+"' title='"+data[el]['add_name']+"'> "+data[el]['add_name']+"</li>");
                }
                if(data.length >20){
                    form.find('ul').css('width',parseInt(form.find('li').first().width())*5+8);
                }else if(data.length >8){
                    form.find('ul').css('width',parseInt(form.find('li').first().width())*3+4);
                }else if(data.length >3){
                    form.find('ul').css('width',parseInt(form.find('li').first().width())*2+2);
                }else{
                    form.find('ul').css('width','auto');
                }
                if(d !== '?'){
                    form.find('ul').show();
                }
            });
        },

        //淘宝 七牛图片转换
        imgLink:function(url,size){
            if(url.indexOf('img.alicdn.com') != -1){
                switch (size){
                    case 'min':
                        return url+'_60x60q90.jpg';
                    case 'centre':
                        return url+'_430x430q90.jpg';
                    case 'max':
                        return url;
                }
            }else{
                switch (size){
                    case 'min':
                        return url+'?imageView2/5/w/60/h/60';
                    case 'centre':
                        return url+'?imageView2/5/w/400/h/400';
                    case 'max':
                        return url+'?imageView2/5/w/800/h/800';
                }
            }
        },

        addStorageEven:function(fun){
            h_util.StorageEvenList.push(fun);
        },

        setStorage:function(k,v){
            localStorage.setItem(k,v);
            for (var x in h_util.StorageEvenList){
                h_util.StorageEvenList[x]();
            }
        },
        removeStorage:function(k){
            localStorage.removeItem(k);
            for (var x in h_util.StorageEvenList){
                h_util.StorageEvenList[x]();
            }
        },

        //区分
        gblen:function(str,lens,ins,lines){
            var len = 0,duan = 0,line =1;
            var newStr ='';
            for (var i=0; i<str.length; i++) {
                if((len%lens === 0 && len!==0) || (duan+1 < i && (len-1)%lens === 0 )){
                    if(lines === line){break;}
                    newStr +=str.slice(duan,i)+ins;
                    duan = i;
                    line++;

                }
                var c = str.charCodeAt(i);
                //单字节加1
                if ((c >= 0x0001 && c <= 0x007e) || (0xff60<=c && c<=0xff9f)) {
                    len++;
                }
                else {
                    len+=2;
                }

            }
            newStr+=str.slice(duan);
            return newStr;
        },

        inArray:function(str,arr){
            for(var x in arr){
                if(arr[x] === str){
                    return true;
                }
            }
            return false;
        },
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

        //Cookie读写
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
        setCookie:function(name,value,push,time,path){
            if(typeof time !=='undefined'){
                var date=new Date();
                date.setTime(date.getTime()+time);
                time = ";expires="+date.toUTCString();
            }else{
                var defDate=new Date();
                defDate.setTime(defDate.getTime()+3600*1000);
                time = ";expires="+defDate.toUTCString();
            }
            path = typeof path !=='undefined'?";path="+path:";path=/";
            if(push){
                if(this.getCookie(c_name) === ""){
                    document.cookie=c_name+ "=" +decodeURI(value)+";path=/";
                }else{
                    document.cookie = c_name+ "="+decodeURI(value)+','+decodeURI(this.getCookie(c_name));
                }
            }else{
                document.cookie=name+ "=" +decodeURI(value)+time+path;
            }
        },
        // 浮动窗口
        showFloatDiv:function(divId){
            $('#'+divId).trigger('show');
            $('#float_back').slideDown(300);
            $('#'+divId).slideDown(300);
        },
        closeFloatDiv:function(divId){
            $('#'+divId).trigger('hide');
            $('#float_back').slideUp(300);
            $('#'+divId).slideUp(300);
        }

    };
    //加载JS
    var load=function(){
        while (window.h_main.length){
            var l = window.h_main.pop();
            if(l instanceof Array){
                var ls = l.pop();
                if(typeof ls === "function"){
                    require(l,ls);
                }else{
                    console.log(ls+'必须是方法');
                }
            }else{
                l();
            }
        }
    };

    //监听ajax
    $(document).ajaxSuccess(function(){
        //浮动窗口移动
        $('.float_div').appendTo($('body'));
        //加载文件中的js
        load();
    });

    init();
    load();
});
