@extends('layouts.principal')

@section('content')
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
	<div class="container">
		<div class="row">
			<div class="col s12 l6">
				<div class="row"></div>
				<h5>Agrega un nuevo producto</h5>
			</div>
			<div class="col s12 l6">
				<div class="row"></div>
				<a href="/producto/" class="waves-effect waves-red btn-flat left right">Registro de Productos</a>
			</div>
		</div>

		{!!Form::open(['route'=>'producto.store', 'method'=>'POST'])!!}
			@include('producto.forms.formulario')
			<div class="row center">
	            <div class="col s12">
	                {!!Form::submit('Registrar', ['class'=>'btn'])!!}
	            </div>
	        </div>
		{!!Form::close()!!}
		<div class="row"></div>
		<div class="row"></div>
		<div class="row"></div>
		<div class="row"></div>
		<div class="row"></div>
	</div>
@stop