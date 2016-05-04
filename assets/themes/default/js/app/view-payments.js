$(function() {
    $('.showNote').click(function() {
        $('#showNote .modal-body').html($(this).data('note'));
        $('#showNote').modal('show');
    });

    $('#switchUser').change(function() {
        window.location.href = $(this).val();
    });
});