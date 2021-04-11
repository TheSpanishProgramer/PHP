@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="/css/students/elements-form.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endsection

@section('content')

<!-- TABLA ALUMNOS -->
<h4>ALUMNOS</h4>
<table class="table-bordered" id="students-table">
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>DNI</th>
              <th>Opciones</th>
          </tr>
        </thead>

        <tbody>
        @foreach($students as $student)
          <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->lastName}}</td>
            <td>{{$student->dni}}</td>
            <td>  
				<a class="btn-floating blue" 
				   href="#modal_edit"

				   data-edit="{{$student->id}}"
				   data-name="{{$student->name}}"
				   data-lastname="{{$student->lastName}}"
				   data-dni="{{$student->dni}}"
				   data-address="{{$student->address}}"
				   data-birthdate="{{$student->birthdate}}"
				   data-sex="{{$student->sex}}" 
				   data-email="{{$student->email}}"
				   data-phone="{{$student->phone}}"
				   data-attorney="{{$student->attorney}}"
				   data-photo="{{$student->photo}}">

				   <i class="material-icons">edit</i>
				</a>  

				<a class="btn-floating red"  href="#modal_delete" data-delete="{{$student->id}}"><i class="material-icons">delete</i></a>    
			</td>
          </tr>
        @endforeach
        </tbody>
      </table>

<!-- MODAL EDITAR -->
<div id="modal_edit" class="modal modal-fixed-footer lg">	
	<form action="/alumno/editar" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="modal-content">
			<h8 class="center-align">REGISTRAR ALUMNO</h8>
			<div class="row">
				<input id="id" type="hidden" name="id">
				<div class="col s8">
					<div class="input-field">
					  <input  id="name" name="name" placeholder="Ingrese aqui el nombre " type="text" class="validate" required>
					  <label for="first_name">Nombre</label>
					</div>
					<div class="input-field">
					  <input  id="lastName" name="lastName" placeholder="Ingrese aqui los apellidos " type="text" class="validate" required>
					  <label for="first_name">Apellido</label>
					</div>
					<div class="input-field col s6">
					  <input  id="dni" name="dni" placeholder="Ingrese aqui el DNI " type="number" class="validate" required>
					  <label for="first_name">DNI</label>
					</div>
					<div class="input-field col s6">
					  <input  id="address" name="address" placeholder="Ingrese aqui su direccion " type="text" class="validate" required>
					  <label for="first_name">Direccion</label>
					</div>
					<div class="input-field col s6">
						<label >Fecha de Nacimiento</label>
						<input id="birthdate" name="birthdate" type="date" class="datepicker">
					</div>
					<div id="sexo" class="input-field col s6">
			            <select id="sex" name="sex">
			                	<option value="" disabled selected>Escoja su sexo</option>                
			                    <option value="M">Masculino</option>
			                    <option value="F">Femenino</option>
			            </select>
			            <label >Sexo</label>
			        </div>
					<div class="input-field col s6">
					  <input  id="email" name="email" placeholder="Ingrese aqui su E-mail " type="email" class="validate" required>
					  <label for="first_name">E-mail</label>
					</div>
					<div class="input-field col s6">
					  <input  id="phone" name="phone" placeholder="Ingrese aqui el DNI " type="number" class="validate" required>
					  <label for="first_name">Telefono</label>
					</div>
					<div class="input-field col s6">
					  <input  id="attorney" name="attorney" placeholder="Ingrese aqui su direccion " type="text" class="validate" required>
					  <label for="first_name">Apoderado</label>
					</div>
				</div>
				<div class="col s4">
					<div class="col s12 ">
					  <div class="card">
					    <div class="card-image">
					    <img id="blah" src="/images/logo.jpg" alt="your image" />
					    </div>
					  </div>
					</div>
					<div class="input-field col s12">
					   <div class="file-field input-field">
					      <div class="btn btn-red">
					        <span >Foto</span>
					        <input id="imgInp" name="photo" type="file" >
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
					    </div>
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
<div id="modal_student" class="modal modal-fixed-footer lg">

    <form action="" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
        <input type="hidden" name="input_timer" id="input-timer" value="{{ old('input_timer', '00:00:00.000') }}">

		<div class="modal-content">
			<h8 class="center-align">REGISTRAR ALUMNO</h8>
            <div class="card-panel blue-text text-darken-2">
                <strong>Timer:</strong> <span id="alert-timer">00:00:00.000</span>
            </div>

			<div class="row">
				<div class="col s8">
					<div class="input-field">
					  <input  name="name" placeholder="Ingrese aqui el nombre " type="text" class="validate" required>
					  <label for="first_name">Nombre</label>
					</div>
					<div class="input-field">
					  <input  name="lastName" placeholder="Ingrese aqui los apellidos " type="text" class="validate" required>
					  <label for="first_name">Apellido</label>
					</div>
					<div class="input-field col s6">
					  <input  name="dni" placeholder="Ingrese aqui el DNI " type="number" class="validate" required>
					  <label for="first_name">DNI</label>
					</div>
					<div class="input-field col s6">
					  <input  name="address" placeholder="Ingrese aqui su direccion " type="text" class="validate" required>
					  <label for="first_name">Direccion</label>
					</div>
					<div class="input-field col s6">
						<label >Fecha de Nacimiento</label>
						<input name="birthdate" type="date" class="datepicker">
					</div>
					<div class="input-field col s6">
			            <select name="sex">
			                <option value="" disabled selected>Escoja su sexo</option>                
			                    <option value="M">Masculino</option>
			                    <option value="F">Femenino</option>
			            </select>
			            <label >Sexo</label>
			        </div>
					<div class="input-field col s6">
					  <input  name="email" placeholder="Ingrese aqui su E-mail " type="email" class="validate" required>
					  <label for="first_name">E-mail</label>
					</div>
					<div class="input-field col s6">
					  <input  name="phone" placeholder="Ingrese aqui el DNI " type="number" class="validate" required>
					  <label for="first_name">Telefono</label>
					</div>
					<div class="input-field col s6">
					  <input  name="attorney" placeholder="Ingrese aqui su direccion " type="text" class="validate" required>
					  <label for="first_name">Apoderado</label>
					</div>
				</div>
				<div class="col s4">
					<div class="col s12 ">
					  <div class="card">
					    <div class="card-image">
					    <img id="blaho" src="/images/no_image.png" alt="your image" />		    
					    </div>
					  </div>
					</div>
					<div class="input-field col s12">
					   <div class="file-field input-field">
					      <div class="btn btn-red">
					        <span >Imagen</span>
					        <input id="imgInpo" name="photo" type="file" required>
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
					    </div>
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
<!-- BOTON MODAL REGISTRO -->
<div class="fixed-action-btn ">
	<a data-add="x" href="#modal_student" title="AGREGAR ENFERMEDAD" class="btn-floating btn-large teal">
		<i class="large material-icons">add</i>
	</a>
</div>
<!-- MODAL ELIMINAR -->
	<!-- Modal Structure -->
<div id="modal_delete" class="modal">
	<div class="modal-content">
	  <h4>Está seguro que desea eliminar estE AlUMNO?</h4>
	  <p>Si elimina este alumno se eliminarán tambien sus dependencias</p>
	</div>
	<div class="modal-footer">
	  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">No eliminar</a>
	  <a id="delete" href="#!" class=" waves-effect waves-light btn red">Eliminar de todas formas</a>
	</div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="/js/students/elements-form.js"></script>
@endsection
