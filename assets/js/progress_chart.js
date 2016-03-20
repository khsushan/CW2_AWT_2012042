/**
 * Created by Ushan on 3/19/2016.
 */
google.charts.load('current', {'packages': ['line']});
function drawChart() {
    console.log("draw")
    $.post("http://localhost/CW2_AWT_2012042/quiz/question/attempt", {},
        function (response) {
            if (response == 'error') {
                alert("please log in first!");
            } else {
                var jsonResponse =   JSON.parse(response)
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'attempt');
                data.addColumn('number', 'Score');
                var graph_data = [];
                $.each(jsonResponse.user_progress , function (index, value) {
                    console.log('My array has at position ' + index + ', this value: ' + value["score"]);
                    graph_data.push([index * 1, value["score"] * 1])
                })
                ;
                console.log(graph_data);
                data.addRows(graph_data)
                var options = {
                    chart: {
                        title: 'Previous attempt score chart',
                        subtitle: ''
                    },
                    width: 900,
                    height: 500
                };

                var chart = new google.charts.Line(document.getElementById('chart_div'));

                chart.draw(data, options);
            }
        }
    );

}
