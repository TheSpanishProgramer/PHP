@extends('admin.layout')
@section('title','Gestion de Citas ')
@section('main-content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!--Datos del profesional-->
      <!-- general form elements disabled -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Reserva de Citas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!!Form::open(['route' => 'citas.store', 'method' => 'POST', 'id' => 'form-citas', 'role'=>'form'])!!}
         <input type="hidden" name="_token1" value="{{ csrf_token() }}" id="token1">
          <div class="row">
            <!--Panel lado izquierdo-->
            <div class="col-md-6">
              <!-- select -->
              <div class="form-group">
                {!! Form::label('sede_id','Sede donde trabaja el profesional ')!!}
                {!! Form::select('sede_id',$sede,null,['class'=>'form-control','id'=>'sedes','placeholder' => 'Selecione una Opcion','required'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('servicio_id','Servicio a Realizar ')!!}
                {!!Form::select('servicio_id',['' => 'Selecione una Opcion'], null,['class'=>'form-control','id'=>'servicios','required'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('profesional_id','Seleccione Profesional para el Servicio')!!}
                {!!Form::select('profesional_id',['' => 'Selecione una Opcion'], null,['class'=>'form-control','id'=>'profesional','required'])!!}
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="reservadate">Dia</label>
                    <input type="date" class="form-control" name="reservadate" id="reservadate" required>
                  </div>
                  <div class="col-md-6">
                    <!-- time Picker -->
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label for="reservatime">hora</label>
                        <div class="input-group">
                          <input type="text" name="reservatime" id="reservatime" class="form-control timepicker" required >
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
                    </div>
                  </div>
                </div>
              </div>
              <!--Notificacion de si la cita esta disponible ne la hora seleccionada o no-->
            <div id="notificacion"></div>
            </div>
            <!--Panel lado derecho-->
            <div class="col-md-6">
              <!--Select de Cliente-->
              <div class="row">
                <div class="col-md-9">
                  <div class="form-group">
                    <label> Seleccione Cliente</label>
                    <input type="text" name="cliente" id="cliente" class="form-control" placeholder="Escriba el nombre del cliente">
                    <!--Mostrara resultados del cliente --->
                    <div id="list-cliente btn-flat"></div>
                    {{ csrf_field() }}
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <br>
                    <button class="btn btn-default form-control" data-toggle="modal" data-target="#crearCliente" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                {!! Form::label('status','Estado de la cita')!!}
                {!!Form::select('status',['' => 'Selecione una Opcion','Reservada' => 'Reservada','En Proceso' => 'En Proceso','FInalizada' => 'Finalizada','Cancelada' => 'Cancelada'], null,['class'=>'form-control','id'=>'profesional','required'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('notas','Observaciones')!!}
                {!! Form::textarea('notas',null,['class'=>'form-control','placeholder'=>'Escriba la observaciones necesarias','id'=>'notas','required'])!!}
              </div>
              <div class="box-footer">
                {!! Form::submit('Registrar Cita', ['class'=>'btn btn-block btn-primary btn-flat', 'id'=>"btn-registrar"])!!}
                <!--button type="button" class="btn btn-block btn-info btn-flat" id="btn-registrar">Registrar Cita</button--> 
              </div>               
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->        
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- Modal -->
<div class="modal fade" id="crearCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Crear un Cliente</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form name="add_cliente" id="add_cliente">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
   <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="name"> Nombre </label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Nombres y Apellidos" maxlength="50" required>
        </div>
        <div class="form-group">
          <label for="cedula"> Numero de Identificacion </label>
          <input type="number" name="cedula" id="cedula"  class="form-control" maxlength="10" placeholder="123456789" required>
        </div>      
        <div class="form-group">
          <label for="email">Correo Electronico</label>
          <input type="text" name="email" id="email"  placeholder="example@gmail.com" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="telefono">Numero Telefonico</label>
          <input type="number" name="telefono" id="telefono"  placeholder="3004567890" maxlength="10" class="form-control" >
        </div>
        <div class="form-group">
        <label for="address">Dirección</label>
        <input type="text" name="address" id="address"  class="form-control" placeholder="Cl 99 #89-141" maxlength="255" required>
        </div>
      </div>
      </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Registrar Cliente</button>
  </div>
  </form>
</div>
</div>
</section>
<!-- /.content -->
@endsection()