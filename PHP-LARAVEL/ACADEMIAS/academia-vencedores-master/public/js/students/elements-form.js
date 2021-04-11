var $alertTimer, $inputTimer;
var hours, minutes, seconds, milliseconds;

$(document).ready(function() {
    // select sex
    $('select').material_select();

    // initialize data tables
    $('#students-table').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });

    // timer
    $alertTimer = $('#alert-timer');
    $inputTimer = $('#input-timer');
    startTimer();
});

function startTimer() {
    var currentValue = $alertTimer.text();

    // read and parse the initial value
    var parts = currentValue.split('.');
    // 000
    milliseconds = parseInt(parts[1]);
    // hh:mm:ss
    parts = parts[0].split(':');
    hours = parseInt(parts[0]);
    minutes = parseInt(parts[1]);
    seconds = parseInt(parts[2]);

    // start timer interval
    setInterval(tickFunction, 10);
    // if the value is less than 10, the value 10 is used
}

function tickFunction() {
    milliseconds += 10;
    if (milliseconds==1000) {
        milliseconds = 0;

        ++seconds;
        if (seconds==60) {
            seconds = 0;

            ++minutes;
            if (minutes==60) {
                minutes = 0;

                ++hours;
            }
        }
    }

    updateInputTimer();
}

function updateInputTimer() {
    var formatTimer = twoDigits(hours) + ':' + twoDigits(minutes) + ':' + twoDigits(seconds) + '.' + milliseconds;
    $alertTimer.text(formatTimer);
    $inputTimer.val(formatTimer);
}

function twoDigits(value) {
    if (value<=9) return '0' + value;
    return value;
}

//select date
$('.datepicker').pickadate({
	selectMonths: true, // Creates a dropdown to control month
	selectYears: 90, // Creates a dropdown of 15 years to control year
	format: 'yyyy-mm-dd'
});


//show modal
$(function () {
	$('[data-add]').on('click', addModal);
	$('[data-edit]').on('click', editModal);
	$('[data-delete]').on('click', confirmation);
});

function addModal(){
$('#modal_student').modal({
		startingTop: '0%', // Starting top style attribute
		endingTop: '2%' // Ending top style attribute
	});
}


function editModal(){

	var id = $(this).data('edit');
	var name = $(this).data('name');
	var lastName = $(this).data('lastname');
	var dni = $(this).data('dni');
	var address = $(this).data('address');
	var birthdate = $(this).data('birthdate');
	var sex = $(this).data('sex');
	var email = $(this).data('email');
	var phone = $(this).data('phone');
	var attorney = $(this).data('attorney');
	var photo = $(this).data('photo');


	$('#id').val(id);
	$('#name').val(name);
	$('#lastName').val(lastName);
	$('#dni').val(dni);
	$('#address').val(address);
	$('#birthdate').val(birthdate);
	Materialize.updateTextFields();//elevar label para mostrar fecha
	$('#sex').val(sex);
	$('#sex').material_select();
	$('#email').val(email);
	$('#phone').val(phone);
	$('#attorney').val(attorney);
	$("#blah").attr("src","/images/students/"+id+"."+photo);

	$('#modal_edit').modal({
			startingTop: '0%', // Starting top style attribute
			endingTop: '2%' // Ending top style attribute
		});
}


// Preview image registro
function read(input) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blaho').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$("#imgInpo").change(function(){
	read(this);
});

// Preview image edit
function readURL(input) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blah').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$("#imgInp").change(function(){
	readURL(this);
});

//modal confirmar eliminacion
function confirmation(){
	//id
	var student_id = $(this).attr('data-delete');

	$('#delete').attr("href", "/alumno/"+student_id+"/eliminar");

	$('#modal_delete').modal();
}