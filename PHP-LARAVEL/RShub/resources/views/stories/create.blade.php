@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="search_wrapper">

                </div>
                <div class="panel panel-default">
                    <h1>You are creating a story for: {{ $game->name }}</h1>


                </div>
                <div class="container">
                    <form action="/games/create-story" method="POST">

                        {{ csrf_field() }}


                        <input id="game_id" name="game_id" type="hidden" value="{{ $game->id }}">


                        <label for="completed">Completed?</label>
                        <select id="completed" name="completed">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select><br>

                        <label for="story">Story</label>
                        <textarea id="subject" name="story" placeholder="Write something.." style="height:200px"
                                  required></textarea><br>

                        <label for="image_url">Upload image (url)</label>
                        <input type="text" id="image_url" name="image_url"><br>

                        <label for="video_url">Video image (url)</label>
                        <input type="text" id="video_url" name="video_url"><br>


                        {{--//link to img--}}
                        {{--//link to video--}}

                        <input type="submit" value="Submit"><br>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
