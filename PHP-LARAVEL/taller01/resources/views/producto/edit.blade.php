@extends('layouts.principal')

@section('content')
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
	
	<div class="container">
		<div class="row">
			<div class="col s12 l6">
				<div class="row"></div>
				<h5>Edición de registro de Productos</h5>
			</div>
			<div class="col s12 l6">
				<div class="row"></div>
				<a href="/producto" class="waves-effect waves-red btn-flat right">Registro de Productos</a>
			</div>
		</div>

		{!!Form::model($producto,['route'=>['producto.update', $producto->id], 'method'=>'PUT'])!!}
			@include('producto.forms.formulario')
			<div class="row center">
	            <div class="col s6">
	                {!!Form::submit('Actualizar', ['class'=>'btn blue'])!!}
	            </div>
	        
		{!!Form::close()!!}
		
	    {!!Form::open(['route'=>['producto.destroy', $producto->id], 'method'=>'DELETE'])!!}
			
	            <div class="col s6">
	                {!!Form::submit('Eliminar', ['class'=>'btn red'])!!}
	            </div>
	        </div>
		{!!Form::close()!!}
	</div>
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
@stop