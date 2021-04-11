@extends('admin.layout')
@section('title','Usuarios del Sistema')
@section('main-content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Usuarios del Sistema Digitadores</h3>
            </div>
            <div class="box-body">
	            <div class="row">
	            	<div class="col-sm-6">
	            		<div class="dataTables_length" id="example1_length">
	            			<a href="{{ route('users.create')}}" class="btn btn-primary btn-flat"> Registrar Usuario    <span class="glyphicon glyphicon-plus"></span></a>
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
				      <th scope="col">Correo</th>
				      <th scope="col">Tipo</th>
				      <th scope="col">Estado</th>
				      <th scope="col">Action</th>
	                </tr>
	            </thead>
				  <tbody>
				    @foreach($users as $user)
				    <tr>
				      @if($user->type == "estandar")
				      <th scope="row">{{ $user->id }}</th>
				      <td>{{ $user->name }}</td>
				      <td>{{ $user->email }}</td>
				      <td><span class="label label-info">{{ $user->type }}</span></td>
					@if($user->status == "activo")
				        <td><span class="label label-success">{{ $user->status }}</span></td>
				      @else
				        <td><span class="label label-danger">{{ $user->status }}</span></td>
				      @endif
				      <td>
				        <a href="{{ route('users.edit', $user->id)}}" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
				        <a href="{{ route('users.destroy', $user->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a>
				      </td>
				    </tr>

				      @endif
				    @endforeach
			    </tbody>
			    <tfoot>
			    	<tr>
				      <th scope="col">ID</th>
				      <th scope="col">Nombre</th>
				      <th scope="col">Correo</th>
				      <th scope="col">Tipo</th>
				      <th scope="col">Estado</th>
				      <th scope="col">Action</th>
	                </tr>
                </tfoot>
			  </table>
			</div>
			<center>
				{!! $users->render()!!}
			</center>
			</div>
		</div>
	</div>
</div>


@endsection()
