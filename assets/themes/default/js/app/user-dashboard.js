$(function() {
    var ctx = document.getElementById("linechart-canvas").getContext("2d");

    var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My Second dataset",
                fillColor: "rgba(213,189,228,0.2)",
                strokeColor: "rgba(213,189,228,1)",
                pointColor: "rgba(156, 39, 176,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(156, 39, 176,1)",
                data: [80, 95, 75, 120, 140, 125, 105]
            }
        ]
    };

    var myLineChart = new Chart(ctx).Line(data);

});