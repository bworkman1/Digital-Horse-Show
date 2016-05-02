$(function() {

    $('select[name="coaching_credits"]').change(function() {
        var credits  = parseInt($(this).val());
        var cost = parseFloat($(this).data('payment'));
        var total = cost*credits;
        $('#total').html('<b>Total:</b>$'+ total.toFixed(2));
        $('.total').val(total.toFixed(2));
    });

    $('#coach-help').click(function(event) {
        event.preventDefault();
    })

    $('.coach-selected').click(function() {
        var selection = $(this).data('id');
        $('#coach').val(selection);
        $('#coach-help-modal').modal('toggle');
        $('#coach-feedback').html('<div class="alert alert-success auto-dismiss" style="padding: 4px 8px"><i class="fa fa-check"></i> Coach Selected</div>');
        $(".auto-dismiss").fadeTo(8000, 500).slideUp(500, function(){
            $(".auto-dismiss").alert('close');
        });
    });

    $('#card-number').keyup(function (event) {
        var cctlength = $(this).val().length; // get character length

        if(cctlength>19) {
            event.preventDefault();
            return false;
        }

        switch (cctlength) {
            case 4:
                var cctVal = $(this).val();
                var cctNewVal = cctVal + '-';
                $(this).val(cctNewVal);
                break;
            case 9:
                var cctVal = $(this).val();
                var cctNewVal = cctVal + '-';
                $(this).val(cctNewVal);
                break;
            case 14:
                var cctVal = $(this).val();
                var cctNewVal = cctVal + '-';
                $(this).val(cctNewVal);
                break;
            default:
                break;
        }
    });


    $('#payment-form')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },
            fields: {
                card_number: {
                    validators: {
                        creditCard: {
                            required: 'Credit Card is required',
                            message: 'The credit card number is not valid'
                        }
                    }
                },
                expiry_month: {
                    required: 'Required',
                },
                expiry_year: {
                    required: 'Required',
                },
                cvv: {
                    required: 'Required',
                },
                card_name: {
                    required: 'Name on card is required',
                },
                coaching_credits: {
                    required: 'Coaching credits is required',
                },
            },
            success: function(event) {
                event.preventDefault();
            },
        })
        .on('success.validator.fv', function(e, data) {
            if (data.field === 'card_number' && data.validator === 'creditCard') {
                var $icon = data.element.data('fv.icon');
                // data.result.type can be one of
                // AMERICAN_EXPRESS, DINERS_CLUB, DINERS_CLUB_US, DISCOVER, JCB, LASER,
                // MAESTRO, MASTERCARD, SOLO, UNIONPAY, VISA

                switch (data.result.type) {
                    case 'AMERICAN_EXPRESS':
                        $icon.removeClass().addClass('form-control-feedback fa fa-cc-amex');
                        break;

                    case 'DISCOVER':
                        $icon.removeClass().addClass('form-control-feedback fa fa-cc-discover');
                        break;

                    case 'MASTERCARD':
                    case 'DINERS_CLUB_US':
                        $icon.removeClass().addClass('form-control-feedback fa fa-cc-mastercard');
                        break;

                    case 'VISA':
                        $icon.removeClass().addClass('form-control-feedback fa fa-cc-visa');
                        break;

                    default:
                        $icon.removeClass().addClass('form-control-feedback fa fa-credit-card');
                        break;
                }
            }
        })
        .on('err.field.fv', function(e, data) {
            if (data.field === 'card_number') {
                var $icon = data.element.data('fv.icon');
                $icon.removeClass().addClass('form-control-feedback fa fa-times');
            }
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            submitPayment();
    });

   // $('#payment-form').submit(function(event) {
    function submitPayment() {
        event.preventDefault();
        var data = $('#payment-form').serialize();
        var url = $('#payment-form').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                if(typeof data.success != 'undefined') {
                    alertify.success('Your payment has been made', 0);
                    window.location.href = $('#payment-success').data('url');
                } else {
                    alertify.error(data.error);
                }
            },
            error: function(xhr) {
                console.log(xhr);
                alertify.error('There was an error processing the form, try again');
                $('button[type="submit"]').prop('disabled', false).removeClass('disabled').html('Pay Now');
            },
            beforeSend: function() {
                $('button[type="submit"]').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin"></i> Submitting Payment');
            },
            complete: function() {
                $('button[type="submit"]').prop('disabled', false).removeClass('disabled').html('Pay Now');
            },
        });
    }

});