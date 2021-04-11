@extends('layouts.principal')

<?php $message=Session::get('message')?>

@if($message == 'store')
	<script>
		alert('Agregado!');
	</script>	
@endif
@if($message == 'edit')
	<script>
		alert('Editado!');
	</script>	
@endif
@if($message == 'delete')
	<script>
		alert('Eliminado');
	</script>	
@endif

@section('content')
<div class="row"></div>
<div class="row"></div>
<div class="row"></div>
<div class="row"></div>
<div class="row"></div>
<div class="container">
	<div class="row center">
		<div class="col s12">
			<h5 class=" card-panel blue-grey white-text">Registro de Productos</h5>
		</div>
	</div>
	<table class="highlight centered">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Operación</th>
		</thead>
		@foreach($productos as $producto)
		<tbody>
			<td>{{$producto->id}}</td>
			<td>{{$producto->nombre}}</td>
			<td>
				{!!link_to_route('producto.edit', $title = 'Editar', $parameters = $producto->id, $attributes = ['class'=>'btn-flat waves-effect waves-red'])!!}
			</td>
		</tbody>
		@endforeach
	</table>
</div>
<div class="row"></div>
<div class="row"></div>
<div class="row"></div>
<div class="row"></div>
<div class="row"></div>
@stop