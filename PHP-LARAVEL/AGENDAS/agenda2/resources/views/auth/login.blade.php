@extends('layouts.log')

@section('content')

<div class="row">
    <div class="login">
        <h2 class="text-center">Agenda InApp</h2>
        <hr>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" ng-required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Senha" ng-required>
            </div>

            @if ($errors->has('email') || $errors->has('password'))
            <div class="text-center mb-15">
                <span class="label label-danger">
                    <i class="fa fa-exclamation-triangle"></i> E-mail ou senha incorretos
                </span>
            </div>
            @endif

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-sign-in"></i> Login
                    </button>

                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Esqueceu a senha?</a>
                </div>
            </div>
        </form>
    </div>
</div>

@stop
