@extends('layout')
@section('style')

{!!Html::style('assets/css/main-.css')!!}


@endsection
@section('content')

<div id="main" class="alt">
	@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
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
						<h2 id="elements">Crear Cuenta </h2>
				</header>

				<div class="inner">
					<div class="12u 15u$(big)">
						<form class="form-horizontal" role="form" method="POST" action="{{route('user.store')}}">

									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="form-group">
										<label class="col-md-4 control-label">Nombre:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="nombre" value="{{ old('name') }}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">E-Mail:</label>
										<div class="col-md-6">
											<input type="email" class="form-control" name="email" value="{{ old('email') }}">
										</div>
									</div>


									<div class="form-group">
										<label class="col-md-4 control-label">Contraseña</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Confirmar contraseña</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password_confirmation">
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-primary">
												Registrarme
											</button>
										</div>
								</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection
