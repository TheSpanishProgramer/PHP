@extends('layouts.app')


@section('links')
    <link rel="stylesheet" href="/css/courses/elements-form.css">
@endsection
@section('content')

<!-- TABLA ALUMNOS -->
<h4>CURSOS</h4>
<table class="table-bordered">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
        @foreach($courses as $course)
          <tr>
            <td>{{$course->name}}</td>
            <td>{{$course->description}}</td>
            <td>  
				<a class="btn-floating blue" data-edit="{{$course->id}}" href="#modal_edit"><i class="material-icons">edit</i></a>  

				<a class="btn-floating red"  href="#modal_delete" data-delete="{{$course->id}}"><i class="material-icons">delete</i></a>    
			</td>
          </tr>
        @endforeach
        </tbody>
      </table>
<!-- MODAL EDITAR -->
<div id="modal_edit" class="modal modal-fixed-footer lg">	
	<form id="edit" action="/curso/editar"  method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="modal-content">
			<h8 class="center-align">EDITAR CURSO</h8>
			<div class="row">
				<div class="col s8">
					<input id="id" type="hidden" name="id">
					<div class="input-field">
					  <input  id="name" name="name" placeholder="Ingrese aqui el nombre " type="text" class="validate" required>
					  <label for="first_name">Nombre</label>
					</div>
					<div class="input-field">
					  <input  id="description" name="description" placeholder="Ingrese aqui los apellidos " type="text" class="validate" required>
					  <label for="first_name">Descripcion</label>
					</div>						
				</div>
			</div>
 		</div>
		<div class="modal-footer">
			<a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Cerrar</a>
			<button class="btn waves-effect waves-light" type="submit" name="action">Guardar cambios
				<i class="material-icons right">done</i>
			</button>
		</div>

	</form>	
</div>
<!-- MODAL REGISTRO -->
<div id="modal_course" class="modal modal-fixed-footer lg">	
	<form action="/cursos" id="formRegisterCourse" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="modal-content">
			<h8 class="center-align">REGISTRAR CURSO</h8>
			<div class="row">
				<div class="col s8">
					<div class="input-field">
					  <input  id="vname" name="name" placeholder="Ingrese aqui el nombre " data-error=".error_name" type="text" class="validate" required>
					  <div class="error_name"></div>	
					  <label for="first_name">Nombre</label>
					</div>
					<div class="input-field">
					  <input  name="description" placeholder="Ingrese aqui la descripcion " type="text" class="validate" required>
					  <label for="first_name">Descripcion</label>
					</div>						
				</div>
			</div>
 		</div>
		<div class="modal-footer">
			<a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Cerrar</a>
			<button id="btn_register" class="btn waves-effect waves-light" >Guardar cambios
				<i class="material-icons right">done</i>
			</button>
		</div>

	</form>	
</div>
<!-- BOTON MODAL REGISTRO -->
<div class="fixed-action-btn ">
	<a data-add="x" href="#modal_course" title="AGREGAR ENFERMEDAD" class="btn-floating btn-large teal">
		<i class="large material-icons">add</i>
	</a>
</div>
<!-- MODAL ELIMINAR -->
	<!-- Modal Structure -->
<div id="modal_delete" class="modal">
	<div class="modal-content">
	  <h4>Está seguro que desea eliminar estE CURSO?</h4>
	  <p>Si elimina esta especie se eliminarán tambien sus dependencias</p>
	</div>
	<div class="modal-footer">
	  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">No eliminar</a>
	  <a id="delete" href="#!" class=" waves-effect waves-light btn red">Eliminar de todas formas</a>
	</div>
</div>

@endsection

@section('scripts')
    <script src="/js/courses/elements-form.js"></script>
@endsection
