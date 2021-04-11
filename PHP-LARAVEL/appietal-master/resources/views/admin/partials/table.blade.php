<div class="bs-example" data-example-id="simple-table">
   <table class="table">

      <thead>
         <tr>

         <th>Foto</th>
         <th># Identificación</th>
         <th>Nombre</th>

         <th>Sede</th>
         <th>Acciones</th>
          </tr>
         </thead>
          <tbody>
            @foreach ($users as $user)

             <tr>
               <th scope="row"><img src="/upload/estudiantes/fotos/{{$user->profile->foto}}" height="120" width="120"></th>
               <td>{{$user->profile->numDoc}}</td>

               <td>{{$user->nombre}}</td>

                <td>{{$user->institucion->sede}}</td>
                <td>
                  <p>
                    <a href="{{url('editar-datos-aspirante/',$user)}}">
                    <img src="/images/edit.png" width="80" height="80">
                  </a>
                     <a href="{{route('admin.aspirante.mi_pdf',$user)}}" target="_blank">
                    <img src="/images/pdf.png" width="80" height="80"></a>
                </td>
              </tr>
            @endforeach

                    </tbody>
                  </table>
</div>
