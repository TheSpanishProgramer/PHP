@extends('admin.layout')
@section('title','Crear Usuario')
@section('main-content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Crear Usuario </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!!Form::open(['route' => 'users.store', 'method' => 'POST', 'files' => true ])!!}
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('name',' Nombre')!!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Usuario'], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('email','Correo Electronico')!!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com','autocomplete'=>'off', 'required'])!!}
      </div>
      <div class="form-group">
		{!! Form::label('password','Contraseña')!!}
		{!! Form::password('password',['class'=>'form-control','placeholder'=>'**********','required'])!!}
      </div>
      <div class="form-group">
		{!! Form::label('type','Privilegios')!!}
		{!! Form::select('type',[''=>'Seleccione un Nivel','administrador' => 'Administrador', 'estandar' => 'Estandar'], null,['class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('status','Estado ')!!}
        {!! Form::select('status',[''=>'Seleccione un Nivel','activo'=>'Activo','suspendido'=>'Suspendido'],null,['class'=>'form-control'])!!}
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('Registrar Usuario', ['class'=>'btn btn-primary'])!!}
    </div>
  </form>
  {!! Form::close()!!}
</div>

@endsection()
