@extends('admin.layout')
@section('title','Listado de Citas ')
@section('content-header')

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
					<label for="servicio"> Servicio Prestado </label>
					<input type="text" name="servicio" id="servicio"  class="form-control" readonly>
				</div>			
				<div class="form-group">
					<label for="profesional">Profesional Asignado</label>
					<input type="text" name="profesional" id="profesional"  class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="fecha">Fecha y Hora</label>
					<input type="text" name="fecha" id="fecha"  class="form-control" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="cliente">Cliente</label>
					<input type="text" name="cliente" id="cliente"  class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="email">Correo</label>
					<input type="text" name="email" id="email"  class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="status" >Estado</label>
					<input type="text" name="status" id="status"  class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="notas">Observaciones</label>
					<input type="text" name="notas" id="notas"  class="form-control" readonly>
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
@section('main-content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Listado de Citas</h3>
            </div>
            <div class="box-body">
	            <div class="row">
	            	<div class="col-md-2">
	            		<div class="dataTables_length" id="example1_length">
	            			<a href="{{ route('citas.create')}}" class="form-control btn btn-primary btn-flat"> Nueva Cita    <span class="glyphicon glyphicon-plus"></span></a>
							<br>
	            		</div>
	            	</div>
	            	<div class="col-md-6"></div>
	            	<div class="col-md-4">
					<form name="selecciona">
					{!! Form::select('id',$sedes,null,['class'=>'form-control','name'=>'sedes','id'=>'search-sede','placeholder' => 'Filtrar por Sede', 'ONCHANGE'=>'actualizaPagina()','required'])!!}
					</form>
	            	</div>
	            	<script>
						function actualizaPagina(){
						  	i = document.forms.selecciona.sedes.selectedIndex;
						    categoria = document.forms.selecciona.sedes.options[i].value;
						    location.href = '/agenda/public/admin/citas/'+categoria;
						}		

					</script>
	            	<!--div class="col-md-2">
	            		<Boton para realizar bsqueda opcion 2-->
	            		<!--div class="dataTables_length" id="example1_length">
	            			<a onClick="buscar()" id="btn-search" class="form-control btn btn-primary btn-flat">Buscar</a>
							<br>
	            		</div>
	            	</div-->
	            </div>
	            <br>
	         <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                	<tr>
				      <th scope="col">ID</th>
				      <th scope="col">Sede</th>
				      <th scope="col">Servicio</th>
				      <th scope="col">Profesional</th>
				      <th scope="col">Fecha Hora</th>
				      <th scope="col">Cliente</th>
				      <th scope="col">Correo</th>
				      <th scope="col">Estado</th>
				      <th scope="col">Observaciones</th>
				      <th scope="col">Acciones</th>
	                </tr>
	            </thead>
				  <tbody>
				    @foreach($citas as $cita)
				    <tr>
				      <th scope="row">{{ $cita->id }}</th>
				      <td>{{ $cita->sede }}</td>
				      <td>{{ $cita->servicio }}</td>
				      <td>{{ $cita->profesional }}</td>
				      <td>{{ $cita->reservadate." ".$cita->reservatime}}</td>
				      <td>{{ $cita->cliente }}</td>
				      <td>{{ $cita->email }}</td>
				      <td>{{ $cita->status }}</td>
				      <td>{{ $cita->notas }}</td>
				      <td>
				      	<!--button class="btn btn-default" data-toggle="modal" data-target="#vistaCitas" data-sede="{{ $cita->sede }}" data-servicio="{{ $cita->servicio }}" data-profesional="{{ $cita->profesional }}" data-fecha="{{ $cita->reservadate." ".$cita->reservatime}}" data-cliente="{{ $cita->cliente }}" data-email="{{ $cita->email }}" data-status="{{ $cita->status }}"  data-notas="{{ $cita->notas }}" ><span class="glyphicon glyphicon-search" aria-hidden="true"></button-->
				        <a href="{{ route('citas.edit', $cita->id)}}" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
				        @if(Auth::user()->admin())
				        <a href="{{ route('citas.destroy', $cita->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a>
				        @endif
				      </td>
				    </tr>
				    @endforeach
			    </tbody>
			    <tfoot>
			    	<tr>
				      <th>ID</th>
				      <th>Sede</th>
				      <th>Servicio</th>
				      <th>Profesional</th>
				      <th>Fecha Hora</th>
				      <th>Cliente</th>
				      <th>Correo</th>
				      <th>Estado</th>
				      <th>Observaciones</th>
				      <th>Acciones</th>
	                </tr>
                </tfoot>
			  </table>
			</div>
			<!--center>
		
			</center-->
			</div>
		</div>
	</div>
</div>
@endsection
