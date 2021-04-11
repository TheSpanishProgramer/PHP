@extends('admin.layout')
@section('title','Listado de Turnos')
@section('main-content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Listado de Horarios </h3>
            </div>
            <div class="box-body">
	            <div class="row">
	            	<div class="col-sm-6">
	            		<div class="dataTables_length" id="example1_length">
	            			<a href="{{ route('turnos.create')}}" class="btn btn-primary btn-flat"> Registrar Turno    <span class="glyphicon glyphicon-plus"></span></a>
							<br>
	            		</div>
	            	</div>
	            </div>
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                	<tr>
	                  <th>Id</th>
	                  <th>Nombre </th>
	                  <th>Inicio</th>
	                  <th>Final</th>
	                  <th>Acciones</th>
	                </tr>
	            </thead>
	            <tbody>
				@foreach($turnos as $turno)
					<tr>
	            		<td>{{ $turno->id }}</td>
	            		<td>{{ $turno->name}}</td>
	            		<td>{{ $turno->inicio}}</td>
		                <td>{{ $turno->fin}}</td>
		               	<td>
				        	<!--a href="{{ route('turnos.edit', $turno->id)}}" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></a-->
				        	<a href="{{ route('turnos.destroy', $turno->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true" title="Eliminar"></a>
				      	</td>
		            </tr>
				@endforeach
			    </tbody>
			    <tfoot>
			    	<tr>
	                  <th>Id</th>
	                  <th>Nombre </th>
	                  <th>Inicio</th>
	                  <th>Final</th>
	                  <th>Acciones</th>
	                </tr>
                </tfoot>
			  </table>
			<center>
				{!! $turnos->render()!!}
			</center>
			</div>
		</div>
	</div>
</div>

@endsection()