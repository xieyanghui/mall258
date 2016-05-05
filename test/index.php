<!DOCTYPE html>
<html>
<head>
    <title><{$title|default:'星火数码'}></title>
    <meta name="keywords" content="<{$keywords|default:''}>" />
    <meta name="description" content="<{$description|default:''}>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!--    <link rel="stylesheet" type="text/css" href="<{$HTTP_HOST}>/css/main.min.css"/>-->
<!--    <link rel="stylesheet" type="text/css" href="<{$HTTP_HOST}>/css/jquery-ui.min.css"/>-->
    <script src="/script/require.min.js" data-main="/script/config.js" type="text/javascript" charset="utf-8"></script>
    <script> window.h_main =[]; window.onload = function(){
            require(['main'],function(){
               var a='140000000000';//if(/[(^11)(^12)(^50)(^31)]/.test(v))
                console.log(/(^11)|(^12)|(^50)|(^31)/.test(a));

            });
        }</script>
</head>
<body>
<!--浮动窗口背景-->
<div id="float_back"></div>
</body>
</html>