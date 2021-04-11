@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="search_wrapper">

                </div>
                <div class="panel panel-default">
                    <h1>Edit story for: {{ $story->game_id }}</h1>

                    <form action="/games/edit-story/{{ $story->id }}" method="POST">

                        {!! method_field('patch') !!}
                        {{ csrf_field() }}

                        <label for="completed">Completed?</label>
                        <select id="completed" name="completed">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select><br>

                        <label for="story">Story</label>
                        <textarea id="subject" name="story" placeholder="Write something.." style="height:200px"
                                  required ></textarea><br>

                        <label for="image_url">Upload image (url)</label>
                        <input type="text" id="image_url" name="image_url" value="{{ $story->image_url }}"><br>

                        <label for="video_url">Video image (url)</label>
                        <input type="text" id="video_url" name="video_url" value="{{ $story->video_url }}"><br>

                        <input type="submit" value="Submit"><br>

                    </form>

                    <form action="/games/edit-story/{{ $story->id }}" method="POST">
                        {!! method_field('delete') !!}
                        {{ csrf_field() }}
                        <input type="submit" value="Delete"><br>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
