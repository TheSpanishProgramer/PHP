@extends('layout')

@section('content')

    <div class="panel panel-default col-md-10">

    <h3 class="panel-heading">Listado de Users </h3>
    

    <a href="{!! url('usuarios/create') !!}" class="btn btn-primary">Nuevo</a>

    {!! Form::open(['route' => 'usuarios.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right']) !!}
    
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Usuario']) !!}
    
    {!! Form::submit('Buscar', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

     <hr/>

    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>email</th>
                <th>Acciones</th>
            </tr>
        </thead>
            <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('usuarios.destroy', $user->id))) !!}
                        {!! link_to_route('usuarios.edit', 'Editar', array($user->id), array('class' => 'btn btn-info')) !!}
                        {!! Form::submit('Borrar', array('class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    </div>

    {!! $users->render() !!}

@endsection