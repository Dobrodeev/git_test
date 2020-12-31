$(document).ready(function () {
    $('#btn1').click(function () {
        $.ajax({
            url: 'page1.html',
            cache: false,
            success: function (html) {
                $('#content').html(html);
            }
        });
    });

    $('#btn2').click(function () {
        $.ajax({
            url: 'page2.html',
            cache: false,
            success: function (html) {
                $('#content').html(html);
            }
        });
    });
});
