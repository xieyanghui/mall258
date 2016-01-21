<style type="text/css">
    #top {
        z-index: 900;
        width: 100%;
        height: 30px;
        background-color: #50D1DE;
        text-align: center;
        position: fixed;
        top: 0;
    }

    #top > div {
        width: 1000px;
        margin: 0 auto;
    }

    #top > div > ul:first-child {
        display: block;
        float: left;
    }

    #top > div > ul > li {
        display: block;
        float: left;
        line-height: 30px;
        margin: 0 3px;
    }

    #top > div > ul:last-child {
        display: block;
        float: right;
    }

    .userUtil > ul {
        display: none;
        position: absolute;
        text-align: left;
    }

    #search {
        position: relative;
        height: 150px;
        width: 1000px;
        margin: 0 auto;
    }

    #navig {
        position: relative;
        height: 40px;
        width: 1000px;
        margin: 0 auto;
    }

    #shopshow {
        position: relative;
        height: 400px;
        width: 1000px;
        margin: 0 auto;
    }

    #sshow {
        float: left;
        height: 100%;
        position: relative;
        width: 700px;
        overflow: hidden;
    }

    #ssmegs {
        float: right;
        height: 100%;
        position: relative;
        width: 300px;
    }
</style>
<div id="top">
    <div><?php include_once($_SERVER['DOCUMENT_ROOT'] . '/inc/topreglogin.php'); ?></div>
</div>
<div id='search'>1</div>
<div id='navig'>2</div>
<div id='shopshow'>
    <div id='sshow'></div>
    <div id='ssmegs'></div>

</div>

<script type="text/javascript">
    $(function () {
        $("div#top").after("<div style='height:30px'></div>");
        $(".reglogin").click(function () {
            $slf = $(this);
            if ($('#' + $(this).attr('id') + 'win').length < 1) {
                $.get($url + '/inc/reglogin.php', function (data) {
                    $("body").append(data);
                    $('#' + $slf.attr('id') + 'win').slideDown(500);
                });
            }
            $('#' + $(this).attr('id') + 'win').slideDown(500);
        });
        $(".userUtil").mouseover(function () {
            $(this).children('ul').slideDown(200);
        });
        $(".userUtil").mouseleave(function () {
            $(this).children('ul').slideUp(200);
        });
    });
</script>