@extends('admin.layout')
@section('title','Editar Usuario')
@section('main-content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Modificar Datos de Usuario </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
{!! Form:: open(['route' => ['users.update', $user],'method' => 'PUT']) !!}
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('name',' Nombre')!!}
        {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre del Usuario'], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('email','Correo Electronico')!!}
        {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com','autocomplete'=>'off', 'required'])!!}
      </div>
      <div class="form-group">
		{!! Form::label('type','Privilegios')!!}
		{!! Form::select('type',[''=>'Seleccione un Nivel','administrador' => 'Administrador', 'digitador' => 'Digitador'], $user->type ,['class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('status','Estado ')!!}
        {!! Form::select('status',[''=>'Seleccione un Nivel','activo'=>'Activo','suspendido'=>'Suspendido'], $user->status,['class'=>'form-control'])!!}
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
    </div>  
  </form>
{!! Form::close() !!}
</div>

@endsection()