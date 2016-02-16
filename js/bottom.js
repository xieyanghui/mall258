$(function () {
    $("#change").click(function () {
        $.get($url + "/server/ChangeSer.php", function (data) {
            location.reload(true);
        });
    });
});
