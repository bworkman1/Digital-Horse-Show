$(document).ready(function() {


    $('#change-password').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        live: 'disabled',
        fields: {
            new: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    }
                },
                stringLength: {
                    min: 8,
                    max: 30,
                    message: 'Password must be more than 6 and less than 30 characters long'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_\.]+$/,
                    message: 'Password can only consist of alphabetical, number, dot and underscore'
                }
            },
            new_confirm: {
                enabled: true,
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'new',
                        message: 'The password and its confirm must be the same'
                    }
                }
            },

        },

    });

});