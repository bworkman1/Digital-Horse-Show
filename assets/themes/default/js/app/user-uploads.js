$(function() {
    var baseUrl = 'http://localhost/horse/';

    $('#coach-help').click(function(event) {
        event.preventDefault();
    });

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

    $('#upload-form').submit(function(event) {
        event.preventDefault();
            var location = $('input[name="location"]').val();
            var lng = $('input[name="lng"]').val();
            var lat = $('input[name="lat"]').val();
            var name = $('input[name="name"]').val();

            var comp_name = $('input[name="comp_name"]').val();
            var comp_class = $('input[name="comp_class"]').val();
            var date = $('input[name="date"]').val();
            var horse_name = $('input[name="horse_name"]').val();
            var coach = $('select[name="coach"]').val();
            var card_id = $('select[name="card_id"]').val();

            var file = _("file").files[0];

            var formdata = new FormData();
            formdata.append("file", file);
            formdata.append("location", location);
            formdata.append("lng", lng);
            formdata.append("lat", lat);
            formdata.append("name", name);

            formdata.append("comp_name", comp_name);
            formdata.append("coach", coach);
            formdata.append("comp_class", comp_class);
            formdata.append("date", date);
            formdata.append("horse_name", horse_name);
            formdata.append("card_id", card_id);

            $.ajax({
                url: baseUrl+'user/upload-video/upload/',
                type: 'POST',
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
                    console.log(data);
                    if(typeof data.success != 'undefined') {
                        window.location.href = baseUrl + "user/my-uploads";
                    } else {
                        console.log('show error');
                        $(".progress-bar").width("0%");
                        $('#feedback').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> '+data.error+'</div>');
                    }
                },
                error: function() {
                    console.log('error');
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
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
            }, 'json');
    });

    function _(el){
        return document.getElementById(el);
    }

});

