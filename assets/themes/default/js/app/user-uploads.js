$(function() {
    $('#coach-help').click(function(event) {
        event.preventDefault();
    });

    $('#video-name').focus();

    $('.coach-selected').click(function() {
        var selection = $(this).data('id');
        $('select[name="coach"]').val(selection);
        $('#coach-help-modal').modal('toggle');
        alertify.success('Coach Selected');

        $('select[name="coach"]').trigger('change');
    });

    $('.level').change(function() {
        var selection = $(this).val().replace(' ', '-').toLowerCase();
        $('.scoring-type').each(function() {
            $(this).find('select').val('').trigger('change');
            if($(this).hasClass(selection)) {
                $(this).removeClass('hide').find('select').attr('name', 'card_id');
            } else {
                $(this).addClass('hide').find('select').removeAttr('name');
            }
        });
        $('.selector').select2([

        ]);
    });

    if (!("FormData" in window)) {
        // FormData is not supported; degrade gracefully/ alert the user as appropiate
        alert('Uploads are not supported in your browser, please upgrade your browser to upload videos');
    }

    $('#upload-form').submit(function(event) {
        event.preventDefault();

        var location = $('input[name="location"]').val();
        var lng = $('input[name="lng"]').val();
        var lat = $('input[name="lat"]').val();
        var name = $('input[name="name"]').val();
        var card_id = '';
        $('.scoring-type').each(function()  {
           if(!$(this).hasClass('hide')) {
               card_id = $(this).find('select').val();
           }
        });

        var coach = $('select[name="coach"]').val();
        var file = _("file").files[0];

        var formData = new FormData();
        formData.append("file", file);
        formData.append("location", location);
        formData.append("lng", lng);
        formData.append("lat", lat);
        formData.append("name", name);
        formData.append("coach", coach);
        formData.append("card_id", card_id);

        var url = $('#upload-form').prop('action');

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            dataType: 'json',
            processData:false,
            xhr: function() {
                var xhr = $.ajaxSettings.xhr();
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', function(evt) {
                        var percent = (evt.loaded / evt.total) * 100;
                        $(".progress-bar").width(percent + "%");
                    }, false);
                }
                return xhr;
            },
            success: function(data) {
                if(typeof data.success != 'undefined') {
                    window.location.href = $('#baseUrl').data('base') + "user/my-uploads";
                } else {
                    console.log('show error');
                    $(".progress-bar").width("0%");
                    $('#feedback').html('<div class="alert alert-danger"> '+data.error+'</div>');
                }
            },
            error: function(xhr, a, b) {
                console.log(xhr);
                console.log(a);
                console.log(b);
                $("#feedback").html('<div class="alert alert-danger">' +
                    '<i class="fa fa-exclamation-triangle"></i> Upload failed, try refreshing the page and trying again!</div>');
            },
            beforeSend: function() {
                $("#feedback").html('');
                $(".progress-bar").width("0%");
                $('#submit').html('<i class="fa fa-spinner fa-spin"></i> Uploading Video').attr('disabled', true);
                $('input[name="file"]').attr('disabled', true);
                $('#upload-heading').after('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Warning: Your file is uploading, please dont leave this page</div>');
                $('.progress').removeClass('hide');
            },
            complete: function() {
                //$('.progress').addClass('hide');
                $('#submit').html('Submit').attr('disabled', false);
                $('input[name="file"]').attr('disabled', false);
                $('.alert-warning').remove();

            },
        });
    });

    function _(el){
        return document.getElementById(el);
    }

});

