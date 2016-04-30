$(document).ready(function() {


    $('#create-account-form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        live: 'disabled',
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'First name is required'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'First name must be more than 2 and less than 30 characters long'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'Last name is required'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'Last name must be more than 2 and less than 30 characters long'
                    },
                }
            },
            identity: {
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            password: {
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
            password_confirm: {
                enabled: true,
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm must be the same'
                    }
                }
            },
            terms: {
                validators: {
                    notEmpty: {
                        message: 'You must agree with the terms and conditions'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email is required'
                    },
                    emailAddress: {
                        message: 'Invalid email address'
                    }
                }
            }
        }
    });



});