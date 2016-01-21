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
function reset() {
    $(".backhead").css("width", $(window).width() + "px");
    $(".backhead").css("height", $(window).height() + "px");
    $('.showcon').css("top", "200px");
    $('.showcon').css("left", ($(window).width() / 2 - 200) + "px");
}

