$(function() {

    $('#add-card').submit(function(event) {
        event.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        var redirect = $(this).data('redirect');

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                if(typeof data.success != 'undefined') {
                    window.location.href = redirect+'/'+data.success;
                } else {
                    alertify.error('Scorecard Failed to Save, Try Again');
                }
            },
            error: function(xhr) {
                console.log(xhr);
                alertify.error('There was an error processing the carrd, try again');
                $('button[type="submit"]').prop('disabled', false).removeClass('disabled').html('Add Card');
            },
            beforeSend: function() {
                $('button[type="submit"]').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin"></i> Adding');
            },
            complete: function() {
                $('button[type="submit"]').prop('disabled', false).removeClass('disabled').html('Add Card');
            },
        });
    });

    $('#addGroup').click(function(event) {
        event.preventDefault();
        $('#add-group').modal('show');
    });

    $('#addGroupName').click(function() {
        var groupName = $('#group-name').val();
        if(groupName) {
            var dup = false;
            $('#child_of option').each(function() {
                var option = $(this).val().toLowerCase();
                if(option == groupName.toLowerCase()) {
                    dup = true;
                }
            });
            if(dup) {
                alertify.error('<b><i class="fa fa-times-circle"></i> Error:</b> This option is already an option');
            } else {
                $('#child_of').append('<option>' + groupName + '</option>');
                $('#child_of').val(groupName).trigger('change');
                $('#add-group').modal('hide');
                alertify.success('<b><i class="fa fa-check-circle"></i> Success:</b> Group added to the list');
            }
        } else {
            alertify.error('<b><i class="fa fa-times-circle"></i> Error:</b> You must enter a name');
        }
    });

    if($('#ajax-page-load').data('alertsuccess')) {
        alertify.success($('#ajax-page-load').data('alertsuccess'));
    }

    $('#builderRow').click(function() {
        addNewRow();
    });

    $('#builderDivider').click(function() {
       addDivider();
    });

    $('#scorecard-builder').on('click', '.removeRow', function() {
        $(this).parent().parent().remove();
        reNumberRows();
    });

    var fixHelper = function(e, ui) {
        ui.children().each(function() {
            $(this).width($(this).width());
        });
        return ui;
    };

    if($('#sortable').length>0) {
        $('#sortable').sortable({
            helper: fixHelper,
            update: function () {
                var skipped = 0;
                var order = '';
                $('#sortable tr').each(function (index) {
                    var count = index + 1;
                    $(this).data('order', index);
                    if (!$(this).hasClass('highlight-columns')) {
                        $(this).find('td:first').html(count - skipped);
                    } else {
                        skipped = skipped + 1;
                    }
                    order += $(this).data('rowid') + '%';
                });
                $.ajax({
                    url: $('#sortable').data('ajax'),
                    type: 'POST',
                    data: {'ids': order},
                    dataType: 'json',
                    success: function (data) {
                        if (typeof data.success != 'undefined') {
                            alertify.success(data.success);
                        } else {
                            alertify.error(data.error);
                        }
                    },
                    error: function (xhr) {
                        alertify.error('There was an error processing the carrd, try again');
                    },
                });
            }
        }).disableSelection();
    }

    if($('.selector').length>0) {
        $(".selector").select2();
    }

    $('#builder-form').submit(function(event) {
        event.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        var redirect = $(this).data('redirect');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(typeof data.success != 'undefined') {
                    window.location.href = data.success;
                } else {
                    alertify.error('Scorecard Failed to Save, Try Again');
                }
            },
            error: function(xhr) {
                console.log(xhr);
                alertify.error('There was an error processing the carrd, try again');
                $('button[type="submit"]').prop('disabled', false).removeClass('disabled').html('Save Card');
            },
            beforeSend: function() {
                $('button[type="submit"]').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin"></i> Saving...');
            },
            complete: function() {
                $('button[type="submit"]').prop('disabled', false).removeClass('disabled').html('Save Card');
            },
        });
    });

    function reNumberRows() {
        $('#builder tr').each(function(index) {
            var count = index+1;
            $(this).find('.increment').html(count+'<input type="hidden" name="order[]" value="'+count+'">').parent().data('order', count);
        });
    }

    function addDivider() {
        var row = '<tr data-order="">';
        row += '<td class="increment text-center border-right"></td>';
        row += '<td colspan="5" class="border-right highlight">';
            row += '<input type="text" name="test[]" class="form-control" maxlength="40">';
            row += '<input type="hidden" name="directive[]">';
            row += '<input type="hidden" name="divider[]" value="y">';
            row += '<input type="hidden" name="letters[]">';
            row += '<input type="hidden" name="points[]">';
            row += '<input type="hidden" name="co_efficent[]">';
        row += '</td>';
        row += '<td class="text-center border-right"><i class="fa fa-times-circle fa-fw text-danger fa-3x removeRow" data-toggle="tooltip" data-placement="top" title="Remove Row"></i></td>';
        row += '</tr>';

        $('#scorecard-builder tbody').append(row);
        $('[data-toggle="tooltip"]').tooltip();
        reNumberRows();
    }

    function addNewRow() {
        var row = '<tr data-order="">';
        row += '<td class="increment text-center border-right"></td>';
        row += '<td class="border-right"><input type="text" name="letters[]" class="form-control" maxlength="10"><input type="hidden" name="divider[]" value="n"></td>';
        row += '<td class="border-right" width="24%"><textarea type="text" name="test[]" class="form-control" maxlength="255" required></textarea></td>';
        row += '<td class="border-right" width="24%"><textarea type="text" name="directive[]" class="form-control" maxlength="255" required></textarea></td>';
        row += '<td class="border-right"><input type="text" name="points[]" class="form-control center" value="0" maxlength="2" required></td>';
        row += '<td class="border-right"><input type="text" name="co_efficent[]" class="form-control center" value="0" maxlength="2" required></td>';
        row += '<td class="text-center border-right"><i class="fa fa-times-circle fa-fw text-danger fa-3x removeRow" data-toggle="tooltip" data-placement="top" title="Remove Row"></i></td>';
        row += '</tr>';

        $('#scorecard-builder tbody').append(row);
        $('[data-toggle="tooltip"]').tooltip();
        reNumberRows();
    }

});