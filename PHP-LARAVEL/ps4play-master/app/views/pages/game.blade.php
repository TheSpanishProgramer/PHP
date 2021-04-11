@extends('layouts.default')


@section('content')
	<div class="text-center alert update-cart" role="alert"> 
		<h5> </h5> 
	</div>

	<div class="row push-down-sm" id="game-info">
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-md-4">
			<div class="thumbnail text-center">
				{{ HTML::image('images/'.$game->image_name.'.jpg', 'game', array('class'=>'vid-frame')) }}
				<small class="caption">Hover over image to view trailer</small>
				<input type="hidden" class="vid-id" value="{{ $game->video_id }}">
			</div>
		</div>
	
		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-md-6">
			<h5> 
				<strong>{{ $game->name }}</strong> <br> <br> {{ '$'.$game->price }} 
			</h5>
				
			<div class="game-review" id= "{{ $game->reviews()->avg('stars') }}"></div>
			<a href="#reviews" class="review-count">{{ $game->reviews->count() }} reviews</a>
			<p id="description">
				{{ $game->description }}
			</p>
			
			<input type="number" min="1" max="30" placeholder="1" id="quantity" >
			<button class="btn btn-primary purchase">Purchase</button>
			<input type="hidden" id="gameID" value="{{ $game->id }}">
			<input type="hidden" id="url" value="{{ action('CartController@updateCart') }}">		
		</div>
	</div>

	<h4 class="push-down-xxl" id="reviews">Reviews</h4>
	<hr class="small">
	<ul class="list-group">
		@if ( !count($game->reviews) )
			<li class="list-group-item"> 
				<h4>No reviews</h4> 
			</li>
		@else
			@foreach ($game->reviews as $review)
				<li class="list-group-item review">
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1 col-sm-12 col-md-12 col-lg-12">
							<div class="star" id="{{ $review->stars }}"></div>
							<span id="title">{{ $review->title }} </span> <br>
							<span id="meta">By</span>
							<span id="username"> {{ $review->username }} </span>
							<span id="meta">{{"on " . date_format($review->created_at, 'F d, Y')}}</span>							
							<br /> <br />
							<p id="review">{{{ $review->review }}}</p>
						</div>
					</div>							
				</li>
			@endforeach
		@endif
	</ul>

	@if (Auth::check())
		<div class="text-center">
			<a href="{{ action('ReviewController@review', $game->id) }}">
				Leave a review
			</a>
		</div>
	@endif			
@stop

