$(function() {
    $('#mark-all').click(function() {
        $('input[type="checkbox"]').each(function(index) {
            $(this).prop('checked', true);
        });
        calculatePayment();
    });

    function calculatePayment() {
        var perGrade = parseFloat($('#paidPer').data('amount'));
        var total = 0;
        $('input[type="checkbox"]').each(function(index) {
            if($(this).is(':checked')) {
                total = total+perGrade;
            }
        });
        $('#totalInput').val(total);
        if(total>0) {
            $('#finalize').prop('disabled', false);
        } else {
            $('#finalize').prop('disabled', true);
        }

        $('#total').html('<b>Total:</b> $'+total.toFixed(2));
    }

    $('input[type="checkbox"]').click(function() {
        calculatePayment();
    });

    $('#finalize').click(function() {
        $('#paymentModal').modal('show');
    });

    $('button[type="submit"]').click(function(event) {
        event.preventDefault();
        var data = $('#makePayment').serialize();
        console.log(data);
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.noSubmit').click(function(event) {
        event.preventDefault();
    });

    $('button[type="submit"]').click(function(event) {
        event.preventDefault();
        var url = $('#makePayment').data('url');
        var data = $('#makePayment').serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                if(typeof data.success != 'undefined') {
                    alertify.success('Payment saved successfully');
                    window.location.href = data.success;
                } else {
                    alertify.error(data.error);
                }
            },
            error: function(xhr) {
                alertify.error('There was an error processing the request, try again');
                $('button[type="submit"]').prop('disabled', false).removeClass('disabled').html('Save Card');
            },
            beforeSend: function() {
                $('button[type="submit"]').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin"></i> Saving...');
            },
            complete: function() {
                $('button[type="submit"]').prop('disabled', false).removeClass('disabled').html('Save Card');
            },
        });
    });

});