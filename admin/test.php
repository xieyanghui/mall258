<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!--    <link rel="stylesheet" type="text/css" href="/css/main.css"/>-->
    <link rel="stylesheet" type="text/css" href="/js/wangEdit/css/wangEditor.min.css">
    <title>后台管理</title>
    <style>
        #test {
            width: 60%;
            margin: 0 auto;
            position: relative;
        }
    </style>
</head>
<body >
<div id="test" >
    <div id = "tt" style="height:500px;">1</div>
</div>
<div id="aaaa">sdfdf</div>
</body>

<script src="\js\wangEdit\js\lib\jquery-1.10.2.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    $('#aaaa').click(function(){
        $('#test').load('/admin/inc/header.inc.php');
    });
</script>
</html>

