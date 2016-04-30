$(function() {
    $('#submit').click(function(event) {
        event.preventDefault();
        var data = $('#support-form').serialize();
        var elem = $(this);
        var url = $('#support-form').attr('action');

        $.ajax(url, {
            data: data,
            dataType: 'json',
            type: 'post',
            success: function(data) {
                if(typeof data.error == 'undefined') {
                    alertify.success('Thanks for letting us know about this, we will contact you if we need additional info', '', 0);
                    document.getElementById("support-form").reset();
                    $('#error').modal('hide');
                } else {
                    alertify.error(data.error);
                }
            },
            error: function(a, b, xhr) {
                console.log(a);
                console.log(b);
                console.log(xhr);
                alertify.error('Failed to send to support, try again!');
            },
            beforeSend: function() {
                $(elem).html('<i class="fa fa-gear fa-spin fa-fw"></i> Sending').attr('disabled', true);
            },
            complete: function() {
                $(elem).html('<i class="fa fa-paper-plane"></i> Send').attr('disabled', false);
            }
        });
    });


});