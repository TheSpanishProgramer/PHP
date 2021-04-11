@if(Auth::user()->admin())
  <div class="12u$">
    <ul class="actions">
      <li><input type="submit" value="Actualizar" class="special" /></li>
      <li><button><a href="{{url('home')}}">Cancelar</a></button></li>
    </ul>
  </div>
@endif


@if(Auth::user()->estudiante())
  <div class="12u$">
    <ul class="actions">
      <li><input type="submit" value="Siguiente Paso" class="special" /></li>

      <li><button><a href="{{url('home')}}">Cancelar</a></button></li>
    </ul>
  </div>
@endif
