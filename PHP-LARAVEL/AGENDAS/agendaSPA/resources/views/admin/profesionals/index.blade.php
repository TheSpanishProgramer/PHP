@extends('admin.layout')
@section('title',' Listado de Profesionales')
@section('main-content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Listado de Profesionales</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="dataTables_length" id="example1_length">
                    <a href="{{ route('profesionals.create')}}" class="btn btn-primary btn-flat"> Registrar Profesional   <span class="glyphicon glyphicon-plus"></span></a>
              <br>
                  </div>
                </div>
              </div>
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Cedula</th>
              <th scope="col">Correo</th>
              <th scope="col">Telefono</th>
              <th scope="col">Estado</th>
              <th scope="col">Acciones</th>
                  </tr>
              </thead>
          <tbody>
            @foreach($profesionals as $profesional)
            <tr>
              <th scope="row">{{ $profesional->id }}</th>
              <td>{{ $profesional->name }}</td>
              <td>{{ $profesional->cedula }}</td>
              <td>{{ $profesional->email }}</td>
              <td>{{ $profesional->telefono }}</td>
              @if($profesional->status == "activo")
                <td><samp class="label label-success">{{ $profesional->status }}</samp></td>
              @else
              <td><samp class="label label-danger">{{ $profesional->status }}</samp></td>
              @endif
              <td>
                <a href="{{ route('profesionals.edit', $profesional->id)}}" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></a>
                <a href="{{ route('profesionals.destroy', $profesional->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Cedula</th>
              <th>Correo</th>
              <th>Telefono</th>
              <th>Estado</th>
              <th>Acciones</th>
                  </tr>
                </tfoot>
        </table>
      </div>
      <center>
        {!! $profesionals->render()!!}
      </center>
      </div>
    </div>
  </div>
</div>
@endsection