@extends('layouts.adminlte')
@section('content')
<div class="container">
	<div class="col-sm-12">
		<div class="box box-success ">
			<div class="box-header with-border">
				<h2 class="box-title">Acción</h2>
			</div>		
			<div class="box-body">
				<form class="form" role="form">	
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group col-sm-12">          
						<label class="col-xs-2">Nombre:</label>
						<div class="typeahead__container col-xs-10">
							<div class="typeahead__field ">             
								<span class="typeahead__query ">
									<input class="nombre_typeahead " name="nombre" type="search" placeholder="Buscar o agregar uno nuevo" autocomplete="off"
									value="{{$curso->nombre}}">
								</span>
							</div>
						</div>
					</div>	
					<div class="form-group col-sm-6">
						<label for="provincia" class="control-label col-sm-4">Jurisdicción:</label>
						<div class="col-sm-8">
						<input type="text" class="form-control" id="edicion" name="edicion" data-id="{{$curso->id_provincia}}" value="{{$curso->provincia->nombre}}" disabled>
						</div>
					</div>	
					<div class="form-group col-sm-6">
						<label for="area_tematica" class="control-label col-sm-4">Area temática:</label>
						<div class="col-sm-8">
							<select class="form-control" id="area_tematica" name="area_tematica">

								<option data-id="{{$curso->id_area_tematica}}" disabled>{{$curso->areaTematica->nombre}}</option>

								@foreach ($areas_tematicas as $area)

								<option data-id="{{$area->id_area_tematica}}">{{$area->nombre}}</option>				 

								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<label for="linea_estrategica" class="control-label col-sm-4">Tipo de acción:</label>
						<div class="col-sm-8">
							<select class="form-control" id="linea_estrategica" name="linea_estrategica">

								<option data-id="{{$curso->id_linea_estrategica}}">{{$curso->lineaEstrategica->nombre}}</option>

								@foreach ($lineas_estrategicas as $linea)

								<option data-id="{{$linea->id_linea_estrategica}}">{{$linea->nombre}}</option>				 

								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<label for="edicion" class="control-label col-sm-4">Edición:</label>
						<div class="col-sm-8">
							<input type="number" class="form-control" id="edicion" name="edicion" value="{{$curso->edicion}}" disabled>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<label for="duracion" class="control-label col-sm-4">Duración:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="duracion" name="duracion" value="{{$curso->duracion}}">
						</div>
					</div>
					<div class="form-group col-sm-6">
						<label class="col-sm-3">Fecha:</label>

						<div class="input-group date col-sm-9">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" name="fecha_ejec_inicial" class="form-control pull-right" id="datepicker" value="{{$curso->fecha_ejec_inicial}}">
						</div>
					</div>
				</form>
			</div>		
			<div class="box-footer">
				<a href='{{url()->previous()}}'>
					<button class="btn btn-warning" id="volver" title="Volver"><i class="fa fa-undo" aria-hidden="true"></i>Volver</button>
				</a>
				<button class="btn btn-primary pull-right" id="modificar" title="Modificar" data-id="{{$curso->id_curso}}"><i class="fa fa-plus" aria-hidden="true"></i>Modificar</button>
			</div>
		</div> 
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-info ">
				<div class="box-header">
					<h2 class="box-tittle">Alumnos</h2>
				</div>
				<div class="box-body">
					<table id="alumnos_del_curso" class="table table-hover">
						<thead>
							<tr>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Tipo Doc</th>
								<th>Nro Doc</th>
								<th>Provincia</th>
								<th>Acciones</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-info ">
				<div class="box-header">
					<h2 class="box-tittle">Profesor/es</h2>
				</div>
				<div class="box-body">
					<table id="profesores_del_curso" class="table table-hover">
						<thead>
							<tr>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Tipo Doc</th>
								<th>Nro Doc</th>
								<th>Acciones</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js")}}"></script>

<script src="{{asset("/bower_components/admin-lte/plugins/datepicker/locales/bootstrap-datepicker.es.js")}}" charset="UTF-8"></script>

<script type="text/javascript">
	$(document).ready(function() {

		$.typeahead({
			input: '.nombre_typeahead',
			order: "desc",
			source: {
				info: {
					ajax: {
						type: "get",
						url: {{url('cursos/nombres')}}",
						path: "data.info"
					}
				}
			},
			callback: {
				onInit: function (node) {
					console.log('Typeahead Initiated on ' + node.selector);
				}
			}
		});

   //Date picker
   $('#datepicker').datepicker({
   	format: 'dd/mm/yyyy',
   	language: 'es',
   	autoclose: true
   });

   $(".box-footer").on("click","#volver",function(){
   	console.log('Se vuelve sin crear el curso.');
   	$('#alta-accion').html("");
   	$('#abm').show();
   	$('#filtros').show();
   });

   $(".box-footer").on("click","#modificar",function(){

   	var curso = $(this).data('id');
   	var data = $('#alta-accion form').serialize();
   	data += '&id_area_tematica='+$('#alta-accion form #area_tematica :selected').data('id');
   	data += '&id_linea_estrategica='+$('#alta-accion form #linea_estrategica :selected').data('id');
   	data += '&id_provincia='+$('#alta-accion form #provincia :selected').data('id');


   	console.log(data);

   	$.ajax({
   		url: "{{url('cursos')}}"+"/"+curso,
   		method: 'put',
   		data: data,
   		success: function(data){
   			console.log('Se modifico el curso correctamente.');
   			$('#alta-accion').html("");
   			$('#abm').show();
   			$('#filtros').show();
   		},
   		error: function (data) {
   			console.log('Hubo un error.');
   			console.log(data);
   		}
   	});
   });

   $('#alumnos_del_curso').DataTable({
   	destroy: true,
   	ajax : $('#modificar').data('id')+'/alumnos',
   	columns: [
   	{ data: 'nombres'},
   	{ data: 'apellidos'},
   	{ data: 'id_tipo_documento'},
   	{ data: 'nro_doc'},
   	{ data: 'provincia'},
   	{ data: 'acciones'}
   	]
   });

   $('#profesores_del_curso').DataTable({
   	destroy: true,
   	ajax : $('#modificar').data('id')+'/profesores',
   	columns: [
   	{ data: 'nombres'},
   	{ data: 'apellidos'},
   	{ data: 'id_tipo_documento'},
   	{ data: 'nro_doc'},
   	{ data: 'acciones'}
   	]
   });

   /*jQuery.ajax({
      url: $('#modificar').data('id')+'/alumnos',
      complete: function(xhr, textStatus) {
        console.log(xhr);
        console.log(textStatus);
      },
      success: function(data, textStatus, xhr) {
        console.log(data);
        console.log(textStatus);
        console.log(xhr);
      },
      error: function(xhr, textStatus, errorThrown) {
        console.log(xhr);
        console.log(textStatus);
        console.log(errorThrown);
      }
  });*/


});
</script>
@endsection
