/*
 *  
 * 
 * */

(function ($) {
    $.extend({
        checks: function () {
            /**
             * 验证集合
             * eem   需要验证的元素
             * mags  可选参数，消息集合 可自定义，可直接输出，也可预定义
             * name  可选参数，表单提示显示的名字
             * location 可选参数，消息显示的位置
             * */
            var Verify = function (eem, mags, name, location) {
                this.eem = eem;
                this.name = name || "";
                this.mags = mags || {};
                this.location = location ? $("#" + location) : null;
                this.lian = false;
            };
            Verify.prototype = {


//电话号码验证
                "isPhone": function ($b) {
                    if (this.lian) {
                        return this;
                    }
                    this.isRegExp(/^1[3578]\d{9}$/, "isPhone");
                },
//特殊字符除去中文验证
                "noSczw": function () {
                    if (this.lian) {
                        return this;
                    }
                    this.isRegExp(/^[0-9a-zA-Z \u4e00-\u9fa5]+$/, "noSczw");
                },

//特殊字符验证
                "noSpechars": function () {
                    if (this.lian) {
                        return this;
                    }
                    this.isRegExp(/^[\w-]+$/, "noSpechars");
                },
                "isMoney":function (){
                    if (this.lian) {
                        return this;
                    }
                    this.isRegExp(/^\d{1,10}(.\d)?\d?$/, "isMoney");
                },

//邮件验证
                "isEmail": function () {
                    if (this.lian) {
                        return this;
                    }
                    this.isRegExp(/^\w+[\.\w]*\w+@\w+(\.\w{2,4}){1,2}$/, "isEmail");
                },
//正则验证
                "isRegExp": function ($re, $erMag) {
                    if (this.lian) {
                        return this;
                    }
                    if ($re.test(this.eem.val())) {
                        this.output($erMag, true);
                    } else {
                        this.output($erMag, false);
                    }
                },

//对比同form下德其他
                "isContrast": function ($v) {
                    if (this.lian) {
                        return this;
                    }
                    var $va = $(this.eem.parents("form").find("input[name='" + $v + "']")).val();
                    if (this.eem.val() == $va) {
                        this.output('success', true);
                    } else {
                        this.output('isContrast', false);
                    }
                },

//Ajax 验证  服务器验证 返回 json数据，name名字 ，isNull是否存在 
                "isAjax": function ($url) {
                    if (this.lian) {
                        return this;
                    }
                    var $val = this.eem.val();
                    var $name = this.eem.parents("form").attr("id") + "." + this.eem.attr("name");
                    var self = this;
                    $.get($url, {name: $name, value: $val}, function (data, status) {
                        if (data.isNull) {
                            self.output('isAjax', false);
                        } else {
                            self.output('success', true);
                        }
                    });

                },

//字符长度验证
                "isLength": function (min, /*可选*/max) {
                    if (this.lian) {
                        return this;
                    }
                    max = max || Number.POSITIVE_INFINITY;
                    if (this.eem.val().length >= min && this.eem.val().length <= max) {
                        this.output('success', true);
                    } else {
                        if (!this.getIsProp("isLength")) {
                            this.mags['isLength'] = this.name + "长度为" + min + "到 " + max + "位";
                            if (max === Infinity) {
                                this.mags['isLength'] = this.name + "长度至少要" + min + "位";
                            }
                        }
                        this.output('isLength', false);
                    }
                    return this;
                },

//空验证 只有没有 noNULL 就会自动调用 
                "isNULL": function () {
                    if (this.eem.val() == "") {
                        this.output('success', true);
                    }
                },
//不为空验证
                "noNULL": function () {
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
                    "isLength": "长度为 到 位",
                    "noNULL": "不能为空！",
                    "isEmail": "格式不对， 列：xx@126.com",
                    "noSpechars": "不能使用中文或特殊字符",
                    "isPhone": "格式不对     列：13888888888",
                    "isAjax": "已存在",
                    "isContrast": "不一致",
                    "noSczw": "不能使用特殊字符",
                    "isMoney":"数字格式不对 如 :147.55"
                },

//根据消息KEY 判断是否为用户自定义消息
                "getIsProp": function (x) {
                    if (this.mags[x])return true;
                    return false;
                },

//根据消息KEY获取消息
                "getMag": function (key) {
                    if (this.mags[key])return this.mags[key];
                    if (this.magsp[key])return this.name + this.magsp[key];
                    return key;
                }
            };

//执行方法
            var run = function (eem, verify) {
                if (!verify) return;
                var ii = 0;
                var isnull = false;//是否可为空
                var applys = function (o, method, om) {  // 执行方法前
                    if (!Verify.prototype.hasOwnProperty(method)) {
                        console.log(method + "方法不存在");
                        return;
                    }
                    if (om) {
                        o[method].apply(o, om);
                    } else {
                        o[method]();
                    }
                };
                var v = new Verify(eem, verify.mags, verify.name, verify.location);
                var vc = verify["check"];
                if (vc.indexOf("noNULL") == -1) {
                    v.noNULL();
                }
                for (; ii < vc.length; ii++) {
                    if (typeof(vc[ii]) === 'object') {
                        for (var i in vc[ii]) {
                            applys(v, i, vc[ii][i]);
                        }
                        continue;
                    }
                    vc[ii] === "isNULL" ? isnull = true : applys(v, vc[ii]);
                }
                if (isnull) {
                    v.isNULL();
                }
            };

            var checkform = function (from, verifys, method) {
                method = method || "blur";
                from.submit(function () {//提交时在检查一次
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
                            var bs = verifys['async']['beforeSend'] || null;
                            $.ajax({
                                url: from.attr('action'),
                                data: from.serialize(),
                                type: "POST",
                                dataType: "json",
                                beforeSend: bs,
                                success: suc
                            });
                            return false;
                        } else {
                            return true;
                        }
                    }
                });
                from.find("input[name]")[method](function () {
                    run($(this), verifys[$(this).attr("name")]);
                });
            };
            $.checks.checkform = checkform;
            $.checks.Check = Verify;
        }
    });
    $.checks();
})(jQuery);