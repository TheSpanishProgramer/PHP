


@extends('layout')
@section('style')
<link rel="stylesheet" href="assets/css/main.css" />
{!!Html::style('assets/css/main.css')!!}
@endsection
@section('content')

				<div class="panel-heading">Notificacion de la App Web ietal</div>



					<section id="one">
						<div class="inner">
              Click here to reset your password: <a href="{{ url('password/reset/'.$token) }}"> Aquí </a>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
