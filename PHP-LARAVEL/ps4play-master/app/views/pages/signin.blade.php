@extends('layouts.default')

@section('content')
	<div class="page-header text-center push-down-xl" id="header">
		<span class="inner-site-header">Sign in</span>
	</div>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-offset-3 col-lg-6 col-lg-offset-3">
			{{ Form::open(array('url'=>URL::to('/login'), 'class'=>'form-horizontal')) }}
				<div class="control-group">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" name="username">
					</div>
				</div>
				<div class="control-group">
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">sign in</button>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop