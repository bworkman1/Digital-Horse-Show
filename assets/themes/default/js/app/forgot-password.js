$(document).ready(function() {

    $('#forgot-password-form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        live: 'disabled',
        fields: {
            identity: {
                validators: {
                    notEmpty: {
                        message: 'The username/email is required'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username/email must be more than 6 and less than 30 characters long'
                    },
                }
            },
        }
    });

});