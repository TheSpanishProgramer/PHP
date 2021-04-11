@extends('layouts.default')

@section('content')	
	<div class="row push-down-xs shift-right-xs">
        <div class="page-header"> 
            <small class="">Items saved in cart for 2 hours</small>
        </div>
    </div> 
	<ul class="list-group">
	 	@if(Session::has('cart'))
	 		@foreach ($games as $item) 
				<li class="list-group-item" id="{{ $item['game']->id }}">
	 				<div class="row">
	 					<div class=" col-xs-6 col-md-2 col-lg-2">
	 						<img class="image-small" src="{{asset('images/'.$item['game']->image_name.'.jpg')}}" alt="PS4Play" />
	 					</div>
	 				
	 					<div class="col-xs-6  col-md-6 col-lg-6">
	 						<p>{{ $item['game']->name}}</p>
	 					</div>

	 					<div class="col-xs-6 col-md-2 col-md-2">
	 						{{ $item['num'] }}
	 					</div>
	 	
	 					<div class="col-xs-3 col-md-1 col-md-1">
	 						{{ '$'.$item['game']->price }}
	 					</div>
						
						<div class="col-xs-3 col-md-1 col-lg-1">
							<i class="fa fa-times pull-right remove-item" id="{{$item['game']->id}}"></i>
						</div>

						<input type="hidden" name="gameID" value="{{$item['game']->id}}">
						<input type="hidden" name="url" value="{{action('CartController@remove')}}">
	 					
	 				</div>

	 			</li>
	 		@endforeach
	 		<div class="row">
	 			<div class="col-md-4"></div>
	 			<div class="col-md-4"></div>
	 			<div class="col-md-1"></div>
	 			<div class="col-md-3 text-center">
	 				<h5 id="total">{{ "Total: ".'$'. number_format($total, 2) }}</h5>
						<a href= "{{action('CartController@checkOut')}}">
	 						<button class="btn btn-primary">
								complete order
							</button>
	 					</a>				
	 			</div>
	 		</div>
	 	@else 
	 		<li class="list-group-item push-down-xs">
	 		   <div class="row">
	 		   	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	 				<h5> There are no items in your cart </h5>
	 		   	</div>
	 		   </div> 			
	 		</li>	 		
	 	@endif
	 </ul>
@stop
