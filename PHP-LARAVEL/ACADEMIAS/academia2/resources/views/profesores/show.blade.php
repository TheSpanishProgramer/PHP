@extends('layout')

@section('content')

    <div class="jumbotron">
  <div class="container text-center">
    <h2>Datos del Profesor</h2>
  </div>
</div>

<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-3" style="border: 1px solid black">
      <h3>Nombre</h3>
      <hr/>
      <h4>{{ $profesor->name }}</h4>
    </div>
    <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>Apellidos</h3>
      <hr/>
      <h4>{{ $profesor->apellidos }}</h4>
    </div>
   <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>DNI</h3>
      <hr/>
      <h4>{{ $profesor->dni }}</h4>
    </div>
   
  </div>
</div>

<br/>

<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-3 col-sm-offset-2" style="border: 1px solid black">
      <h3>Telefono</h3>
      <hr/>
      <h4>{{ $profesor->tfijo }}</h4>
    </div>
    <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>movil</h3>
      <hr/>
      <h4>{{ $profesor->movil }}</h4>
    </div>
   
  </div>
</div>

 </br>

<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-3" style="border: 1px solid black">
      <h3>Codigo Postal</h3>
      <hr/>
      <h4>{{ $profesor->cp }}</h4>
    </div>
    <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>Provincia</h3>
      <hr/>
      <h4>{{ $profesor->provincia }}</h4>
    </div>
   <div class="col-sm-3 col-sm-offset-1" style="border: 1px solid black">
      <h3>Poblacion</h3>
      <hr/>
      <h4>{{ $profesor->poblacion }}</h4>
    </div>
   
  </div>
</div>



<hr/>


<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-9 col-sm-offset-1" style="border: 1px solid black">
      @if($clase == null)
      <h3>Clase asignada</h3>
      <hr/>
      <h4>sin clase asignada</h4>
      @else
      <h3>Clase asignada</h3>
      <hr/>
      <h4>{{$clase->name}}</h4>
      @endif

    </div>
   
  </div>
</div>




</div>


    
@endsection