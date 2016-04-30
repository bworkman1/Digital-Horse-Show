$(function() {
    var ctx = document.getElementById("linechart-canvas").getContext("2d");
    
    $.ajax({
        url: $('#graph-chart').data('graphurl'),
        dataType: 'json',
        success: function(data) {
            var myLineChart = new Chart(ctx).Line(data);
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