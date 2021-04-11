@extends('layout')

@section('content')


@if($errors->all())
<div class="alert alert-danger">
    <p>Por favor,Resuelva los siguientes errores:</p>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

<form class= "form-horizontal" method="POST" action="{{url('login')}}">
<div class= "col-xs-3" >
{!! csrf_field() !!}

            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">

            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
            
            <br>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>

    </div>


    
</form>

@endsection