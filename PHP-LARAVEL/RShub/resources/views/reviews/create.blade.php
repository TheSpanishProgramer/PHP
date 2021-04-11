@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="search_wrapper">

                </div>
                <div class="panel panel-default">
                    <h1>You are creating a review for: {{ $game->name }}</h1>




                </div>
                <div class="container">
                    <form action="/games/create-review" method="POST">

                        {{ csrf_field() }}


                        <input id="game_id" name="game_id" type="hidden" value="{{ $game->id }}">
                        <input id="user_id" name="user_id" type="hidden" value="{{ Auth::user()->id }}">

                        {{--<input id="name" name="name" type="hidden" value="{{ $game->name }}">--}}



                        <label for="review">Review</label>
                        <textarea id="subject" name="review" placeholder="Write something.." style="height:200px" required></textarea><br>

                        <label for="rating">Rating</label>
                        <select id="country" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select><br>

                        <input type="submit" value="Submit"><br>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
