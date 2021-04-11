@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="search_wrapper">

                </div>
                <div class="panel panel-default">
                    <h1>Edit review for: {{ $review->game_id }}</h1>

                    <form action="/games/edit-review/{{ $review->id }}" method="POST">
                        {!! method_field('patch') !!}
                        {{ csrf_field() }}

                        <label for="review">Review:</label>
                        <textarea id="subject" name="review" placeholder="Write something.." style="height:200px" required></textarea><br>

                        <label for="rating">Rating</label>
                        <select id="country" name="rating">
                            <option selected="selected">{{ $review->rating }}</option>
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

                    <form action="/games/edit-review/{{ $review->id }}" method="POST">
                        {!! method_field('delete') !!}
                        {{ csrf_field() }}
                        <input type="submit" value="Delete"><br>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
