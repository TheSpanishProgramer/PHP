// Student data
var $name, $lastName, $id;

$(document).ready(function() {
	$name = $('#name');
    $lastName = $('#lastName');
    $id = $('#id');

	$('#dni').on('change', onChangeDni);
});

function onChangeDni() {
	var DNI = $(this).val();
	if (DNI.length != 8)
		return;

    alert('Obteniendo información del alumno');

	$.get('/api/student', { dni: DNI }, function (data) {
	    $name.val(data.name);
        $lastName.val(data.lastName);
        $id.val(data.id);

        $.get('/api/student/courses', { id: data.id }, function (data) {
            var html = '<ul>';
            for (var i=0; i<data.length; ++i) {
                html += '<li>' +
                    '<input type="hidden" name="courses[]" value="'+ data[i].id +'" />' +
                    '<label>'+ data[i].name +'</label>' +
                    '<input type="number" name="notes[]" required min="0" max="20" />' +
                '</li>';
            }
            html += '</ul>';
            $('#checkboxes').html(html);
        });
    });
}
