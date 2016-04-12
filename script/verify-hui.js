/*
 *  
 * 
 * */
(function(factory){
    if (typeof define === 'function') {
        if (define.amd) {
            // AMD模式
            define('verify', ["jquery"], factory);
        } else if (define.cmd) {
            // CMD模式
            define(function (require, exports, module) {
                return factory;
            });
        } else {
            // 全局模式
            window.verify =factory(window.jQuery);
        }
    } else {
        // 全局模式
        window.verify = factory(window.jQuery);
    }
})(function(){
    /**
     * 验证单个表单
     * eem  Element  需要验证的元素
     * location Element 消息显示的位置
     * name String  可选参数，表单提示显示的名字
     * megs object  可选参数，消息集合 可自定义，可直接输出，也可预定义
     * */
    var Verify = function (eem, megs, name, location) {
        this.eem = eem;
        this.name = name || "";
        this.megs = megs || {};
        this.location = location;
        this.lian = false;  //验证链条 ,true就终止验证

    };
    Verify.prototype = {
//电话号码验证
        "phone": function () {
            if (this.lian) { return this;}
            this.regExp(/^1[3578]\d{9}$/, 'phone');
        },

//特殊字符除去中文验证
        "noSczw": function () {
            if (this.lian) {return this;}
            this.regExp(/^[0-9a-zA-Z \u4e00-\u9fa5]+$/, "noSczw");
        },
//特殊字符验证
        "noSpechars": function () {
            if (this.lian) {return this;}
            this.regExp(/^[\w-]+$/, "noSpechars");
        },
//货币验证
        "phone":function (){
            if (this.lian) {return this;}
            this.regExp(/^\d{1,10}(.\d)?\d?$/, "phone");
        },
//邮件验证
        "email": function () {
            if (this.lian) { return this;}
            this.regExp(/^\w+[\.\w]*\w+@\w+(\.\w{2,4}){1,2}$/, "email");
        },
//正则验证
        "regExp": function (re, meg) {
            if (this.lian) { return this;}
            var erMeg = "";
            var suMeg = "";
            if(typeof meg ==='string'){
                erMeg = meg;
            }else{
                suMeg = meg['suMeg'];
                erMeg = meg['erMeg'];
            }
            if ($re.test(this.eem.val())) {
                this.output(erMeg, true);
            } else {
                this.output(suMeg, false);
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
        "ajax": function (url) {
            if (this.lian) {return this;}
            var val = this.eem.val();
            var name = this.eem.parents("form").attr("id") + "." + this.eem.attr("name");
            var self = this;
            $.post(url, {name: name, value: val}, function (data, status) {
                if (data.isNull) {
                    self.output('ajax', false);
                } else {
                    self.output('success', true);
                }
            });

        },

//字符长度验证
        "length": function (min, /*可选*/max) {
            if (this.lian) { return this; }
            if(typeof max === 'undefined'){
                if(this.eem.val().length <min ){//最少长度判断
                    this.megs['length'] = this.megs['length'] || this.name + "长度至少要" + min + "位";
                    this.output('length', false);
                }
            }else if(min === max && this.eem.val().length !== min){ //固定长度判断
                this.megs['length'] =this.megs['length'] || this.name + "长度为" + min +"位";
                this.output('length', false);
            }else if (this.eem.val().length <min || this.eem.val().length >max){//范围长度判断
                this.megs['length'] =this.megs['length'] || this.name + "长度为" + min + "到 " + max + "位";
                this.output('length', false);
            }else{
                this.output('length', true);
            }
            return this;
        },

//空验证 只要有验证就会验证noNull 有些的可以为空需要手动调用
        "null": function () {
            if (this.eem.val() === "") {
                this.lian =true;
            }
            return this;
        },
//不为空验证  只有没有 null 就会自动调用
        "noNull": function () {
            if (this.lian) {return this;}
            if (this.eem.val() == "") {
                this.output('noNull', false);
            } else {
                this.output('success', true);
            }
            return this;
        },
//输出消息
        "output": function (meg, b) {
            // if(this.location ==null){
            //     add = this.eem;
            //     next = add.next();
            // }else{
            //     add = this.location;
            //     next = add.children().first();
            // }
            // if (next.length > 0) {
            //     if (next.get(0).tagName == "SPAN" && (next.attr('class') == "checksu" ||next.attr('class') == "checker")) {
            //         next.detach();
            //     }
            // }
            this.location.children("span[name='"+this.eem.attr('name')+"']").remove();
            var megv  = $("<span name='"+this.eem.attr('name')+"'>" + this.getMeg(meg) + "</span>");

            if (b) {
                this.eem.parents('form');
                this.location.append(megv.addClass('verify_su'));
            } else {
                this.lian = true;

                this.location.append(megv.addClass('verify_er'));
            }
        },

//预定义的消息
        "megsp": {
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
            if(this.megs[key])return true;
            return false;
        },

//根据消息KEY获取消息
        "getMeg": function (key) {
            if (this.megs[key])return this.megs[key];
            if (this.megsp[key])return this.name + this.megsp[key];
            if(key=== 'success') return "";
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
        var ver = new Verify(el, verify.megs, verify.name, verify.location);
        var vc = verify["check"];
        if (vc.indexOf("null") === -1) { //如果没有设置null 就先检查noNull
            ver.noNull();
        }else{
            ver.null();
        }
        for(var elv in vc){
            if (typeof(vc[elv]) === 'object') {//执行带参数的方法
                for(var elvs in vc[elv]){
                    if (!Verify.prototype.hasOwnProperty(elvs)) {
                        console.log(elvs + "方法不存在");
                        continue;
                    }else{
                        ver[elvs].apply(ver,vc[elv][elvs]);
                    }
                }
            }else{
                //不带参数的执行
                ver[vc[elv]]();
            }
        }

    };

    //判断是否是方法
    var isFunction =function( fn ) {
        return !!fn && !fn.nodeName && fn.constructor != String &&
            fn.constructor != RegExp && fn.constructor != Array &&
            /function/i.test( fn + "" );
    };
    return {
        /**
         * 验证form 人口
         * formId string 需要验证的formID
         * verify  object 表单元素集合
         * async object 异步提交,可选参数
         * location string 默认提示显示的位置,可以为空, 默认是verify内自己设置的如果没有就是元素自己后面
         * method string 触发方法,默认blur默认可选参数，
         * */
        verifyForm:function (formId,verify,async,location ,method) {
            var form = $('#'+formId);
            //
            if(form.length < 1 || $.nodeName(form,'form') || verify == null){console.log('id不存在或不是form');return;}

            //遍历form表单
            for(var es in  verify){
                var el = form.find("input[name='"+es+"']");
                if(el.length < 1){console.log(es+'该元素不存在于表单里'); continue;}
                //确定信息要显示的位置，可以是选择器，也可以是相对于元素的选择方法
                var location = verify[es]['location'] || location || null;
                if(isFunction(location)){
                    location = location.apply(el);
                }else if($(location).length > 1 ){
                    location =  $(location);
                }else{
                    location =$('<div class="verify_megs"></div>');
                    el.after(location);
                }
                verify[es]['location'] = location;

                //触发回调事件
                var method = verify[es]['method'] || method || "blur";
                el[method](function(){   //事件执行
                    run(el, verify[es]);
                });
            }
            //提交时验证
            form.submit(function () {
                //遍历form表单
                for (var es in  verify) {
                    if (el.length < 1) {
                        console.log(es + '该元素不存在于表单里');
                        continue;
                    }
                    run(el, verify[es]);

                }
                //如果有错误就不提交
                if (typeof form.attr('verErr') !== 'undefined' && form.attr('verErr').trim() !== "") {
                    return false;
                }
                //是否异步提交
                if (async) {
                    var suc = async['success'] || null;
                    //提交前执行回调
                    if (typeof async['beforeSend'] !== 'undefined' && async['beforeSend']() === false) {
                        return false;
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

            });
        }
    }
});