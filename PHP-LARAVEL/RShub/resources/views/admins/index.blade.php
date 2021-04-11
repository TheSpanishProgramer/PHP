@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="search_wrapper">

                </div>
                <div class="panel panel-default">
                    <h1>All users games</h1>

                    @foreach($users as $user)

                        <li>{{ $user->name }}</li>
                        <li>{{ $user->email}}</li>
                        @foreach($user->roles as $v)
                            <li>{{ $v->name }}</li>
                        @endforeach
                        <a href="\user\{{ $user->id }}\edit">Edit</a>

                        {{--<li>{{ $user->role->name}}</li>--}}
                        {{--<li>{{ $user->role->name}}</li>--}}
                        {{--<input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user">User--}}
                        {{--<input type="checkbox" {{ $user->hasRole('Editor') ? 'checked' : '' }} name="role_editor">Editor--}}
                        {{--<input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin">Admin--}}

                        <hr>


                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
