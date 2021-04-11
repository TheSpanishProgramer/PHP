@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="search_wrapper">

                </div>
                <div class="panel panel-default">
                    <h1>All ps4 games</h1>
                    @if (Auth::user()->hasRole('Editor') || Auth::user()->hasRole('Admin'))
                        <a href="/games/add-game">Add Game</a>
                    @endif

                    @foreach($games as $game)
                        <a href="/games/{{ $game->id }}">
                            <li>{{ $game->name }}</li>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
