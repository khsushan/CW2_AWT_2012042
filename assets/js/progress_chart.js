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
                    graph_data.push([(index+1) * 1, value["score"] * 1])
                })
                ;
                console.log(graph_data);
                data.addRows(graph_data)
                var options = {
                    hAxis: {
                        title: 'Attempt',
                        min:0
                    },
                    vAxis: {
                        title: 'Score',
                        min:0
                    },
                    width: 600,
                    height: 250
                };

                var chart = new google.charts.Line(document.getElementById('chart_div'));

                chart.draw(data, options);
            }
        }
    );

}
