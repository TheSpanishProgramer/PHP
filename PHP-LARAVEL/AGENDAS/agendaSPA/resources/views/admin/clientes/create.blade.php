@extends('admin.layout')
@section('title','Registro de Cliente')
@section('main-content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Crear Cliente </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!!Form::open(['route' => 'clientes.store', 'method' => 'POST' ])!!}
  <form role="form">
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('name',' Nombre')!!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Cliente'], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('cedula',' Numero de Identificacion')!!}
        {!! Form::text('cedula', null, ['class' => 'form-control','maxlength'=>'10','placeholder'=>'CC / CE 1.987.899',], 'required')!!}
      </div>
      <div class="form-group">
        {!! Form::label('email','Correo Electronico')!!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('telefono','Numero telefonico')!!}
        {!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'3005555555', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('address','Dirección')!!}
        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Escriba la dirección', 'required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('sede_id','Sede')!!}
        {!! Form::select('sede_id',$sede,null,['class'=>'form-control','placeholder' => 'Selecione una Opcion'])!!}
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('Registrar Cliente', ['class'=>'btn btn-primary'])!!}
    </div>
  </form>
  {!! Form::close()!!}
</div>

@endsection
