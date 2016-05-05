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
     * 验证单个input
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
    };
    Verify.prototype = {
//电话号码验证
        phone: function () {
            return this.regExp(/^1[3578]\d{9}$/, 'phone');
        },

//特殊字符除去中文验证
        noSczw: function () {
            return this.regExp(/^[0-9a-zA-Z \u4e00-\u9fa5]+$/, "noSczw");
        },
//特殊字符验证
        noSpechars: function () {
            return this.regExp(/^[\w-]+$/, "noSpechars");
        },
//货币验证
        money:function (){
            return this.regExp(/^\d{1,10}(.\d)?\d?$/, "money");
        },
//邮件验证
        email: function () {
            return this.regExp(/^\w+[\.\w]*\w+@\w+(\.\w{2,4}){1,2}$/, "email");
        },
//正则验证
        regExp: function (re, meg) {
            if (re.test(this.eem.val())) {
                return this.output(true);
            } else {
               return this.output(false,meg);
            }
        },

//对比同form下德其他
        contrast: function (v) {
            var va = $(this.eem.parents("form").find("input[name='" + v + "']")).val();
            if (this.eem.val() === va) {
                return this.output(true);
            } else {
                return this.output(false,'contrast');
            }
        },

//Ajax 验证  服务器验证 返回 json数据，name名字 ，isNull是否存在
        ajax: function (url) {
            var val = this.eem.val();
            var name = this.eem.parents("form").attr("id") + "." + this.eem.attr("name");
            var self = this;
            $.post(url, {name: name, value: val}, function (data, status) {
                if (data.isNull) {
                    self.output(false,'ajax');
                } else {
                    self.output(true);
                }
            });
            return true;
        },
//字符长度验证
        length: function (min, /*可选*/max) {
            if(typeof max === 'undefined'){
                if(this.eem.val().length <min ){//最少长度判断
                    //this.megs['length'] = this.megs['length'] || this.name + "长度至少要" + min + "位";
                    return this.output(false, this.megs['length'] || this.name + "长度至少要" + min + "位");
                }
            }else if(min === max && this.eem.val().length !== min){ //固定长度判断
                return this.output(false,this.megs['length'] || this.name + "长度为" + min +"位");
            }else if (this.eem.val().length <min || this.eem.val().length >max){//范围长度判断
                return this.output(false,this.megs['length'] || this.name + "长度为" + min + "到 " + max + "位");
            }else{
                return this.output(true);
            }
        },
//空验证 只要有验证就会验证noNull 有些的可以为空需要手动调用
        null: function () {
            if (this.eem.val() === "") {
                return  !this.output(true);
            }
            return true;
        },
//不为空验证  只有没有 null 就会自动调用
        noNull: function () {
            if (this.eem.val() == "") {
                return this.output(false,'noNull');
            } else {
                return this.output(true);
            }
        },
//输出消息
        output: function (b,meg) {
            this.location.children("span[name='"+this.eem.attr('name')+"']").remove();
            var megv  = $("<span name='"+this.eem.attr('name')+"'>" + this.getMeg( meg|| 'success') + "</span>");
            var form = this.eem.parents('form');
            if (b) { //验证成功
                form.attr('ver_err',form.attr('ver_err').replace(this.eem.attr('name'),''));
                this.location.append(megv.addClass('verify_su'));
                return true;
            } else { //验证失败
                if(form.attr('ver_err').indexOf(this.eem.attr('name')) ===-1){
                    form.attr('ver_err',form.attr('ver_err')+' '+this.eem.attr('name'));
                }
                this.location.append(megv.addClass('verify_er'));
                return false;
            }
        },

//预定义的消息
        megsp: {
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

//根据消息KEY获取消息
        getMeg: function (key) {
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
        el[verify['method']](function(){
            if(!el.is(':visible')){console.log(el.attr('name')+'没有显示所以不验证'); return;} //如果元素没有显示,就不验证了
            var vc = verify["check"];
            if (vc.indexOf("null") == -1) { //如果没有设置null 就先检查noNull
                vc.unshift('noNull');
            }else{
                vc.splice(vc.indexOf("null"),1);
                vc.unshift('null');
            }
            for(var elv in vc){
                if (typeof(vc[elv]) === 'object') {//执行带参数的方法
                    var b =false;
                    for(var elvs in vc[elv]){
                        if (!Verify.prototype.hasOwnProperty(elvs)) {
                            console.log(elvs + "方法不存在");
                            continue;
                        }else{
                            if(!ver[elvs].apply(ver,vc[elv][elvs])){
                                b=true;
                                break;
                            }
                        }
                    }
                    if(b)break;
                }else{
                    //不带参数的执行
                    if(!ver[vc[elv]]()){
                        break;
                    }
                }
            }
        });


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
            form.attr('ver_err','');
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
                verify[es]['method'] = verify[es]['method'] || method || "blur";
                //el[method](function(){   //事件执行
                    run(el, verify[es]);
               // });
            }
            //提交时验证
            form.submit(function () {
                //遍历form表单
                for (var es in  verify) {
                    var el = form.find("input[name='"+es+"']");
                    if (el.length < 1) {
                        console.log(es + '该元素不存在于表单里');
                        continue;
                    }
                    el.trigger(verify[es]['method']);
                }
                //如果有错误就不提交
                if (typeof form.attr('ver_err') !== 'undefined' && form.attr('ver_err').trim() !== "") {
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
                        url: form.attr('action'),
                        data: form.serialize(),
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