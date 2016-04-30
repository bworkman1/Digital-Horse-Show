$(document).ready(function() {


    $('#login-form').formValidation({
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
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    }
                },
                stringLength: {
                    min: 6,
                    max: 30,
                    message: 'Password must be more than 6 and less than 30 characters long'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_\.]+$/,
                    message: 'Password can only consist of alphabetical, number, dot and underscore'
                }
            },
        }
    });



});