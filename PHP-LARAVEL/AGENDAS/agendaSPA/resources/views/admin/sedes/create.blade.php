@extends('admin.layout')
@section('title','Crear Sede')
@section('main-content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Crear Sede</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!!Form::open(['route' => 'sedes.store', 'method' => 'POST', 'files' => true ])!!}
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('name',' Nombre de la sede')!!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la sede'], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('address','Dirección de la sede ')!!}
        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Escriba la dirección', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('telefono',' Número de Telefono')!!}
        {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => ' 300 555 5555','required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('email','Correo electronico')!!}
        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'example@gmail.com','required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('status','Estado ')!!}
        {!! Form::select('status',[''=>'Seleccione un Estado','activo' => 'Activo', 'suspendido' => 'Suspendido'],null,['class'=>'form-control'])!!}
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}
    </div>  
  {!! Form::close()!!}
</div>
@endsection()