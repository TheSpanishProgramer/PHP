@extends('admin.layout')
@section('title','Listado de Sedes')
@section('main-content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Listado de Sedes </h3>
            </div>
            <div class="box-body">
	            <div class="row">
	            	<div class="col-sm-6">
	            		<div class="dataTables_length" id="example1_length">
							<a href="{{ route('sedes.create')}}" class="btn btn-primary btn-flat"> Nueva Sede     <span class="glyphicon glyphicon-plus"></span></a>
							<br>
	            		</div>
	            	</div>
	            </div>
	        <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                	<tr>
	                  <th>Id</th>
	                  <th>Sede</th>
	                  <th>Dirección</th>
	                  <th>Telefono</th>
	                  <th>Correo</th>
	                  <th>Estado</th>
	                  <th>Acciones</th>
	                </tr>
	            </thead>
	            <tbody>
				@foreach($sedes as $sede)
					<tr>
	            		<td>{{ $sede->id }}</td>
	            		<td>{{ $sede->name}}</td>
		                <td>{{ $sede->address}}</td>
		                <td>{{ $sede->telefono}}</td>
		                <td>{{ $sede->email }}</td>
		               @if($sede->status == "activo")
		           		 <td><samp class="label label-success">{{ $sede->status }}</samp></td>
		               @else
						<td><samp class="label label-danger">{{ $sede->status }}</samp></td>
		               @endif
		               <td>
				        	<a href="{{ route('sedes.edit', $sede->id)}}" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
				        	<a href="{{ route('sedes.destroy', $sede->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true" title="Eliminar"></span></a>
				      	</td>
		            </tr>
				@endforeach
			    </tbody>
			    <tfoot>
			    	<tr>
	                <th>Id</th>
	                <th>Sede</th>
	                <th>Dirección</th>
	                <th>Telefono</th>
	                <th>Correo</th>
	                <th>Estado</th>
	                </tr>
                </tfoot>
			  </table>
			</div>
			<center>
				{!! $sedes->render()!!}
			</center>
			</div>
		</div>
	</div>
</div>

@endsection()