$(function () {
    $.getJSON('/api/students', function (data) {
        showStudentsChart(data);
    });
});

function showStudentsChart(data) {
    Highcharts.chart('myChart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Estudiantes en la academia según su género'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: '% de estudiantes hombres y mujeres',
            colorByPoint: true,
            data: [{
                name: 'Mujeres',
                y: data.female
            }, {
                name: 'Hombres',
                y: data.male,
                sliced: true,
                selected: true
            }]
        }]
    });
}
