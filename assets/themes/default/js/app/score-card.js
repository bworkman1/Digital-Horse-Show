$(function() {
    var base_url = '//localhost/digitalhorseshow/';
    var height = $( '.videoSide' ).height();
    var width = $( window ).width();
    if (width > 1199) {
        var summaries = $('.videoSide');
        summaries.each(function (i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header').outerHeight(true) + 80,
                limit: function () {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    }

    $('.floatL.t5').children().attr('href', base_url+'admin/scorecards/add-scorecard');

    $('.score-box').change(function() {
        var total = 0;
        var error = false;
        var scoreError = $('.scoreError').val();
        var scoreTotal = $('#max-score').data('max');
        console.log(scoreTotal);
        $('.score-box').each(function(index) {
            var boxTotal = $(this).val();

            if (isNumber(boxTotal)) {
                $(this).removeClass('score-error');
            } else {
                if (boxTotal.length > 0) {
                    $(this).addClass('score-error');
                }
            }

            if(index%2) {
                var points = parseInt($(this).parent().prev().children().val());
                var co = parseInt($(this).val());
                var subTotal = points;
                if(co>0) {
                    subTotal = points*co;
                    total = total+subTotal;
                } else {
                    total = total+subTotal;
                }
                if(isNumber(subTotal)) {
                    $(this).parent().next().children().val(subTotal);
                }
            }
        });

        $('#totalScore').val(total);
        $('.grandTotal').val(total);

        if($('.grandTotal').val()>scoreTotal) {
            error = true;
        }

        $('#sub-total').html(total);
        if(error == true) {
            $('#scoreSubmit').attr('disabled', true);
            $('.score-feedback').html('<div class="alert alert-danger"><b><i class="fa fa-exclamation-triangle"></i> Error:</b> Score cannot be greater than '+scoreTotal+' points</div>');
        } else {
            $('#scoreSubmit').attr('disabled', false);
            $('.score-feedback').html('');
        }

        if(scoreError.length>0) {
            total = total-parseInt(scoreError);
        }


    })

    $('.scoreError').focusout(function() {
        var error = $(this).val();
        if(isNumber(error)) {
            var subTotal = parseInt($('#sub-total').html());
            $('.grandTotal').val(subTotal-parseInt(error));
            $('#totalScore').val(subTotal-parseInt(error));
            $(this).removeClass('score-error');
        } else {
            if (error.length > 0) {
                $(this).addClass('score-error');
            }
        }
    });

    $(".nums-only").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
                // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $('#scoringHelp').click(function(event) {
        event.preventDefault();
    });

    $('#scoreCard').submit(function(event) {
        event.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                if(typeof data.success != 'undefined') {
                    $('#ajax-feedback').html('<div class="alert alert-success"><b><i class="fa fa-check-circle"></i> Success: </b>Your scores have been submitted');
                    window.location.href = $('#redirect').data('redirect');
                } else {
                    $('#ajax-feedback').html('<div class="alert alert-danger"><b><i class="fa fa-exclamation-triangle"></i> Error: </b>'+data.error+'</div>');
                }
            },
            error: function() {
                $('#ajax-feedback').html('<div class="alert alert-danger"><b><i class="fa fa-exclamation-triangle"></i> Error: </b>There was an error processing the score card, try again');
            },
            beforeSend: function() {
                $('#ajax-feedback').html('');
                $('#scoreSubmit').html('<i class="fa fa-circle-o-notch fa-spin"></i> Adding Score').attr('disabled', true);
            },
            complete: function() {
                $('#scoreSubmit').html('submit').attr('disabled', false);
            },
        });
    });

    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }
});