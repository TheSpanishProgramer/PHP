@extends('layout')
@section('style')
<link rel="stylesheet" href="assets/css/main.css" />
{!!Html::style('assets/css/main.css')!!}
@endsection
@section('content')

				<!-- Banner -->
				<section id="banner">
					<div class="inner">

								<h1>Estado Pre-Matricula</h1>
							</header>
							<div class="content">
								  @if(Auth::user()->aprobado=='aprobado')
											<p>Bienvenido a la familia IETAL, descargue el certificado para continuar el proceso</p>
											<ul class="actions">

											<li><a href="{{route('aspirante.mi_certificado')}}" target="_blank" class="button next scrolly">Descargar Certificado</a></li>
											</ul>
									@elseif(Auth::user()->aprobado=='no aprobado')
											<p>Su solicitud de pre-matricula, no fue aprobada. :(</p><br>
											<p><b>Observaciones:</b>{{Auth::user()->observaciones}}</p>
									@else
											Aun estamos verifcando su informacion, vuelve a verificar estado otro día.
									@endif
							</div>
						</div>
					</section>

@endsection
