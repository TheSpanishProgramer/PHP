@extends('layouts.default')

@section('content')

<div class="row text-center push-down-sm">
	<h3 class="review-title">{{ $game->name }}</h3>
	@if($errors->has('stars'))
		<span class="null-rating-error small"></span>
	@endif
	<div class="customer-review"></div>
</div>
<div class="row push-down-xs">
	<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-offset-3 col-lg-6 col-lg-offset-3">
		{{Form::open(array('action'=>array('review', $game->id), 'class'=>'form-horizontal', 'id'=>'customerReview'))}}
			<div class="form-group">
				<input type="text" name="title" class="form-control" placeholder="Title">
			</div>

			<div class="form-group">
				<textarea name="review" cols="30" rows="10" class="form-control"></textarea>
			</div>

			<input type="hidden" name="stars" id="rating">
			<input type="hidden" name="id" id="game" value="{{$game->id}}">

			<div class="form-group">
				<button type="submit" class="btn btn-primary submit-review">Submit</button>
			</div>
		{{Form::close()}}
	</div>
</div>
@stop

