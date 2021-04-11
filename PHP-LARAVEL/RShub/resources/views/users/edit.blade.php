@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="search_wrapper">

                </div>
                <div class="panel panel-default">

                    <h1>Edit Page:</h1>

                </div>

                <div class="container">

                    @if (Auth::user()->hasRole('Admin'))
                        <form action="/user/{{ $user->id }}/edit" method="POST">
                            {!! method_field('patch') !!}
                            {{ csrf_field() }}

                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value=" {{ $user->name }} "><br>

                            <label for="name">Email:</label>
                            <input type="text" id="email" name="email" value=" {{ $user->email }} "><br>

                            <select id="role_id" name="role">
                                {{--<option selected="selected">{{ $user->roles->first()->name }}</option>--}}
                                <option value="1">User</option>
                                <option value="2">Editor</option>
                                <option value="3">Admin</option>
                            </select><br>

                            <input type="submit" value="Submit"><br>

                        </form>

                        <form action="/user/{{ $user->id }}/edit" method="POST">
                            {!! method_field('delete') !!}
                            {{ csrf_field() }}
                            <input type="submit" value="Delete"><br>
                        </form>

                    @else

                        <form action="/user/{{ $user->id }}/edit" method="POST">
                            {!! method_field('patch') !!}
                            {{ csrf_field() }}

                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value=" {{ $user->name }} "><br>

                            <label for="name">Email:</label>
                            <input type="text" id="email" name="email" value=" {{ $user->email }} "><br>

                            <input type="submit" value="Submit"><br>

                        </form>

                        <form action="/user/{{ $user->id }}/edit" method="POST">
                            {!! method_field('delete') !!}
                            {{ csrf_field() }}
                            <input type="submit" value="Delete"><br>
                        </form>

                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
