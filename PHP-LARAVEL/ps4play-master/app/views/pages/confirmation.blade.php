@extends('layouts.default')

@section('content')

	<div class="page-header text-center push-down-sm" id="header">
		<span class="inner-site-header">Conirmation</span>
	</div>
	@if( $confirmationNumber == 0)
		<div class="row text-center">
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-offset-3 col-lg-6 col-lg-offset-3">
				<span class="confirmation-message">
					Your message has been sent. Thank you. 		
				</span> <br>
				<a href="/">home</a>
			</div>
		</div>
	@elseif($confirmationNumber == 1)
		<div class="row text-center">
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-offset-3 col-lg-6 col-lg-offset-3">
				<span class="confirmation-message">
					Your order has been received. You will receive an email shortly. Thank you. 		
				</span> <br>
				<a href="/">continue shopping</a>
			</div>
		</div>
	@endif

@stop