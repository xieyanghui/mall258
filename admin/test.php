<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="UTF-8" src="<{$HTTP_HOST}>/js/inCheck.js"></script>
    <link rel="stylesheet" type="text/css" href="<{$HTTP_HOST}>/css/mian.css"/>
    <title>后台管理</title>
</head>
<body >
<div id="test">
    <div>1</div>
    <div>2</div>
    <div>3</div>
</div>
</body>
<script>
    $(function () {
        alert($('#test').children().first().html('aaa'));

    });
</script>
</html>