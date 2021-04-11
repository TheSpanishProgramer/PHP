@extends('layouts.default')

@section('content')
	<div class="row push-down-xs">
            <div class="page-header"> 
                <span class="shift-right-sm inner-site-header">{{ ucfirst($genre) }}</span>
            </div>
    </div> 
        <ul class="push-down-sm">
            @foreach ($games as $game)
              <li class="row games-list">
                <a  href="{{ action('games', array($game->genre, $game->slug)) }}" class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                    <img class="group list-group-image image-small" id="thumb" src= "{{asset('images/'.$game->image_name.'.jpg')}}" alt="PS4Play" />
                </a>
                <div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
                    <a href= "{{ action('games', array($game->genre, $game->slug)) }}"> 
                        {{ $game->name }} 
                    </a>
                    <div class="star" id="{{$game->reviews()->avg('stars')}}"></div>
                    <h5> {{ '$'.$game->price }} </h5>
                </div>
             </li>
            @endforeach       
        </ul>   
    </div>
@stop
