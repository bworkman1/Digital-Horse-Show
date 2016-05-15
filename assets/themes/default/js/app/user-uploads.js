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
        add: function (e, data) {
            console.log('Add');
            $('#submit').click(function () {
                e.preventDefault();

                $('.progress').removeClass('hide');
                $('button[type="submit"]').prop('disabled', true);
                $('#disclamier').html('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Upload may take a while to upload, please don\'t leave this page until the upload has completed.</div>');
                data.submit();

                if(data.result) {

                }
            });
        },
        done: function (e, data) {
            $('#disclamier').html('');
            $('button[type="submit"]').prop('disabled', false);
            alertify.success('Coach Selected');
            $('.progress-bar').css(
                'width',
                '0%'
            ).html('0%');
        },
    });

    function isValidForm() {
        return true;
    }

});

