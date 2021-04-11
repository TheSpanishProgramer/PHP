@extends('layout')

@section('content')

    <div class="jumbotron">
  <div class="container text-center">
    <h2>Datos del Alumno</h2>
  </div>
</div>

<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-3" style="border: 1px solid black">
      <h3>Nombre</h3>
      <hr/>
      <h4>{{ $alumno->name }}</h4>
    </div>
    <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>Apellidos</h3>
      <hr/>
      <h4>{{ $alumno->apellidos }}</h4>
    </div>
   <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>DNI</h3>
      <hr/>
      <h4>{{ $alumno->dni }}</h4>
    </div>
   
  </div>
</div>

<br/>

<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-3" style="border: 1px solid black">
      <h3>Telefono</h3>
      <hr/>
      <h4>{{ $alumno->tfijo }}</h4>
    </div>
    <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>movil</h3>
      <hr/>
      <h4>{{ $alumno->movil }}</h4>
    </div>
   <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>Tutor</h3>
      <hr/>
      <h4>{{ $alumno->tutor }}</h4>
    </div>
   
  </div>
</div>

 </br>

<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-3" style="border: 1px solid black">
      <h3>Codigo Postal</h3>
      <hr/>
      <h4>{{ $alumno->cp }}</h4>
    </div>
    <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>Provincia</h3>
      <hr/>
      <h4>{{ $alumno->provincia }}</h4>
    </div>
   <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>Poblacion</h3>
      <hr/>
      <h4>{{ $alumno->poblacion }}</h4>
    </div>
   
  </div>
</div>

<br/>

<div class="container-fluid bg-3 text-center">
<div class="col-sm-6">
<table class="table table-bordered table-hover col-sm-3" style="top:35px;">
<tr>
  <th>Clase</th>
  <th>Nº Clase</th>
  <th>Asignatura/precio</th>
  <th>Borrar</th>
</tr>
    @php $dinero=0 @endphp
    @foreach($clases as $clase)
    @if($alumno->clases->contains('id',$clase->id))
    
    <tr>
    <th>{{$clase->name}}</th>
    <th>{{$clase->numero}}</th>

    @endif

    @foreach($asignaturas as $asignatura)
    @if($asignatura->id == $clase->asignatura_id and $alumno->clases->contains('id',$clase->id))
    <th>{{$asignatura->name}} - {{$asignatura->precio}} €</th>
    <th>
      {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('alumno_clase.destroy', $alumno->id . ';' . $clase->id))) !!}
                        {!! Form::submit('Borrar', array('class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
    </th>
    </tr>
    @php $precio=$asignatura->precio @endphp
    @php $dinero=$dinero+$precio @endphp
    
    @endif
   
    @endforeach

    @endforeach
    <tr>
    <td></td>
    <td><h4><b>TOTAL</b></h4></td>
    <td><h4><b>{{$dinero}} €</b></h4></td>
    </tr>
    </table>


</div>

<div class="col-sm-3 col-sm-offset-1 " style="top:35px;">

{!! Form::open(['route' => ['alumno_clase.update', $alumno->id], 'method' => 'PUT', 'class' => 'registerlogin']) !!}


        <label for="">AÑADIR CLASE AL ALUMNO</label><br/>
        <select name="clase" class="form-control">

            @foreach ($clases as $clase)
                @if(($alumno->clases->contains('id',$clase->id)) == false)
                    <option value="{{ $clase->id }}"> {{ $clase->name }} - {{ $clase->numero }}</option>
                @endif
            @endforeach
            </select>

            <div>
            {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
            </div>
    </div>
</div>



    


    
@endsection