@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <li>Name: {{ $game->name }}</li>
                    <li>Release date: {{ $game->release_date }}</li>
                    <li>Summary: {{ $game->summary }}</li>
                    <li>Developer: {{ $game->developer }}</li>
                    <li>
                        <img src="{{ $game->image_url }}" alt="Image not found" width="200px">
                    </li>

                    <li><a href="{{ url('/games/'.$game->id.'/create-review') }}">Create a review</a></li>
                    <li><a href="{{ url('/games/'.$game->id.'/create-story') }}">Create a story</a></li>

                    <a href="{{ url('/games') }}"><p>Go back</p></a>

                </div>

                <h1>All reviews for this game:</h1>
                <hr>
                @foreach($game->reviews as $review)
                    <li>Name: {{ $game->name }}</li>
                    <li>Review written by {{ $review->user->name }} at {{ $review->created_at }}</li>
                    <li>Review: {{ $review->review }}</li>
                    <li>Rating: {{ $review->rating}}</li>
                    @if (Auth::user()->hasRole('Admin'))
                        <a href="\games\edit-review\{{ $review->id }}">Edit</a>
                    @endif
                    <hr>
                @endforeach

                <h1>All stories for this game:</h1>
                <hr>
                @foreach($game->stories as $story)
                    <li>Game: {{ $game->name }}</li>
                    <li>Story written by {{ $story->user->name }} at {{ $story->created_at }}</li>
                    <li>Story {{ $story->story }}</li>
                    @if (Auth::user()->hasRole('Admin'))
                        <a href="\games\edit-story\{{ $story->id }}">Edit</a>
                    @endif
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
