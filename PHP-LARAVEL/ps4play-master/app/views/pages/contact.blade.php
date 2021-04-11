@extends('layouts.default')

@section('content')
	<div class="page-header text-center push-down-xl" id="header">
		<span class="inner-site-header">Contact</span>
	</div>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-offset-3 col-lg-6 col-lg-offset-3">
			{{ Form::open(array('url'=>URL::to('/contact'), 'class'=>'form-horizontal', 'id'=>'contact')) }}
				<div class="control-group">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Name" name="name">
					</div>
				</div>
				<div class="control-group">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email" name="email">
					</div>
				</div>
				<div class="control-group">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Subject" name="subject">
					</div>
				</div>
				<div class="control-group">
					<div class="form-group">
						<textarea name="message" id="" class="form-control" placeholder="Message"></textarea>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">submit</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop