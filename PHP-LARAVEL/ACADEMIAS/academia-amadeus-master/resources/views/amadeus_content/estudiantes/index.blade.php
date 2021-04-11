@extends('layouts.blank')

@section('main_container')

	<!-- Mensajes de error o de exito -->
	@if (Session::has('message'))
      <div class="">
        {{Sesion::get('message')}}
      </div>
    @endif
    
	<!-- Titulo -->
	<div class="page-title">
		<div class="title_left">
			<h3><a href="/estudiantes">Estudiantes</a> <small>Dashboard</small></h3>
		</div>

		<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Buscar">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Go</button>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Listado de estudiantes</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a>
							</li>
							<li><a href="#">Settings 2</a>
							</li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">

			    <p>Estudiantes en la academia</p>

			    <!-- start project list -->
			    <table class="table table-striped projects">
			    	<thead>
			    		<tr>
			    			<th style="width: 1%">Cedula</th>
			    			<th style="width: 20%">Nombre</th>
			    			<th>Materias </th>
			    			<th>Ultimo mes de pago</th>
			    			<th>Estado</th>
			    			<th style="width: 20%">Opciones</th>
			    		</tr>
			    	</thead>
			    	<tbody>
			    		@foreach($estudiante as $key => $value)
						<tr>
							<td>{{$value->cedula}}</td>
							<td>
								<a href="">{{$value->nombre}} {{$value->apellido}}</a>
								<br>
								<small><a href="#">TODO. Agregar Representante</a></small>
							</td>
							<td>TODO. Agregar materias en forma de iconos</td>
							<td>TODO. Agregar ultimo mes de pago</td>
							<td>TODO. Agregar estado de inscripcion</td>
							<td>
					            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
					            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
					            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
					        </td>
						</tr>
						@endforeach
			      	<!--
			        <tr>
			          <td>24.890.347</td>
			          <td>
			            <a href="#">Hector Larez</a>
			            <br />
			            <small><a href="#">Yumirva Mares</a></small>
			          </td>
			          <td>
			            <ul class="list-inline">
			              <li>
			                <img src="images/user.png" class="avatar" alt="Avatar">
			              </li>
			              <li>
			                <img src="images/user.png" class="avatar" alt="Avatar">
			              </li>
			              <li>
			                <img src="images/user.png" class="avatar" alt="Avatar">
			              </li>
			              <li>
			                <img src="images/user.png" class="avatar" alt="Avatar">
			              </li>
			            </ul>-
			          </td>
			          <td class="project_progress">
			           <div class="progress progress_sm">
			              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57"></div>
			            </div>
			            <small>57% Complete</small>
			          </td>
			          <td>
			            <button type="button" class="btn btn-success btn-xs">Activo</button>
			          </td>
			          <td>
			            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
			            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
			            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
			          </td>
			        </tr>-->
			        
			    	</tbody>
			    </table>
		    	<!-- end project list -->
		  	</div>

		</div>
		</div>
		</div>
	
@endsection