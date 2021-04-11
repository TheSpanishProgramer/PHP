$(function () {
    $.getJSON('/api/levels', function (data) {
        showLevelsChart(data);
    });
});

function showLevelsChart(data) {
    Highcharts.chart('myChart3', {
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Matrículas según el nivel de dificultad'
        },
        subtitle: {
            text: 'Alumnos matriculados en cada nivel'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: data.names
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'Alumnos matriculados',
            data: data.counts
        }]
    });
}
