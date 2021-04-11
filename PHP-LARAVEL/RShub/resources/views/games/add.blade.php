@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="search_wrapper">

                </div>
                <div class="panel panel-default">
                    <h1>Add PS4 game</h1>
                </div>

                <div class="container">
                    <form action="/games/add-game" method="POST">

                        {{ csrf_field() }}

                        <label for="name">Name</label><br>
                        <input type="text" id="name" name="name"> <br>

                        <label for="Release date">Release date</label><br>
                        <input type="text" id="release_date" name="release_date"><br>

                        <label for="Summary">Summary</label><br>
                        <input type="text" id="summary" name="summary"><br>

                        <label for="Developer">Developer</label><br>
                        <input type="text" id="developer" name="developer"><br>

                        <label for="image_url">Upload image (url)</label><br>
                        <input type="text" id="image_url" name="image_url"><br>

                        <label for="trailer_url">Video image (url)</label><br>
                        <input type="text" id="trailer_url" name="trailer_url"><br>

                        <input type="submit" value="Submit"><br>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
