@extends('admin.layout')
@section('title','Listado de Servicios')
@section('main-content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Listado de Servicio o Procedimientos </h3>
            </div>
            <div class="box-body">
	            <div class="row">
	            	<div class="col-sm-6">
	            		<div class="dataTables_length" id="example1_length">
	            			<a href="{{ route('servicios.create')}}" class="btn btn-primary btn-flat"> Registrar Servicio    <span class="glyphicon glyphicon-plus"></span></a>
							<br>
	            		</div>
	            	</div>
	            </div>
	         <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                	<tr>
	                  <th>Id</th>
	                  <th>Nombre </th>
	                  <th>Costo</th>
	                  <th>Accion</th>
	                </tr>
	            </thead>
	            <tbody>
				@foreach($servicios as $servicio)
					<tr>
	            		<td>{{ $servicio->id }}</td>
	            		<td>{{ $servicio->name}}</td>
		                <td>{{ $servicio->costo}}</td>
		               	<td>
				        	<a href="{{ route('servicios.edit', $servicio->id)}}" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
				        	<!--a href="{{ route('servicios.destroy', $servicio->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true" title="Eliminar"></a-->
				      	</td>
		            </tr>
				@endforeach
			    </tbody>
			    <tfoot>
			    	<tr>
	                  <th>Id</th>
	                  <th>Nombre </th>
	                  <th>Costo</th>
	                </tr>
                </tfoot>
			  </table>
			</div>
			<center>
				{!! $servicios->render()!!}
			</center>
			</div>
		</div>
	</div>
</div>

@endsection()