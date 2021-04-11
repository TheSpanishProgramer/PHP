$app = angular.module('agenda-app', []);

$app.controller('headerCtrl', function ($scope) {
    $scope.nome = 'David';
});

$app.controller('homeCtrl', function ($scope) {
    //
});

var data = new Date,
    dia = data.getDate(),
    mes = data.getMonth() + 1,
    ano = data.getFullYear();
var data_atual = dia + '/' + mes + '/' + ano;

var calendario = $('calendario').val();
calendario = data_atual;

$('#calendario').datepicker({
    format: "dd/mm/yyyy",
    todayBtn: true,
    todayHighlight: true,
    language: 'pt-BR'
});
$('#calendario').on("changeDate", function() {
    $('#data_selecionada').val(
        $('#calendario').datepicker('getFormattedDate')
    );
    swal({
        title: 'Datas',
        text: 'Data selecionada: ' + $('#data_selecionada').val()
    });
});
