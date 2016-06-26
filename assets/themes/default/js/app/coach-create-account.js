$(function() {

    $('.contract-link').click(function() {
        $(this).addClass('user-read');
    });

    $('.nextStep').click(function(event) {
        var step = $(this).data('step');
        console.log(step);
        switch(step) {
            case 2:
                var isValid = validateFirstStep();
                break;
            case 3:
                var isValid = validateSecondStep();
                break;
            case 4:
                var isValid = validateThirdStep();
                break;
            case 'submit':
                var isValid = validateForthStep();
                break;
            default:
        }
        if(isValid) {
            setActiveStep(step);
        } else {
            previousStep(step);
        }
    });

    /*
     Makes it so when you click on next step the right step in the nav-tabs is active
     */
    function setActiveStep(step) {
        $('.nav-tabs li').each(function() {
            $(this).removeClass('active');
            var loopStep = $(this).find('a').data('step');
            if(loopStep == step) {
                $(this).addClass('active');
            }
        });
    }

    function previousStep(step) {
        $('.tab-pane').removeClass('active');
        switch(step) {
            case 2:
                $('#first').addClass('active');
                break;
            case 3:
                $('#second').addClass('active');
                break;
            case 4:
                $('#third').addClass('active');
                break;
            default:
        }
    }

    function validateFirstStep() {
        var isError = false;
        $('#first input').each(function() {
           if($(this).val() == '') {
               $(this).parent().addClass('has-error');
               isError = true;
           } else {
               $(this).parent().removeClass('has-error');
           }
        });
        return isError;
    }

    function validateSecondStep() {
        return true;
    }

    function validateThirdStep() {
        return true;
    }

    function validateForthStep() {
        return true;
    }

    $('#submit').click(function(event) {
        event.preventDefault();
        var data = $('form').serialize();
        $('#submit').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Creating Account');
        $('.has-error').removeClass('has-error');
        $.ajax({
            url: $('form').prop('action'),
            dataType: 'json',
            data: data,
            type: 'post',
            success: function(data) {
                if(data.success == false) {
                    var errors = data.errors;
                    var errorStr = '';
                    for(var i=0;i<errors.length;i++) {
                        if($('[name="'+data.errors[i]['field']+'"]').parent().hasClass('form-group')) {
                            $('[name="'+data.errors[i]['field']+'"]').parent().addClass('has-error');
                        } else {
                            $('[name="'+data.errors[i]['field']+'"]').parent().parent().addClass('has-error');
                        }
                        errorStr = '<span class="text-danger"><i class="fa fa-exclamation-triangle"></i> </span>'+data.errors[i]['error']+'<br>'+errorStr;
                    }
                    alertify.alert(errorStr);
                    $('.ajs-header').html('Error Creating Account!');
                }
                if(data.success == true) {
                    var redirect = $('form').data('redirect');
                    console.log(redirect);
                    window.location.href = redirect;
                }
            },
            error: function(xhr) {

            },
            beforeSend: function() {

            },
            complete: function() {
                $('#submit').prop('disabled', false).html('Submit');
            },
        });
    });
});