@extends('layout')
@section('style')
<link rel="stylesheet" href="assets/css/main-.css" />
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
														<h2 id="elements">Información de los Acudientes</h2>
												</header>

												<div class="inner">
														<div class="12u 15u$(big)">

																{!!Form::open(['route'=>'acudientes.store','method'=>'POST','enctype'=>'multipart/form-data'])!!}

																		@include('estudiantes.partials.fieldsAcudiente')
																{!! Form::close() !!}



														</div>

												</div>
							 </div>
							</section>

					</div>

		@endsection
