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

    $('#submit').click(function (e) {
        e.preventDefault();
        $('file').prop('readonly', true);
        $(window).on("beforeunload", function() {
            return "The video has not finished uploading yet!";
        });
    });

    $('#file').change(function() {
        chooseFile = document.getElementById('file');
        var self =
            blob = chooseFile.files[0],
            BYTES_PER_CHUNK, SIZE, NUM_CHUNKS, start, end;

            BYTES_PER_CHUNK = 1000000;
            SIZE = blob.size;
            NUM_CHUNKS = Math.max(Math.ceil(SIZE / BYTES_PER_CHUNK), 1);
            $('#chunks').val(NUM_CHUNKS);
    });

    var chunky = 0;
    $('#file').fileupload({
        dataType: 'json',
        maxChunkSize: 1000000,
        replaceFileInput: false,
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('.progress-bar').css(
                'width',
                progress + '%'
            ).html(progress + '%');
            $('#chunk').val(chunky);
            chunky++;
        },
        beforeSend : function(xhr, opts){
            $('.ajs-message').remove();
            if(!validateForm()) {
                xhr.abort();
                $('.progress').addClass('hide');
                $('button[type="submit"]').prop('disabled', false);
                $('#feedback').html('');
            }
        },
        add: function (e, data) {
            $('#submit').click(function () {
                e.preventDefault();
                $('.progress').removeClass('hide');
                $('button[type="submit"]').prop('disabled', true);
                $('#feedback').html('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Upload may take a while to finish, please don\'t leave this page until the upload has completed.</div>');
                data.submit();
            });
        },
        done: function (e, data) {
            $('#feedback').html('');
            $('button[type="submit"]').prop('disabled', false);
            $('.progress-bar').css(
                'width',
                '0%'
            ).html('0%');
            $('.progress').addClass('hide');
            $('#file').prop('readonly', false);
            saveFileUploadData(data);
        },
    });

    function validateForm() {
        var name = $('input[name="name"]').val();
        var coach = $('select[name="coach"]').val();
        var card_id = $('select[name="card_id"]').val();
        var file = $('input[name="file"]').val();
        if(!name) {
            alertify.error('Video name is required');
            return false;
        }
        if(!file) {
            alertify.error('Please select a video before uploading');
            return false;
        }
        if(!coach) {
            alertify.error('Please select a coach');
            return false;
        }
        if(!card_id) {
            alertify.error('Scoring Level and Type is required');
            return false;
        }

        var ext = getExtension(file);
        switch (ext.toLowerCase()) {
            case 'm4v':
            case 'avi':
            case 'mpg':
            case 'mp4':
                break;
            default:
                alertify.error('Video file must be a .m4v, .avi, mpg, mp4 format');
                return false;
                break;
        }

        return true;
    }

    function getExtension(filename) {
        var parts = filename.split('.');
        return parts[parts.length - 1];
    }

    function saveFileUploadData(uploadData) {
        var url = $('#upload-form').data('save');
        var formData = '';
        console.log(url);
        console.log(uploadData);
        $.ajax({
            url: url,
            type: 'POST',
            data: uploadData.result.data,
            dataType: 'json',
            success: function (data) {
                if(typeof data.success != 'undefined') {
                    $(window).unbind('beforeunload');
                    alertify.success('Video Uploaded Successfully');
                    window.location = $('#upload-form').data('redirect');
                } else {
                    alertify.error('Video failed to save, try again and if the problem persist contact us.', '', '0');
                }
            },
            error: function (xhr) {
                alertify.error('There was an error saving the data, please try again', '', 0);
            }
        });
    }

});

