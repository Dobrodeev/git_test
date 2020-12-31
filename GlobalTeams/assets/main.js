$(document).ready(function () {
    $(document).on('click', '.some_button', function () {
        var clickId = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: '/GlobalTeams/ajax.php',
            data: {
                'clickId': clickId
            },
            success: function (data) {
                alert('Данные успешно сохранены.')
            },
            error: function (data) {
                alert('Возникла ошибка.')
            }
        });
    });

});
