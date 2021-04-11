<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Aspirante IETAL | App web IETAL.</title>
     {!!Html::style('assets/css/style.css')!!}
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="./images/logo.png">

      </div>
      <div id="company">
        <h2 class="name">APP WEB IETAL 1.0</h2>
        <div>Institucion Educativa Tecnica Alfonso Lopez</div>
        <div>La Dorada Caldas</div>
        <div><a href="http://AppIetal.com" target="_blank">AppwebIetal.com</a></div>
      </div>
      </div>

    </header>
    <main>

      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Aspirante:</div>
          <h2 class="name">{{$user->nombre}}</h2>
          <div class="address"># de Identidad: {{$user->profile->numDoc}}</div>
          <div class="email"><a href="mailto:john@example.com">{{$user->email}}</a></div>
        </div>
        <div id="invoice">

          <h1>Solicitud: {{$user->aprobado}}</h1>
          <div class="date">Fecha de solicitud: {{$user->updated_at}}</div>

        </div>
      </div>
      <div>
        <header class="clearfix">
          <div id="logo">
            <img src="./upload/estudiantes/fotos/{{$user->profile->foto}}">
          </div>
          <h2> Información de Acudientes </h2>

          Nombre de Mamá: {{$user->acudientes->nomMama}}
          <br>
          Nombre de Papá: {{$user->acudientes->nomPapa}}
          <br>
          Nombre de Acudiente: {{$user->acudientes->nomAcudiente}}
          <br>
          <hr>
          <h2> Información de la Institucion </h2>

          Sede: {{$user->institucion->sede}}<br>
          Jornada: {{$user->institucion->jornada}}<br>
          Grado: {{$user->institucion->grado}}
      </div>

      <div id="thanks">Gracias!</div>
      <div id="notices">
        <div>Generado en:</div>
        <div class="notice">Sistema de pre-matricula APP WEB IETAL.</div>
      </div>
    </main>
    <footer>
      LA DORADA - CALDAS
    </footer>
  </body>
</html>
