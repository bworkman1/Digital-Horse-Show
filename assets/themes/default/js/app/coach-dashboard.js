$(function() {
    var ctx = document.getElementById("linechart-canvas").getContext("2d");

    $.ajax({
        url: $('#graph-chart').data('graphurl'),
        dataType: 'json',
        success: function(data) {
            $('#noneFound').html('');
            if(data) {
                var myLineChart = new Chart(ctx).Line(data);
            } else {
                $('#noneFound').html('No users have submitted any videos to you yet. Once they do the chart will appear here.');
            }
        },
        error: function(xhr) {
            console.log(xhr);
            $('#noneFound').html('<i class="fa fa-exclamation-triangle></i> Error Loading Chart');
        },
        beforeSend: function() {
            $('#noneFound').html('<i class="fa fa-circle-o-notch fa-spin"></i> Loading...');
        },
        complete: function() {

        },
    });



});