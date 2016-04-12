/*
 *  
 * 
 * */
(function(factory){
    if (typeof define === 'function') {
        if (define.amd) {
            // AMD模式
            define('huiCheck', ["jquery"], factory);
        } else if (define.cmd) {
            // CMD模式
            define(function (require, exports, module) {
                return factory;
            });
        } else {
            // 全局模式
            factory(window.jQuery);
        }
    } else {
        // 全局模式
        factory(window.jQuery);
    }
})(function($){
    /**
     * 验证单个表单
     * eem  Element  需要验证的元素
     * location Element 消息显示的位置
     * name String  可选参数，表单提示显示的名字
     * mags object  可选参数，消息集合 可自定义，可直接输出，也可预定义
     * */
    var Verify = function (eem, mags, name, location) {
        this.eem = eem;
        this.name = name || "";
        this.mags = mags || {};
        this.location = location;
        this.lian = false;  //验证链条 ,true就终止验证

    };
    Verify.prototype = {
//电话号码验证
        "phone": function () {
            if (this.lian) { return this;}
            this.isRegExp(/^1[3578]\d{9}$/, "isPhone");
        },

//特殊字符除去中文验证
        "noSczw": function () {
            if (this.lian) {return this;}
            this.isRegExp(/^[0-9a-zA-Z \u4e00-\u9fa5]+$/, "noSczw");
        },
//特殊字符验证
        "noSpechars": function () {
            if (this.lian) {return this;}
            this.isRegExp(/^[\w-]+$/, "noSpechars");
        },
//货币验证
        "money":function (){
            if (this.lian) {return this;}
            this.isRegExp(/^\d{1,10}(.\d)?\d?$/, "isMoney");
        },
//邮件验证
        "email": function () {
            if (this.lian) { return this;}
            this.isRegExp(/^\w+[\.\w]*\w+@\w+(\.\w{2,4}){1,2}$/, "isEmail");
        },
//正则验证
        "regExp": function ($re, $erMag) {
            if (this.lian) { return this;}
            if ($re.test(this.eem.val())) {
                this.output($erMag, true);
            } else {
                this.output($erMag, false);
            }
        },

//对比同form下德其他
        "contrast": function ($v) {
            if (this.lian) { return this;}
            var $va = $(this.eem.parents("form").find("input[name='" + $v + "']")).val();
            if (this.eem.val() == $va) {
                this.output('success', true);
            } else {
                this.output('isContrast', false);
            }
        },

//Ajax 验证  服务器验证 返回 json数据，name名字 ，isNull是否存在
        "ajax": function ($url) {
            if (this.lian) {return this;}
            var $val = this.eem.val();
            var $name = this.eem.parents("form").attr("id") + "." + this.eem.attr("name");
            var self = this;
            $.post($url, {name: $name, value: $val}, function (data, status) {
                if (data.isNull) {
                    self.output('isAjax', false);
                } else {
                    self.output('success', true);
                }
            });

        },

//字符长度验证
        "length": function (min, /*可选*/max) {
            if (this.lian) { return this; }
            if(typeof max === 'undefined' ){
                if(this.eem.val().length <= min ){
                    this.mags['length'] = this.name + "长度至少要" + min + "位";
                }
            }


            if (this.eem.val().length >= min && this.eem.val().length <= max) {
                this.output('success', true);
            } else {
                if (!this.getProp("length")) {
                    this.mags['length'] = this.name + "长度为" + min + "到 " + max + "位";
                    if (max === Infinity) {
                        this.mags['length'] = this.name + "长度至少要" + min + "位";
                    }
                }
                this.output('length', false);
            }
            return this;
        },

//空验证 只要有验证就会验证noNull 有些的可以为空需要手动调用
        "null": function () {
            if (this.eem.val() == "") {
                this.output('success', true);
            }
        },
//不为空验证  只有没有 null 就会自动调用
        "noNull": function () {
            if (this.lian) {
                return this;
            }
            if (this.eem.val() == "") {
                this.output('noNULL', false);
            } else {
                this.output('success', true);
            }
            return this;
        },
//输出消息
        "output": function (mag, b) {
            var add,next;
            if(this.location ==null){
                add = this.eem;
                next = add.next();
            }else{
                add = this.location;
                next = add.children().first();
            }
            if (next.length > 0) {
                if (next.get(0).tagName == "SPAN" && (next.attr('class') == "checksu" ||next.attr('class') == "checker")) {
                    next.detach();
                }
            }
            if (b) {
                if(this.location ==null){
                    if (this.getIsProp(mag)) {
                        add.after("<span class='checksu'>" + this.getMag(mag) + "</span>");
                    }
                }else{
                    if (this.getIsProp(mag)) {
                        add.append("<span class='checksu'>" + this.getMag(mag) + "</span>");
                    }
                }
            } else {
                this.lian = true;
                if(this.location ==null){
                    add.after("<span class='checker'>" + this.getMag(mag) + "</span>");
                }else{
                    add.append("<span class='checker'>" + this.getMag(mag) + "</span>");
                }
            }
        },

//预定义的消息
        "magsp": {
            "success": "ok",
            "length": "长度为 到 位",
            "noNull": "不能为空！",
            "email": "格式不对， 列：xx@126.com",
            "noSpechars": "不能使用中文或特殊字符",
            "phone": "格式不对     列：13888888888",
            "ajax": "已存在",
            "contrast": "不一致",
            "noSczw": "不能使用特殊字符",
            "money":"数字格式不对 如 :147.55"
        },

//根据消息KEY 判断是否为用户自定义消息
        "getProp": function (key) {
            if(this.mags[key])return true;
            return false;
        },

//根据消息KEY获取消息
        "getMag": function (key) {
            if (this.mags[key])return this.mags[key];
            if (this.magsp[key])return this.name + this.magsp[key];
            return key;
        }
    };

    /**
     * 执行方法
     * em Element 需要验证的元素
     * verify  object 表单元素集合
     * async object 异步提交,可选参数
     * location string 默认提示显示的位置,可以为空, 默认是verify内自己设置的如果没有就是元素自己后面
     * method string 触发方法,默认blur默认可选参数，
     * */
    var run = function (el, verify) {
        if (!verify) return;
        var v = new Verify(el, verify.mags, verify.name, verify.location);
        var vc = verify["check"];
        if (vc.indexOf("null") === -1) { //如果没有设置null 就先检查noNull
            v.noNull();
        }
        for (var ii = 0; ii < vc.length; ii++) {
            if (typeof(vc[ii]) === 'object') {//执行带参数的方法
                for (var i in vc[ii]) {
                    if (!Verify.prototype.hasOwnProperty(method)) {
                        console.log(method + "方法不存在");
                        return;
                    }
                    if (om) {
                        o[method].apply(o, om);
                    } else {
                        o[method]();
                    }
                }
                continue;
            }
            vc[ii] === "isNULL" ? isnull = true : applys(v, vc[ii]);
        }
    };
    var isFunction =function( fn ) {
        return !!fn && !fn.nodeName && fn.constructor != String &&
            fn.constructor != RegExp && fn.constructor != Array &&
            /function/i.test( fn + "" );
    };

    /**
     * 验证form 人口
     * formId string 需要验证的formID
     * verify  object 表单元素集合
     * async object 异步提交,可选参数
     * location string 默认提示显示的位置,可以为空, 默认是verify内自己设置的如果没有就是元素自己后面
     * method string 触发方法,默认blur默认可选参数，
     * */
    var verifyForm = function (formId,verify,async,location ,method) {
        var form = $('#'+formId);
        if(form.length < 1 || $.nodeName(form,'form') || verify == null){console.log('id不存在或不是form');return;}
        form.submit(function () {//提交时在检查一次
            var i = 0;
            for (; i < from.find("input[name]").length; i++) {
                var eem = $(from.find("input[name]")[i]);
                run(eem, verifys[eem.attr("name")]);
            }
            if (from.find("span[class='checker']").length > 0) {
                return false;
            } else {
                //是否异步提交
                if (verifys.hasOwnProperty("async")) {
                    var suc = verifys['async']['success'] || null;
                    if(verifys['async']['beforeSend'] != null){
                        if(verifys['async']['beforeSend']() == false){
                            return false;
                        }
                    }
                    $.ajax({
                        url: from.attr('action'),
                        data: from.serialize(),
                        type: "POST",
                        global: false,
                        dataType: "json",
                        success: suc
                    });
                    return false;
                } else {
                    return true;
                }
            }
        });
        //遍历form表单
        for(var es in  verify){
            var el = form.find("input[name='"+es+"']");
            if(el.length < 1){console.log(es+'该元素不存在于表单里'); continue;}
            //确定信息要显示的位置
            var location = verify[es]['location'] || location ;
            if(isFunction(location)){
                location = location.apply(el);
            }else if($(location).length > 1 ){
                location =  $(location);
            }else{
                location = el.next();
            }
            verify[es]['location'] = location;
            //触发回调事件
            var method = verify[es]['method'] || method || "blur";
            el[method](function(){   //事件执行
                run(el, verify[es]);
            });
        }
    };
    window.VerifyForm = verifyForm;
});