$(document).on('submit', '#formSend', function (e) {
    e.preventDefault();
    var command_val = $('#command').val();
    if (command_val != '') {
        if (command_val == 'clear') {
            $('.out').html('');
        } else {
            $('.out').append('<div class="req">' + command_val + '</div>');
            $.ajax({
                type: "POST",
                url: '/ajax.php',
                data: {
                    command: command_val
                },
                success: function (data) {
                    $('.out').append(data);
                }
            });
        }
        $('#command').val('');
    }
});