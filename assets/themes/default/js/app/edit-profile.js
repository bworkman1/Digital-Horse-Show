$(document).ready(function() {


    $('#edit-profile').formValidation({
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
                        max: 40,
                        message: 'First name must be more than 2 and less than 30 characters long'
                    },
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'Last name is required'
                    },
                    stringLength: {
                        min: 2,
                        max: 40,
                        message: 'Last name must be more than 2 and less than 30 characters long'
                    },
                }
            },
            profile_name: {
                validators: {
                    notEmpty: {
                        message: 'Profile name is required'
                    },
                    stringLength: {
                        min: 6,
                        max: 50,
                        message: 'Profile name must be more than 2 and less than 30 characters long'
                    },
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email is required'
                    },
                    emailAddress: {
                        message: 'Invalid email address',
                        min: 5,
                        max: 50,
                    }
                }
            },
            bio: {
                validators: {
                    stringLength: {
                        min: 2,
                        max: 1000,
                        message: 'Bio must be between 2 and 1000 characters long'
                    },
                }
            },
            facebook: {
                validators: {
                    uri: {
                        message: 'The URL is not valid'
                    }
                }
            },
            twitter: {
                validators: {
                    uri: {
                        message: 'The URL is not valid'
                    }
                }
            },
            google: {
                validators: {
                    uri: {
                        message: 'The URL is not valid'
                    }
                }
            },
            instagram: {
                validators: {
                    uri: {
                        message: 'The URL is not valid'
                    }
                }
            },
            instagram: {
                validators: {
                    uri: {
                        message: 'The URL is not valid'
                    }
                }
            },
            file: {
                validators: {
                    file: {
                        extension: 'jpg,png,jpeg,JPG,JPEG,PNG',
                        type: 'image/jpg,image/png,image/jpeg',
                        maxSize: 2 * 1024 * 1024,
                        message: 'The file must be in .jpg, png, or jpeg format and must not exceed 2MB in size'
                    }
                }
            }
        }
    });

    $('#change-password').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        live: 'disabled',
        old: {
            validators: {
                notEmpty: {
                    message: 'Previous password is required'
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
    });

});