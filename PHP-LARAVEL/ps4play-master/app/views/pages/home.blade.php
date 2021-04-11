@extends('layouts.default')

<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="page-header text-center push-down-sm" id="top-games-header"> 
				<span class="top-game-header rubberBand animated">Top Games</span>
			</div>
		</div>
	</div>
</div>

@section('content')
	<div class="row push-down-sm">
	@foreach ($imageLinks as $imageLink) 
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center top-game-covers">
			{{ $imageLink }}
		</div>
	@endforeach
	</div>
@stop
