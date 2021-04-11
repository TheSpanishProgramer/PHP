@extends('layouts.log')

@section('content')

<div class="row">
    <div class="login">
        <h2 class="text-center">Agenda InApp</h2>
        <hr>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" ng-required>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
                    </button>
                </div>
            </div>
            @if ($errors->has('email'))
            <div class="alert alert-danger">
                <strong>E-mail não cadastrado</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </form>
    </div>
</div>
@stop
