$(function () {
    $.getJSON('/api/courses', function (data) {

        var formatedData = [];
        for (var i=0; i<data.names.length; ++i) {
            formatedData.push([ data.names[i], data.counts[i] ]);
        }
        console.log(formatedData);
        showCoursesChart(formatedData);
    });
});

function showCoursesChart(data) {
    Highcharts.chart('myChart2', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Cursos y los % de alumnos inscritos'
        },
        subtitle: {
            text: '% de alumnos inscritos en cursos'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Delivered amount',
            data: data
        }]
    });
}
