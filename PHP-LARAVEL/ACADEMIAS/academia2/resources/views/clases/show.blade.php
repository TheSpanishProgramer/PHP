@extends('layout')

@section('content')

    <div class="jumbotron">
  <div class="container text-center">
    <h2>Datos de la clase</h2>
  </div>
</div>

<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-3 col-sm-offset-2" style="border: 1px solid black">
      <h3>Nombre</h3>
      <hr/>
      <h4>{{ $clase->name }}</h4>
    </div>
    <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>Numero</h3>
      <hr/>
      <h4>{{ $clase->numero }}</h4>
    </div>
   
  </div>
</div>

<br/>

<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-3 col-sm-offset-2" style="border: 1px solid black">
      <h3>Profesor</h3>
      <hr/>
      <h4>{{ $profesor->name }} {{ $profesor->apellidos}}</h4>
    </div>
    <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>Asignatura</h3>
      <hr/>
      <h4>{{ $asignatura->name }}</h4>
    </div>
   
  </div>
</div>

 </br>




<hr/>


<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-1" style="border: 1px solid black">
      <h3>Alumnos asignados</h3>
      <hr/>
      @foreach($alumnos as $alumno)
      @if($clase->alumnos->contains('id',$alumno->id))
    
       <p>{{$alumno->name}} {{$alumno->apellidos}}</p>

      @endif
      @endforeach

    </div>
   
  </div>
</div>




</div>


    
@endsection