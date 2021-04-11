@extends('admin.layout')
@section('title','Generación de Reportes')
@section('main-content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Generación de Reportes</h3>
            </div>
	        	<div class="box-body">
	            	<div class="row">
	            		<div class="col-md-2"></div>
	            		<div class="col-md-8">
	            			<div class="form-group">
	            				{!! Form::label('sede','Por Sede ')!!}
	            				<select name="sede" id="sede" class="form-control">
	            					<option value="*"> Selecione una Sede </option>
	            					@foreach($sede as $sedes)
	            						<option value="{{ $sedes->id}}">{{ $sedes->name}}</option>
	            					@endforeach
	            				</select>
	            			</div>
		            		<script>
							var sede ='*';
							var profesional='*';
							var servicio='*';
							$("#sede").on('change', function() {
							  sede = $(this).val();
							  // te muestra un array de todos los seleccionados
							  console.log(sede);
							});
							$("#profesional").on('change', function() {
							  profesional = $(this).val();
							  // te muestra un array de todos los seleccionados
							  console.log(profesional);
							});
							$("#servicio").on('change', function() {
							  servicio= $(this).val();
							  // te muestra un array de todos los seleccionados
							  console.log(servicio);
							});

							function report(){
								window.location= 'reportes/general/'+sede;
							}
		            		</script>
		            		<div class="form-group">
				            	<a target="_blank" onClick="report()" class="btn btn-block btn-primary btn-flat"> <span> Generar Reporte</span></a>
				            </div>
	            		</div>
	            		<div class="col-md-2">
	            			<!--div class="form-group">
	            				<center><label>Rango de Fecha</label></center>
	            				<div class="row">
	            					<div class="col-md-6">
				                    <label for="desde">Desde</label>
				                    <input type="desde" class="form-control" name="reservadate" id="reservadate" required>
				                  </div>
				                  <div class="col-md-6">
				                    <label for="hasta">Hasta</label>
				                    <input type="hasta" class="form-control" name="reservadate" id="reservadate" required>
				                  </div>
				                </div>
				            </div-->
	            		</div>
	            	</div>
				</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
</script>
@endsection()