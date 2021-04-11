@extends('layout')
@section('style')

{!!Html::style('assets/css/main-.css')!!}
@endsection
@section('content')

<!-- Main -->
	<div id="main" class="alt">
		@if (count($errors) > 0)
				<div class="alert alert-danger">
			 	<strong>Errores en el formulario</strong> Verifica los datos.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		<!-- One -->
			<section id="one">
				<div class="inner">
					<header class="major">

					</header>
					<h2 id="elements">Datos Personales de: {{Auth::User()->nombre}}</h2>


							{!!Form::open(['route'=>'datos.store','method'=>'POST','enctype'=>'multipart/form-data'])!!}

								  @include('estudiantes.partials.fieldsDatos')
									<!-- files -->
	  						{!! Form::close() !!}

						</div>
					</div>
				</div>
			</section>

	</div>




	@endsection
