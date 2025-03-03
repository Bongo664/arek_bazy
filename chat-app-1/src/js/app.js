$(document).ready(function() {
    function loadMessages() {
        $.post('src/php/chat.php', function(data) {
            $('#messages').html(data);
            $('#messages').scrollTop($('#messages')[0].scrollHeight);
        });
    }

    $('#send-button').click(function() {
        const message = $('#message-input').val();
        if (message.trim() !== '') {
            $.post('src/php/sendMessage.php', {
                message: message
            }, function() {
                $('#message-input').val('');
                loadMessages();
            });
        }
    });

    $('#message-input').keypress(function(e) {
        if (e.which == 13) {
            $('#send-button').click();
        }
    });

    setInterval(loadMessages, 2000);
    loadMessages();
});