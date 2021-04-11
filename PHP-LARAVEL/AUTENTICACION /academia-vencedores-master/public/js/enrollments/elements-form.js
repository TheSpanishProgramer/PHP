// Student data
var $name, $lastName, $id;

$(document).ready(function() {
	$name = $('#name');
    $lastName = $('#lastName');
    $id = $('#id');

    $('select').material_select();

	$('#dni').on('change', onChangeDni);
});

function onChangeDni() {
	var DNI = $(this).val();
	if (DNI.length == 8) {
		alert('Obteniendo información del alumno');
	}

	$.get('/api/student', { dni: DNI }, function (data) {
	    $name.val(data.name);
        $lastName.val(data.lastName);
        $id.val(data.id);
    });
}
