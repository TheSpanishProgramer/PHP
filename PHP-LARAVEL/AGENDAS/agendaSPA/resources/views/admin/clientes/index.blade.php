@extends('admin.layout')
@section('title',' Listado de CLientes')
@section('main-content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Listado de CLientes</h3>
            </div>
            <div class="box-body">
	            <div class="row">
	            	<div class="col-sm-6">
	            		<div class="dataTables_length" id="example1_length">
	            			<a href="{{ route('clientes.create')}}" class="btn btn-primary btn-flat"> Registrar Cliente    <span class="glyphicon glyphicon-plus"></span></a>
							<br>
	            		</div>
	            	</div>
	            </div>
	        <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                	<tr>
				      <th scope="col">ID</th>
				      <th scope="col">Nombre</th>
				      <th scope="col">Cedula</th>
				      <th scope="col">Correo</th>
				      <th scope="col">Telefono</th>
				      <th scope="col">Direccion</th>
				      <th scope="col">Acciones</th>
	                </tr>
	            </thead>
				  <tbody>
				    @foreach($clientes as $cliente)
				    <tr>
				      <th scope="row">{{ $cliente->id }}</th>
				      <td>{{ $cliente->name }}</td>
				      <td>{{ $cliente->cedula }}</td>
				      <td>{{ $cliente->email }}</td>
				      <td>{{ $cliente->telefono }}</td>
				      <td>{{ $cliente->address }}</td>
				      <td>
				        <a href="{{ route('clientes.edit', $cliente->id)}}" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
				        <a href="{{ route('clientes.destroy', $cliente->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a>
				      </td>
				    </tr>
				    @endforeach
			    </tbody>
			    <tfoot>
			    	<tr>
				      <th>ID</th>
				      <th>Nombre</th>
				      <th>Cedula</th>
				      <th>Correo</th>
				      <th>Telefono</th>
				      <th>Direccion</th>
				      <th>Acciones</th>
	                </tr>
                </tfoot>
			  </table>
			</div>
			<center>
				{!! $clientes->render()!!}
			</center>
			</div>
		</div>
	</div>
</div>
@endsection