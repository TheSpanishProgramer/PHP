<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Certificado -  Pre  Matricula</title>
    {!!Html::style('assets/css/style.css')!!}



  </head>
  <body>
    <CENTER> <H1> INSTITUCIÓN EDUCATIVA TÉCNICO ALFONSO LÓPEZ </H1>
    <header class="clearfix">
      <div id="logo">
        <img src="./images/logo.png">
      </div>
  </center>
      <div id="company">
        <h2 class="name">Sede: {{$user->institucion->sede}}</h2>
        <div>Grado: {{$user->institucion->grado}}</div>
        <div>Jornada: {{$user->institucion->jornada}}</div>
        <div>Tarjeta de Matricula Nº: APIE10{{$user->id}}</div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">Foto:</div>

          <div class="address">  <img width="100" height="100"src="./upload/estudiantes/fotos/{{$user->profile->foto}}" ></div>

        </div>

      </div>

      </div>
     <table>
       <tr>
         <td>
           <p align="left" color="#000" size=4>
          <label for="exampleInputEmail1">Nombres y apellidos</label><br>
             {{$user->nombre}}
             <br>    <br>
             <label for="exampleInputEmail1">Residencia</label>
             {{$user->profile->direccion}}

             <br>    <br>
             <label for="exampleInputEmail1">Estracto</label>
             {{$user->profile->estracto}}

             <br>    <br>
             <label for="exampleInputEmail1">Seguridad Social</label>
             {{$user->profile->seguridadS}}
             <br>    <br>
             <label for="exampleInputEmail1">Nombre del acudiente</label>
             {{$user->acudientes->nomAcudiente}}

       </td>
      <td>
<p align="left" color="#000" size=4>
         <label for="exampleInputEmail1">Numero de Documento</label><br>
          {{$user->profile->numDoc}}
             <br>   <br>
           <label for="exampleInputEmail1">Lugar y Fecha de Nacimiento</label><br>
           {{$user->profile->feNa}} |  {{$user->profile->lugarNa}}

           <br>    <br>
           <label for="exampleInputEmail1">Grupo Sanguineo</label>
           {{$user->profile->rh}}

           <br>    <br>
           <label for="exampleInputEmail1">Sisben</label>
           {{$user->profile->sisben}}

           <br>    <br>
           <label for="exampleInputEmail1">Nombre del Papá</label>
           {{$user->acudientes->nomPapa}}

      </td>
       <td>
        <p align="left" color="#000" size=4>
          <label for="exampleInputEmail1">Tipo de Documento</label>
          <br>
          {{$user->profile->tipoDoc}}
          <br>   <br>
          <label for="exampleInputEmail1">Telefono</label>
          {{$user->profile->telefono}}

          <br>    <br>
          <label for="exampleInputEmail1">Sexo</label>
          @if($user->profile->sexo=='m')
             Masculino
          @else
              Femenino
          @endif
          <br>    <br>
          <label for="exampleInputEmail1">Procedencia</label>
          {{$user->profile->procedencia}}

          <br>    <br>
          <label for="exampleInputEmail1">Nombre de la Mamá</label>
          {{$user->acudientes->nomMama}}
        </p>
      </td>
       </tr>
     </table>


     <table style="width:100%">
       <tr>
         <th>AÑO</th>
         <th>GRADO</th>
         <th>EDAD</th>
         <th>FIRMA ALUMNO</th>
         <th>FIRMA ACUDIENTE</th>
       </tr>
       <tr>
         <td><center>{{$user->profile->year}}</center></td>
         <td><center>{{$user->institucion->grado}}</center></td>
         <td><center>{{$user->profile->age}}</center></td>
         <td>________________</td>
         <td>________________</td>
       </tr>
       <tr>
         <td>_______________</td>
         <td>_______________</td>
         <td>_______________</td>
         <td>_______________</td>
         <td>_______________</td>
       </tr>


     </table>



@if($user->observaciones!=''||$user->profile->desplazado==1||$user->profile->madreC==1)
     <div class="jumbotron">
      <h2>Observaciones</h2>
      <p>{{$user->observaciones}}</p>
      <p>
        @if($user->profile->desplazado==1)
          El aspirante {{$user->nombre}} es desplazado de {{$user->profile->lugarDeplazado}}
        @endif
        @if($user->profile->madreC==1)
        <br>
          El aspirante {{$user->nombre}} es madre cabeza de familia
        @endif
      </p>
    </div>
  @endif
      <div id="thanks">Bienvenido!</div>
      <div id="notices">

        <div class="notice">
          El ALUMNO, PADRE O ACUDIENTE SE ACOGE A LAS NORMAS DEL MANUAL DE CONVIVENCIA DE LA
          INSITIUCION EDUCATIVA.
        </div>
      </div>
      <BR> <BR>
              <BR> <BR><BR> <BR>
                      <BR> <BR>
      INGRESO:______________________

      -------

      EGRESO:_________________________

          <BR> <BR>
                  <BR> <BR><BR> <BR>
                          <BR> <BR>
                            <BR> <BR>
                                    <BR> <BR><BR> <BR>
                                            <BR> <BR>
                                              <BR> <BR>
                                                      <BR> <BR><BR> <BR>
                                                              <BR> <BR>
    RECTORIA:__________________ |  PADRE O ACUDIENTE:____________________ |   SECRETARIO (A):_________________
    <BR> <BR>
            <BR> <BR><BR> <BR>
                    <BR> <BR>
    <hr>
        Sistema de pre-matricual App web IETAL 1.0. |    WWW.APPWEBIETAL.COM
    </main>


  </body>
</html>
