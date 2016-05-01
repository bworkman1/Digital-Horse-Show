$(function() {
    var ctx = document.getElementById("linechart-canvas").getContext("2d");

    $.ajax({
        url: $('#graph-chart').data('graphurl'),
        dataType: 'json',
        success: function(data) {
            if(data) {
                var myLineChart = new Chart(ctx).Line(data);
            } else {
                $('#noneFound').html('You have no scores yet, once you start submitting videos to judges you will see a chart of your scores here.');
            }
        },
        error: function(xhr) {
            console.log(xhr);
        },
        beforeSend: function() {

        },
        complete: function() {

        },
    });



});