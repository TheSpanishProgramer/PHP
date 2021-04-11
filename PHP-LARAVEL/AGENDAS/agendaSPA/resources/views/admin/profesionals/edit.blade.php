@extends('admin.layout')
@section('title','Edicion de Profesional')
@section('main-content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Modificacion de registro de Profesional </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!!Form::open(['route' => ['profesionals.update',$profesional], 'method' => 'PUT' ])!!}
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('name',' Nombre')!!}
        {!! Form::text('name',$profesional->name, ['class' => 'form-control', 'placeholder' => 'Nombre del Profesional'], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('cedula',' Numero de Identificacion')!!}
        {!! Form::text('cedula',$profesional->cedula, ['class' => 'form-control','maxlength'=>'10','placeholder'=>'CC / CE 1.987.899','readonly'=>'true'], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('email','Correo Electronico')!!}
        {!! Form::email('email',$profesional->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('telefono','Numero telefonico')!!}
        {!! Form::text('telefono',$profesional->telefono,['class'=>'form-control','placeholder'=>'3005555555', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('status','Estado ')!!}
        {!! Form::select('status',[''=>'Seleccione un Estado','activo' => 'Activo', 'suspendido' => 'Suspendido'],$profesional->status,['class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('servicio','Seleccione los servicios que realizará')!!}
        {!! Form::select('servicio[]', $servicio,$myservicios,['class' => 'form-control','multiple', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('sede_id','Sede donde trabaja el profesional ')!!}
        {!! Form::select('sede_id',$sede,$profesional->sede_id,['class'=>'form-control','placeholder' => 'Selecione una Opcion'])!!}
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('Actualizar Registro', ['class'=>'btn btn-primary'])!!}
    </div>  
  </form>
  {!! Form::close()!!}
</div>

@endsection