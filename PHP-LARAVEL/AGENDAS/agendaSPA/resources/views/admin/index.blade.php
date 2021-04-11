@extends('admin.layout')
@section('title','Cejas Perfectas')
@section('main-content')

<script>
$(function () {

    /*---Intervalos de tiempo del calendario*/
    var timeslot = "00:30:00";
    var starttime = "08:00:00";
    var endtime = "24:00:00";
    /* initialize the calendar
     -----------------------------------------------------------------*

/*------Calendario de la seccion citas---*/
    $('#calendar').fullCalendar({
      header: {
        left: 'today,prev,next',
        center: 'title',
        right: 'month'
      },
      //Random default events
      slotDuration:timeslot,
      slotLabelInterval: timeslot,
      allDaySlot: false,
      selectable: true,
      //starting time (hour) - from practitioner
      minTime: starttime,
      //closing time (hour) - from practitioner
      maxTime: endtime,
      editable: false,
      eventLimit: true,
      events:'{{ route('citas.calendarcitas')}}',
    });
});
</script>
<!-- Main content -->
<section class="content">      
	<div class="row">
		<div class="col-md-1"></div>
        <!--Seccion del Calendario-->
        <div class="col-md-10">
        	<div class="box box-primary">
        		<div class="box-body no-padding">
        			<div id="calendar"></div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
</section>

@endsection()
@section('modal-calendar')
<!-- Modal -->
<div class="modal fade" id="vistaCitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Detalle de la Cita</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="sede"> Sede </label>
					<input type="text" name="sede" id="sede" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for=""> Servicio Prestado </label>
					<input type="text" id="servicio"  class="form-control" readonly>
				</div>			
				<div class="form-group">
					<label for="">Profesional Asignado</label>
					<input type="text" id="profesional"  class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="">Fecha y Hora</label>
					<input type="text" id="reserva"  class="form-control" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Cliente</label>
					<input type="text" id="cliente"  class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="">Correo</label>
					<input type="text" id="email"  class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="">Estado</label>
					<input type="text" id="status"  class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="">Observaciones</label>
					<input type="text" id="notas"  class="form-control" readonly>
				</div>					
			</div>
		</div>														
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection